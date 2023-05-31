<?php
include_once("conf.php");
include_once("models/Members.php");
include_once("models/Group.php");
include_once("views/MembersView.php");

class MembersController
{
    private $members;
    private $grup;

    function __construct()
    {
        $this->members = new Members(conf::$db_host, conf::$db_user, conf::$db_pass, conf::$db_name);
        $this->grup = new Group(conf::$db_host, conf::$db_user, conf::$db_pass, conf::$db_name);
    }

    public function index()
    {
        $this->members->open();
        $this->members->getMembers();

        $data = array();
        while ($row = $this->members->getResult()) {
            array_push($data, $row);
        }
        $this->members->close();

        $view = new MembersView();
        $view->render($data);
    }

    public function delete($id)
    {
        $this->members->open();
        $this->members->delete($id);
        $this->members->close();
        header("location:index.php");
    }

    public function addMembers($data) 
    {
        $this->members->open();
        $this->members->addMembers($data);
        $this->members->close();
        header("location:index.php");
    }

    public function addForm() 
    {
        $this->grup->open();
        $this->grup->getGroup();
        
        $data = array();
        while ($row = $this->grup->getResult()) {
            array_push($data, $row);
        }
        $this->grup->close();
       
        $view = new MembersView();
        $view->addForm($data);
    }

    public function edit($id, $data)
    {
      
        $this->members->open();
        $this->members->edit($id, $data);
        $this->members->close();
        header("location:index.php");
    }

    public function editForm($id) 
    {
        $this->members->open();
        $this->members->getMembersById($id);
        $this->grup->open();
        $this->grup->getGroup();
        
        $dataGroup = array();
        
        while ($row = $this->grup->getResult()) {
            array_push($dataGroup, $row);
        }
        
        $dataMembers = array();
        while ($row = $this->members->getResult()) {
            array_push($dataMembers, $row);
        }

        $this->members->close();
        $this->grup->close();

        $view = new MembersView();
        $view->editForm($dataGroup, $dataMembers);
    }
}