<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['id'],
            $user['privilage']
        );
    }
    public function getUserById(int $id): ?User
    {
        $stmt = $this->database->connect()->prepare('
SELECT * FROM public.users WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['id'],
            $user['privilage']
        );
    }
    public function addUser(User $user) :void
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO users (email,password,name,surname)
        VALUES (?, ?, ?, ?)
        ');
        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $user->getName(),
            $user->getSurname()
        ]);
    }
    public function getUsers(): array{
        $result =[];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users
        ');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($users as $user){
            $result[] = new User(
                $user['email'],
                $user['password'],
                $user['name'],
                $user['surname'],
                $user['id'],
                $user['privilage']
            );
        }
        return $result;
    }
    public function deleteUser(User $user) :void
    {
        $stmt = $this->database->connect()->prepare('
        DELETE FROM users where id=?
        ');
        $stmt->execute([
            $user->getId()
            ]);
    }
    public function editUser(User $user) :void
    {
        $stmt = $this->database->connect()->prepare('
        UPDATE users SET email=?, password=?, name=?, surname=?, privilage=? WHERE id=?
        ');
        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $user->getName(),
            $user->getSurname(),
            $user->getPrivilage(),
            $user->getId()
        ]);
    }

}