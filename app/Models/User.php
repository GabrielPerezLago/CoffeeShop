<?php

namespace App\Models;


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

    public function create(string $name, string $email, string $password, ?string $rol = null): ?string
    {
        if (self::isCollectionNull()) return null;

        $email = strtolower(trim($email));

        if ($this->findByEmail($email))
            throw new RuntimeException('El usuario ya existe');

        $response = self::$userCollection->insertOne([
            'name' => trim($name),
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'rol' => $rol !== null ? ROLES::valueOf($rol) ?? ROLES::CUSTOMER->value : ROLES::CUSTOMER->value
        ]);

        return (string) $response->getInsertedId();
    }

    public function createAndGet(string $name, string $email, string $password, ?string $rol = null)
    {
        if (self::isCollectionNull()) return null;

        $email = strtolower(trim($email));

        if ($this->findByEmail($email))
            throw new RuntimeException('El usuario ya existe');

        $response = self::$userCollection->insertOne([
            'name' => trim($name),
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'rol' => $rol !== null ? ROLES::valueOf($rol) ?? ROLES::CUSTOMER->value : ROLES::CUSTOMER->value
        ]);

        return $this->findById($response->getInsertedId());
    }


    public function findByEmail(string $email)
    {
        return self::$userCollection->findOne(['email' => strtolower(trim($email))]);
    }

    public function findById(string $_id)
    {
        return self::$userCollection->findOne(['_id' => new \MongoDB\BSON\ObjectId($_id)]);
    }

    public function getAll(): ?array
    {
        return iterator_to_array(self::$userCollection->find()) ?? null;
    }


}