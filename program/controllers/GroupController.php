<?php
include_once("conf.php");
include_once("models/Group.php");
include_once("views/GroupView.php");

class GroupController {
  private $group;

  function __construct(){
    $this->group = new Group(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    // membuka koneksi ke database
    $this->group->open();
    // mengambil data grup
    $this->group->getGroup();

    $data = array(
      'grup' => array(),
    );

    // memasukan setiap baris hasil query ke dalam array
    while($row = $this->group->getResult()){
      array_push($data['grup'], $row);
    }

    // menutup koneksi database
    $this->group->close();

    // memanggil view GroupView untuk menampilkan data grup
    $view = new GroupView();
    $view->render($data);
  }

  
  function add($data){
    $this->group->open();
    $this->group->add($data);
    $this->group->close();
    
    header("location:group.php");
  }

  function edit($id, $data){
    $this->group->open();
    $this->group->edit($id, $data);
    $this->group->close();
    
    header("location:group.php");
  }

  function delete($id){
    $this->group->open();
    $this->group->delete($id);
    $this->group->close();
    
    header("location:group.php");
  }

  function addForm(){
    $this->group->open();
    $this->group->getGroup();
    $data = array(
      'grup' => array(),
    );

    while($row = $this->group->getResult()){
      array_push($data['grup'], $row);
    }

    $this->group->close();

    $view = new GroupView();
    $view->addForm($data);
  }
  
  function editForm($id){
    $this->group->open();
    $this->group->getGroupByID($id);

    $data = array(
      'grup' => array(),
    );
    while($row = $this->group->getResult()){
      array_push($data['grup'], $row);
    }

    $this->group->close();

    $view = new GroupView();
    $view->editForm($data);
  }

}