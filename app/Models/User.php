<?php

namespace app\Models;


use http\Exception\RuntimeException;
use MongoDB\Collection;
use App\DB\MongoConnect;
use App\Security\ROLES;

class User
{
    private static string $docName = 'users';
    private static Collection $userCollection;
    public function __construct()
    {
        self::$userCollection = MongoConnect::client()->selectCollection(self::$docName);
    }

    private static function isCollectionNull(): bool
    {
        return !isset(self::$userCollection) && is_null(self::$userCollection);
    }

    public function create(string $name, string $email, string $password, ROLES|null $rol = null): string | null
    {
        if (self::isCollectionNull()) return null;

        $email = strtolower(trim($email));

        if ($this->findByEmail($email))
            throw new RuntimeException('El usuario ya existe');

        $response = self::$userCollection->insertOne([
            'nombre' => trim($name),
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'rol' => is_null($rol) ? ROLES::valueOf($rol) : ROLES::CUSTOMER->value
        ]);

        return (string) $response->getInsertedId();
    }


    public function findByEmail(string $email): ?array
    {
        return self::$userCollection->findOne(['email' => strtolower(trim($email))]);
    }

    public function getAll(): ?array
    {
        return iterator_to_array(self::$userCollection->find()) ?? null;
    }


}