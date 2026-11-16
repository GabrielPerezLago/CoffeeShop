<?php

namespace App\Controllers;

use App\Models\User;
use app\Security\ROLES;

class UserController
{
    private ?User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function login(string $email, string $password): void
    {
        try
        {

            $user = $this->user->findByEmail($email);



            if (!password_verify($password, $user['password'])) return;

            session_regenerate_id(true);

            $_SESSION['rol'] = $user['rol'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_id'] = $user['_id'];
            $_SESSION['username'] = $user['name'];
        }
        catch (\RuntimeException $excp)
        {
            $error = $excp->getMessage();
        }
    }

    public function register( string $name, string $email, string $password, ?string $rol): void
    {
        try
        {
            $user = $this->user->findByEmail($email);
            if ($user != null) return;

            $user = $this
                ->user
                ->createAndGet($name, $email, $password, $rol);
            if (is_null($user)) return;

            session_regenerate_id(true);
            $_SESSION['rol'] = $user['rol'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_id'] = $user['_id'];
            $_SESSION['username'] = $user['name'];

        }
        catch (\RuntimeException $excp)
        {
            $error = $excp->getMessage();
        }
    }

    public function logout(): void
    {
        $_SESSION = [];
        session_destroy();
    }


}