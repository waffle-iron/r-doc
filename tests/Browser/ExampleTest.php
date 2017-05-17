<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
  use DatabaseMigrations;

  /**
   * A basic browser test example.
   *
   * @return void
   */
  public function testBasicExample()
  {
    $this->browse(function (Browser $browser) {
      $browser->visit('/')
          ->assertSee('Login');
    });
  }

  /** @test */
  public function i_can_log_in()
  {
    $this->browse(function (Browser $browser) {
      $user = factory(\App\User::class)->create();
      $browser->visit('/')
          ->waitForText('Login')
          ->click('#login-link')
          ->assertPathIs('/login')
          ->type('email', $user->email)
          ->type('password', 'secret')
          ->click('button[type="submit"]')
          ->assertPathIs('/home')
          ->assertHasCookie('laravel_session');
    });
  }

  /** @test */
  public function i_can_logout()
  {
    $user = factory(\App\User::class)->create();
    $this->browse(function (Browser $browser) use ($user) {
      $browser->loginAs($user)
          ->visit('/home')
          ->click('#user-dropdown')
          ->click('#logout-button')
          ->assertPathIs('/mockups/guide/0');
    });
  }
}
