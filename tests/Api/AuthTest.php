<?php

namespace Tests\Api;

use App\Models\User;
use Database\Seeders\UsersSeeders;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function AuthDataProvider()
    {
        return [
            'success' => [
                'expect' => [
                    'user' =>
                        [
                            'first_name' => 'test',
                            'last_name' => 'test',
                            'email' => 'test@test.com'
                        ]
                ]
            ]
        ];
    }

    /**
     * @param array $expect
     * @return void
     * @dataProvider AuthDataProvider
     */
    public function test_create_jwt(array $expect): void
    {
        $response = $this->post(
            '/api/code-jwt', [
                'user' => $expect['user']
            ]
        );
        $token = $response->getContent();
        $response->assertStatus(200);
        $this->assertNotEmpty($token);
    }

    /**
     * @param array $expect
     * @return void
     * @dataProvider AuthDataProvider
     */
    public function test_login(array $expect): void
    {
        $response = $this->post(
            '/api/code-jwt', [
                'user' => $expect['user']
            ]
        );
        $token = $response->getContent();
        $response = $this->post('/api/login', ['token' => $token]);
        $loginResponse = $response->json();
        $response->assertStatus(200);
        $this->assertNotEmpty($loginResponse);
    }

    /**
     * @param array $expect
     * @return void
     * @dataProvider AuthDataProvider
     */
    public function testAuth(array $expect): void
    {
        UsersSeeders::seed();
        $this->assertDatabaseHas(User::TABLE, [
            User::EMAIL => $expect['user']['email'],
        ]);
        //token
        $response = $this->post(
            '/api/code-jwt', [
                'user' => $expect['user']
            ]
        );
        $token = $response->getContent();
        $response->assertStatus(200);
        $this->assertNotEmpty($token);

        //login
        $response = $this->post('/api/login', ['token' => $token]);
        $token = $response->getContent();
        $response->assertStatus(200);
        $this->assertAuthenticated();
        $this->assertNotEmpty($token);

        //profile
        $response = $this->get('/api/profile');
        $profile = $response->json();
        $response->assertStatus(200);
        $this->assertAuthenticated();
        $this->assertNotEmpty($profile);

        //logout
        $this->assertAuthenticated();
        $response = $this->get('/api/logout');
        $response->assertStatus(200);
        $this->assertGuest();
    }
}
