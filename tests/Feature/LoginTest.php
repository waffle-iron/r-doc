<?php

namespace Tests\Feature;

use Laravel\Passport\Passport;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /** @test */
    public function a_user_can_login()
    {
      $this->signIn();

      $response = $this->get('/home');

      $response->assertStatus(200);
      $response->assertHeader('Authenticate');
    }
    
    /** @test */
    public function a_user_can_logout()
    {
      $this->withExceptionHandling();

      $this->signIn();

      $response = $this->post('/logout');

      $response->assertStatus(302);
      $response->assertRedirect('/');

    }
}
