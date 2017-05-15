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
      Passport::actingAs(create(\App\User::class));

      $response = $this->get('/home');

      $response->assertStatus(200);
    }
    
    /** @test */
    public function a_user_can_logout()
    {
      
    }
}
