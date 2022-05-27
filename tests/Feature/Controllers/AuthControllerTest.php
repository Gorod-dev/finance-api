<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;


    /**
     * @return void
     */
    public function test_login(): void
    {
        $this->setUpFaker();
        $name = $this->faker->name;
        $email = $this->faker->email;
        $password = $this->faker->password;

        $user = User::create(
            [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]
        );

        $response = $this->withHeader('Accept', 'application/json')->post(
            '/api/authentication/login',
            [
                'email' => $email,
                'password' => $password
            ]
        );

        $response->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) => $json
                ->where('status', 'success')
                ->where('message', 'User login in successfully')
                ->has('user')
                ->where('user.name', $user->name)
                ->where('user.email', $user->email)
                ->where('user.id', $user->id)
                ->where('user.email_verified_at', $user->email_verified_at)
                ->has('user.updated_at')
                ->has('user.created_at')
                ->has('authorisation')
                ->has('authorisation.token')
                ->where('authorisation.type', 'bearer')
            );
    }

    /**
     * @return void
     */
    public function test_register(): void
    {
        $this->setUpFaker();
        $name = $this->faker->name;
        $email = $this->faker->email;
        $password = $this->faker->password;

        $response = $this->withHeader('Accept', 'application/json')->post(
            '/api/authentication/register',
            [
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]
        );

        $response->assertStatus(201)
            ->assertJson(fn(AssertableJson $json) => $json
                ->where('status', 'success')
                ->where('message', 'User created successfully')
                ->has('user')
                ->where('user.name', $name)
                ->where('user.email', $email)
                ->has('user.updated_at')
                ->has('user.created_at')
                ->has('user.id')
                ->has('authorisation')
                ->has('authorisation.token')
                ->where('authorisation.type', 'bearer')
            );

        $this->assertDatabaseHas(
            'users',
            [
                'name' => $name,
                'email' => $email,
            ]
        );
    }


    /**
     * @return void
     */
    public function test_logout(): void
    {
        $this->setUpFaker();
        $name = $this->faker->name;
        $email = $this->faker->email;
        $password = $this->faker->password;

        User::create(
            [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]
        );

        $token = Auth::attempt([
            'email' => $email,
            'password' => $password,
        ]);

        $response = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ]
        )->post('/api/authentication/logout');

        $response->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) => $json
                ->where('status', 'success')
                ->where('message', 'Successfully logged out')
            );
    }


    /**
     * @return void
     */
    public function test_refresh(): void
    {
        $this->setUpFaker();
        $name = $this->faker->name;
        $email = $this->faker->email;
        $password = $this->faker->password;

        $user = User::create(
            [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]
        );

        $token = Auth::attempt([
            'email' => $email,
            'password' => $password,
        ]);

        $response = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ]
        )->post('/api/authentication/refresh');

        $response->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) => $json
                ->where('status', 'success')
                ->has('user')
                ->where('user.name', $user->name)
                ->where('user.email', $user->email)
                ->where('user.id', $user->id)
                ->where('user.email_verified_at', $user->email_verified_at)
                ->has('user.updated_at')
                ->has('user.created_at')
                ->has('authorisation')
                ->has('authorisation.token')
                ->where('authorisation.type', 'bearer')
            );
    }

    /**
     * @return void
     */
    public function test_me(): void
    {
        $this->setUpFaker();
        $name = $this->faker->name;
        $email = $this->faker->email;
        $password = $this->faker->password;

        $user = User::create(
            [
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]
        );

        $token = Auth::attempt([
            'email' => $email,
            'password' => $password,
        ]);

        $response = $this->withHeaders(
            [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ]
        )->post('/api/authentication/me');

        $response->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) => $json
                ->where('status', 'success')
                ->has('user')
                ->where('user.name', $user->name)
                ->where('user.email', $user->email)
                ->where('user.id', $user->id)
                ->where('user.email_verified_at', $user->email_verified_at)
                ->has('user.updated_at')
                ->has('user.created_at')
            );
    }

}
