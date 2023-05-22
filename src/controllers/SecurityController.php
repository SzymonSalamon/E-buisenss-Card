<?php

require_once "AppController.php";
require_once __DIR__."/../models/User.php";
require_once __DIR__."/../repository/UserRepository.php";
class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['message' => ['User with this email not exits']]);
        }
        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }
        session_start();
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['privilage'] = $user->getPrivilage();
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/projects");
    }

    public function register()
    {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        $user = new User($email, $password, $name, $surname, 0,'normal');

        $userRepository->addUser($user);
        return $this->render('login', [
            'messages' => ["Udało sie zarejestrowac"]]);
    }

    public function adminpanel()
    {   session_start();
        if($_SESSION['privilage']=='admin'&&isset($_SESSION['user_id'])) {

            $userRepository = new UserRepository();
            session_start();
            $id = $_SESSION['user_id'];
            $user = $userRepository->getUserById($id);
            if ($user->getPrivilage() == 'admin') {
                $users = $userRepository->getUsers();
                $this->render('adminpanel', ['users' => $users]);
            } else
                $this->render('login');
        }
    }

    public function editUser(){
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('adminpanel');
        }
        $id = $_POST['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $privilage = $_POST['privilage'];
        $user = new User($email, $password, $name, $surname, $id,$privilage);
        $userRepository->editUser($user);
        $users = $userRepository->getUsers();
        return $this->render('adminpanel', ['users' => $users]);

    }
    public function deleteUser(){
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('adminpanel');
        }
        $id = $_POST['id'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $privilage = $_POST['privilage'];
        $user = new User($email, $password, $name, $surname, $id,$privilage);
        $userRepository->deleteUser($user);
        $users = $userRepository->getUsers();
        return $this->render('adminpanel', ['users' => $users]);
    }
}
