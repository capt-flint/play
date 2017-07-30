<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationTest extends TestCase
{

    use WithoutMiddleware;

    /**
     * Test user registration
     *
     */
    public function testNewUserRegistration()
    {
        $userData =[
            'name' => 'bob',
            'email' => 'bob@mail.ua',
            'password' => 'qwe123',
            'password_confirmation' => 'qwe123'
        ];

        $this->post('/register' , $userData);

        $user = User::where('name', 'bob')->first();
        $this->assertEquals($user->name, $userData['name']);
        $user->delete();

    }
}
