<?php

class User
{
    private $email;
    private $password;
    private $name;
    private $surname;
    private $id;
    private $privilage;


    public function __construct(string $email, string $password, string $name, string $surname, int $id, string $privilage)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->id = $id;
        $this->privilage = $privilage;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail(string $email)
    {
        $this->email = $email;
    }


    public function getPassword(): string
    {
        return $this->password;
    }


    public function setPassword(string $password)
    {
        $this->password = $password;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPrivilage(): string
    {
        return $this->privilage;
    }

    public function setPrivilage(string $privilage): void
    {
        $this->privilage = $privilage;
    }


}