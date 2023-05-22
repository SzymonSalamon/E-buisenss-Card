<?php

class Project {
    private $title;
    private $description;
    private $skill;
    private $name;
    private $surname;
    private $company;
    private $phone;
    private $email;
    private $site;
    private $location;
    private $fb;
    private $insta;
    private $linked;
    private $image;
    private $background;
    private $owner;
    private $id=null;

    public function __construct($title, $description, $background, $skill, $name, $surname, $company, $phone, $email, $site, $location, $fb, $insta, $linked, $image)
    {
        session_start();
        $this->title = $title;
        $this->description = $description;
        $this->background = $background;
        $this->skill = $skill;
        $this->name = $name;
        $this->surname = $surname;
        $this->company = $company;
        $this->phone = $phone;
        $this->email = $email;
        $this->site = $site;
        $this->location = $location;
        $this->fb = $fb;
        $this->insta = $insta;
        $this->linked = $linked;
        $this->image = $image;
        $this->owner = $_SESSION['user_id'];
    }

    public function getOwner()
    {
        return $this->owner;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getSkill()
    {
        return $this->skill;
    }

    public function setSkill($skill): void
    {
        $this->skill = $skill;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company): void
    {
        $this->company = $company;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color): void
    {
        $this->color = $color;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function setSite($site): void
    {
        $this->site = $site;
    }

    public function getLocation()
    {
        return $this->location;
    }


    public function setLocation($location): void
    {
        $this->location = $location;
    }


    public function getFb()
    {
        return $this->fb;
    }


    public function setFb($fb): void
    {
        $this->fb = $fb;
    }

    public function getInsta()
    {
        return $this->insta;
    }

    public function setInsta($insta): void
    {
        $this->insta = $insta;
    }

    public function getLinked()
    {
        return $this->linked;
    }

    public function setLinked($linked): void
    {
        $this->linked = $linked;
    }

    public function getBackground()
    {
        return $this->background;
    }

    public function setBackground($background): void
    {
        $this->background = $background;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

}