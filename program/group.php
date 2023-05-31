<?php
include_once("models/Template.php");
include_once("models/DB.php");
include_once("controllers/GroupController.php");

// membuat objek GroupController
$group = new GroupController();

if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
    
        $group->delete($id);

}

if (isset($_POST['btn-submit'])) {
        $group->add($_POST);
    } else if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $group->editForm($id); 
    } else if (isset($_POST['btn-update'])) {
        $id = $_POST['id'];
        $group->edit($id, $_POST);
    } else if(!empty($_GET['addForm'])){
        $group->addForm(); 
    }else {
        $group->index();
    }


