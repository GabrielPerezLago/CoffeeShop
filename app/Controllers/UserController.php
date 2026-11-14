<?php

namespace App\Controllers;

use app\Models\User;

class UserController
{
    private static ?User $user;

    public function __construct()
    {
        self::$user = new User();
    }

    private static function isUserModelNull(): bool
    {
        return !isset(self::$user) && is_null(self::$user);
    }

    public static function login(string $email, string $password): void
    {
        if (self::isUserModelNull()) return;

        $user = self::$user->findByEmail($email);

        if (!password_verify($password, $user['password'])) return;

        session_start($user);


    }


}