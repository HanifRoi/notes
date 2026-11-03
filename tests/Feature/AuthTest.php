<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function testRegisterSuccess()
    {
        $response = $this->withoutExceptionHandling()->post('/auth/register', [
            'email'=> 'hanif@gans.com',
            'password'=>'Rahasia123!',
            'password_confirmation' => 'Rahasia123!',
            'name'=>'Hanif Roihan'
        ]);
        $response->assertSessionHasNoErrors();
        $this->assertNotNull($response);
        $this->assertDatabaseCount('users', 1);
    }

    public function testRegisterFailed()
    {
        $response = $this->post('/auth/register', [
            'email'=> 'hanif@gans.com',
            'password'=>'rahasia',
            'password_confirmation' => 'rahasia',
            'name'=>'Hanif Roihan'
        ]);
        $response->assertSessionHasErrors();
        $this->assertNotNull($response);
        $this->assertDatabaseCount('users', 0);
    }

    public function testLoginSuccess()
    {
        $user = User::factory()->create([
            'email'=>'hanif@gans.com',
            'password'=>bcrypt('Rahasia123!')
        ]);
        $response = $this->post('/auth/login', [
            'email'=>'hanif@gans.com',
            'password'=>'Rahasia123!'
        ]);

        $response->assertRedirect(route('note.index'));
    }

    public function testLoginFailed()
    {
        $user = User::factory()->create([
            'email'=>'hanif@gans.com',
            'password'=>bcrypt('Rahasia123!')
        ]);

        $this->get('/auth/login');

        $response = $this->post('/auth/login', [
            'email'=>'hanif@gans.com',
            'password'=>'Rahasia12f3!'
        ]);
        $response->assertSessionHasErrors();

        $response->assertRedirect('/auth/login');
    }

    public function testLogoutSuccess()
    {
        $user = User::factory()->create();
                $this->actingAs($user);
        $response = $this->post('/auth/logout');
        $response->assertRedirect('/auth/login');
        $this->assertGuest();
    }
}
