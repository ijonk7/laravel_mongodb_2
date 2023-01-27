<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    /**
     * @dataProvider fieldData
     * */
    public function test_displays_an_error_when_a_field_is_not_provided(array $values, string $expected)
    {
        $response = $this->post('/register', $values);

        $response->assertSessionHasErrors($expected);
    }

    public function fieldData()
    {
        return [
            [['email' => 'test@example.com', 'password' => 'password', 'password_confirmation' => 'password'], 'name'],
            [['name' => 'Test User', 'password' => 'password', 'password_confirmation' => 'password'], 'email'],
            [['name' => 'Test User', 'email' => 'test@example.com', 'password_confirmation' => 'password'], 'password'],
            [['name' => 'Test User', 'email' => 'test@example.com', 'password' => 'password'], 'password'],
        ];
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
