<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Project.php';
require_once __DIR__."/../repository/ProjectRepository.php";
class ProjectController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];
    private $projectRepository;

    public function __construct()
    {
        parent::__construct();
        $this->projectRepository = new ProjectRepository();
    }
    public function projects(){
        session_start();
    if(!isset($_SESSION['user_id'])) {
        $this->render('login', ['messages' => ['No Session please log in!']]);
    }
    else {
        $projects = $this->projectRepository->getProjects();
        $this->render('projects', ['projects' => $projects]);
    }
    }
    public function addProject()
    {
        session_start();
        if(!isset($_SESSION['user_id'])) {
           return $this->render('login', ['messages' => ['No Session please log in!']]);
        }
            if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
                move_uploaded_file(
                    $_FILES['file']['tmp_name'],
                    dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['file']['name']
                );

                // TODO create new project object and save it in database
                $project = new Project($_POST['title'], $_POST['description'], $_POST['color'], $_POST['skills'], $_POST['name'], $_POST['surname'], $_POST['company'], $_POST['phone'], $_POST['email'], $_POST['www'], $_POST['location'], $_POST['FbLink'], $_POST['InstagramLink'], $_POST['LinkedInLink'], $_FILES['file']['name']);
                $this->projectRepository->addProject($project);
                return $this->render('projects', [
                    'projects' => $this->projectRepository->getProjects(),
                    'messages' => $this->message]);
            }
            return $this->render('add-project', ['messages' => $this->message]);
    }
    public function editProject(){
        session_start();
        if(!isset($_SESSION['user_id'])) {
            return $this->render('login', ['messages' => ['No Session please log in!']]);
        }
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            // TODO create new project object and save it in database
            $project = new Project($_POST['title'], $_POST['description'], $_POST['color'], $_POST['skills'], $_POST['name'] ,$_POST['surname'], $_POST['company'], $_POST['phone'], $_POST['email'], $_POST['www'], $_POST['location'], $_POST['FbLink'], $_POST['InstagramLink'], $_POST['LinkedInLink'], $_FILES['file']['name']);
            $project->setId($_POST['hidden_id']);
            $this->projectRepository->editProject($project);
            return $this->render('projects', [
                'projects' => $this->projectRepository->getProjects(),
                'messages' => $this->message]);
        }
        if(!empty($_POST['title'])){
            $project = new Project($_POST['title'], $_POST['description'], $_POST['color'], $_POST['skills'], $_POST['name'] ,$_POST['surname'], $_POST['company'], $_POST['phone'], $_POST['email'], $_POST['www'], $_POST['location'], $_POST['FbLink'], $_POST['InstagramLink'], $_POST['LinkedInLink'], $_FILES['file']['name']);
            $project->setId($_POST['hidden_id']);
            $this->projectRepository->editProjectNoImage($project);
            return $this->render('projects', [
                'projects' => $this->projectRepository->getProjects(),
                'messages' => $this->message]);
        }
        $id = $_POST['hidden_id'];
        return $this->render('edit-project',['project'=> $this->projectRepository->getProject($id)]);
    }
    public function deleteProject(){
        $project = new Project($_POST['title'], $_POST['description'], $_POST['color'], $_POST['skills'], $_POST['name'] ,$_POST['surname'], $_POST['company'], $_POST['phone'], $_POST['email'], $_POST['www'], $_POST['location'], $_POST['FbLink'], $_POST['InstagramLink'], $_POST['LinkedInLink'], $_FILES['file']['name']);
        $project->setId($_POST['hidden_id']);
        $this->projectRepository->deleteProject($project);
        $projects = $this->projectRepository->getProjects();
        return $this->render('projects', ['projects' => $projects]);
    }

    public function search()
    {
        session_start();
        if(!isset($_SESSION['user_id'])) {
            return $this->render('login', ['messages' => ['No Session please log in!']]);
        }
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->projectRepository->getProjectByTitle($decoded['search']));
        }
    }
    public function searchMyProject()
    {
        session_start();
        if(!isset($_SESSION['user_id'])) {
            return $this->render('login', ['messages' => ['No Session please log in!']]);
        }
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->projectRepository->getProjectById($decoded['search']));
        }
    }
    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }

}