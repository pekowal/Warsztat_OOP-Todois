<?php


class Task
{

    static public function GetAllTasks(mysqli $conn)
    {
        $sql = "SELECT * FROM Tasks";

        $result = $conn->query($sql);

        $toReturn = [];

        if ($result != false) {
            foreach ($result as $row) {
                $newTask = new Task();
                $newTask->id = $row['id'];
                $newTask->name = $row['task_name'];
                $newTask->content = $row['task_description'];
                $newTask->finished = $row['finished'];
                $newTask->priority = $row['task_priority'];

                $toReturn[] = $newTask;
            }
        }

        return $toReturn;
    }

    private $id;
    private $name;
    private $content;
    private $finished;
    private $priority;

    public function __construct()
    {
        $this->id = -1;
        $this->setName('');
        $this->setContent('');
        $this->finished = false;
        $this->priority = 0;

    }

    public function getName()
    {
        return $this->name;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setPriority($newPriority)
    {
        $this->priority = $newPriority;


    }

    public function getId()
    {
        return $this->id;
    }


    public function getPriority()
    {
        return $this->priority;
    }

    public function getFinished(){
        return $this->finished;
    }

    public function saveToDB(mysqli $conn)
    {

        $sql = "INSERT INTO Tasks(task_name,task_description,task_priority)
                VALUES ('{$this->name}','{$this->content}','{$this->priority}')";

        $result = $conn->query($sql);

        if ($result === true) {
            return true;
        }
        return false;
    }
    
    public function endTask(Mysqli $conn){
        $sql = "UPDATE Tasks SET finished=1 WHERE id={$this->id}";
        
        $result = $conn->query($sql);
        return $result;
    }
    
    public function loadFromDB(mysqli $conn)
    {
       
    }
}