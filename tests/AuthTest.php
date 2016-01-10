<?php

use Illuminate\Support\Facades\Lang;

class AuthTest extends TestCase
{
    const USERNAME = 'testuser';
    const PASSWORD = 'testpass';
    const EMAIL = 'test@email.test';

    /**
     * Tests new user registration.
     */
    public function testNewUserRegistration()
    {
        $this->visit('/register')
            ->submitForm('submit', [
                'username' => $this::USERNAME,
                'email' => $this::EMAIL,
                'password' => $this::PASSWORD,
                'password_confirmation' => $this::PASSWORD,
            ])
            ->seeInDatabase('users', [
                'username' => $this::USERNAME,
                'email' => $this::EMAIL,
            ])
            ->seePageIs('/home');
    }

    /**
     * Tests user logout.
     *
     * @depends testNewUserRegistration
     */
    public function testUserLogout()
    {
        $this->visit('/logout')
            ->seePageIs('/');
    }

    /**
     * Tests user login.
     *
     * @depends testNewUserRegistration
     * @depends testUserLogout
     */
    public function testUserLogin()
    {
        // TODO: Get this test to pass without explicitly calling these functions (or seed data)
        $this->testNewUserRegistration();
        $this->testUserLogout();

        $this->visit('/login')
            ->submitForm('submit', [
                'email' => $this::EMAIL,
                'password' => $this::PASSWORD,
            ])
            ->seePageIs('/home');
    }

    /**
     * Tests duplicate user registration.
     *
     * @depends testNewUserRegistration
     * @depends testUserLogout
     */
    public function testDuplicateUserRegistration()
    {
        // TODO: Get this test to pass without explicitly calling these functions (or seed data)
        $this->testNewUserRegistration();
        $this->testUserLogout();

        $this->visit('/register')
            ->submitForm('submit', [
                'username' => $this::USERNAME,
                'email' => $this::EMAIL,
                'password' => $this::PASSWORD,
                'password_confirmation' => $this::PASSWORD,
            ])
            ->see(Lang::get('validation.unique', ['attribute' => 'username']));
    }

    /**
     * Tests invalid user login.
     */
    public function testInvalidUserLogin()
    {
        $this->visit('/login')
            ->submitForm('submit', [
                'email' => $this::EMAIL,
                'password' => $this::PASSWORD . 'wrong',
            ])
            ->see(Lang::get('auth.failed'));
    }
}
