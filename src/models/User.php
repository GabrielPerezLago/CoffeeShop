<?php

namespace models;

class User
{
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $rol;

    public function __construct($id, $nombre, $email, $password)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
    }

    public function id(int $id = null): int|null
    {
        if (!is_null($id))
        {
            $this->id = $id;
            return;
        }

        return $this->id;
    }



}