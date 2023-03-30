<?php

class User
{
    private int $id;
    private string $username;
    private string $password;
    private int $permission;

    // First, I have all relevant getters and setters

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return int
     */
    public function getPermission(): int
    {
        return $this->permission;
    }

    // This method checks whether the user is an admin or not

    public function isAdmin(): bool
    {
        return $this->permission === 1;
    }

    // This method returns a user by its username

    public static function find(string $username): User|bool
    {
        $pdo = Database::getConnection();

        $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');
        $statement->execute(['username' => $username]);
        $user = $statement->fetchObject(User::class);

        if (!$user) {
            return false;
        }

        return $user;
    }

    // This method returns a user by its id

    public static function findUsernameById(int $id): string
    {
        $pdo = Database::getConnection();

        $statement = $pdo->prepare('SELECT username FROM users WHERE id = :id');
        $statement->execute(['id' => $id]);
        $user = $statement->fetchObject(User::class);

        if (!$user) {
            return false;
        }

        return $user->getUsername();
    }

    // This method is used to register a new user

    public static function create(string $username, string $password, int $permission = 0): User
    {
        $pdo = Database::getConnection();

        $statement = $pdo->prepare('INSERT INTO users (username, password, permission) VALUES (:username, :password, :permission)');
        $statement->execute(['username' => $username, 'password' => $password, 'permission' => $permission]);
        return self::find($username);
    }
}
