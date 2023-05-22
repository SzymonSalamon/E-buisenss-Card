<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Project.php';

class ProjectRepository extends Repository
{

    public function getProject(int $id): ?Project
    {
        $stmt = $this->database->connect()->prepare('
SELECT * FROM projects WHERE project_id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $project = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($project == false) {
            return null;
        }
        $card = new Project($project['project_name'],$project['description'],$project['background'],$project['skill'],$project['p_name'],$project['surname'], $project['company'],$project['phone'],$project['email'],$project['www'],$project['location'],$project['fb_link'],$project['instagram_link'],$project['linkedin_link'],$project['logo'],$project['id_owner']);
        $card->setId($id);
        return $card;
    }
    public function addProject(Project $project) :void
    {
        $stmt = $this->database->connect()->prepare('
        INSERT INTO projects (project_name,id_owner,background,description,skill,p_name,surname,company,phone,email,www,location,fb_link,instagram_link,linkedin_link,logo)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');
        $assignedByid = $_SESSION['user_id'];
        $stmt->execute([
            $project->getTitle(),
            $assignedByid,
            $project->getBackground(),
            $project->getDescription(),
            $project->getSkill(),
            $project->getName(),
            $project->getSurname(),
            $project->getCompany(),
            $project->getPhone(),
            $project->getEmail(),
            $project->getSite(),
            $project->getLocation(),
            $project->getFb(),
            $project->getInsta(),
            $project->getLinked(),
            $project->getImage()
        ]);
    }
    public function getProjects(): array{
        $result =[];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM projects
        ');
        $stmt->execute();
        $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($projects as $project){
            $result[] = new Project(
                $project['project_name'],$project['description'],$project['background'],$project['skill'],$project['p_name'],$project['surname'], $project['company'],$project['phone'],$project['email'],$project['www'],$project['location'],$project['fb_link'],$project['instagram_link'],$project['linkedin_link'],$project['logo'],$project['id_owner']
            );
        }
        return $result;
    }
    public function getProjectByTitle(string $searchString){
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM projects WHERE LOWER(description) LIKE :search OR LOWER(skill) LIKE :search'
        );
        $stmt->bindParam(':search',$searchString,PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProjectById(){
        session_start();
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM projects WHERE id_owner=:search'
        );
        $stmt->bindParam(':search',$_SESSION['user_id'],PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function editProject(Project $project) :void
    {
        $stmt = $this->database->connect()->prepare('
        UPDATE projects SET project_name = ?, id_owner = ?, background=?, description = ?, skill=?, p_name=?, surname=?, company=?, phone=?, email=?, www=?, location=?, fb_link=?, instagram_link=?, linkedin_link=?, logo=?  WHERE project_id = ?
        ');
        session_start();
        $assignedByid = $_SESSION['user_id'];
        $stmt->execute([
            $project->getTitle(),
            $assignedByid,
            $project->getBackground(),
            $project->getDescription(),
            $project->getSkill(),
            $project->getName(),
            $project->getSurname(),
            $project->getCompany(),
            $project->getPhone(),
            $project->getEmail(),
            $project->getSite(),
            $project->getLocation(),
            $project->getFb(),
            $project->getInsta(),
            $project->getLinked(),
            $project->getImage(),
            $_POST['hidden_id']
        ]);
    }
    public function deleteProject(Project $project) :void
    {
        $stmt = $this->database->connect()->prepare('
        DELETE FROM projects where project_id=?
        ');
        $stmt->execute([
            $project->getId()
        ]);
    }

    public function editProjectNoImage(Project $project) :void
    {
        $stmt = $this->database->connect()->prepare('
        UPDATE projects SET project_name = ?, id_owner = ?, background=?, description = ?, skill=?, p_name=?, surname=?, company=?, phone=?, email=?, www=?, location=?, fb_link=?, instagram_link=?, linkedin_link=?  WHERE project_id = ?
        ');
        session_start();
        $assignedByid = $_SESSION['user_id'];
        $stmt->execute([
            $project->getTitle(),
            $assignedByid,
            $project->getBackground(),
            $project->getDescription(),
            $project->getSkill(),
            $project->getName(),
            $project->getSurname(),
            $project->getCompany(),
            $project->getPhone(),
            $project->getEmail(),
            $project->getSite(),
            $project->getLocation(),
            $project->getFb(),
            $project->getInsta(),
            $project->getLinked(),
            $_POST['hidden_id']
        ]);
    }
}