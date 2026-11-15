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

    public function login(final string $email, final string $password): void
    {
        try
        {
            if (self::isUserModelNull()) return;

            $user = self::$user->findByEmail($email);

            if (!password_verify($password, $user['password'])) return;

            session_regenerate_id(true);

            $_SESSION['rol'] = $user['rol'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['usename'] = $user['name'];
        }
        catch (\RuntimeException $excp)
        {
            $error = $esxcp->getMessage();
        }
    }

    public function regiter(final string $name, final string $email, final string $password, ?string $rol): void
    {
        try
        {
            if (self::isUserModelNull()) return;
            $user = self::$user->findByEmail($_POST['email']);
            if ($user != null) return;

            $user = self::$user->create($name, $email, $password, $rol ?? null);

            if (is_null($user)) return;

            session_regenerate_id(true);
            $_SESSION['rol'] = $user['rol'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['name'];

        }
        catch (\RuntimeException $excp)
        {
            $error = $excp->getMessage();
        }
    }


}