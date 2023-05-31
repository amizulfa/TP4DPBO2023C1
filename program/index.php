<!-- Saya Amida Zulfa Laila dengan NIM 2101147 mengerjakan Tugas Praktikum 4 dalam mata
kuliah Desain Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak
melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin. -->

<?php
include_once("models/Template.php");
include_once("models/DB.php");
include_once("controllers/MembersController.php");

// membuat objek MembersController
$members = new MembersController();

if (isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        $members->delete($id);
}

if (isset($_POST['btn-submit'])) {
        $members->addMembers($_POST);
} else if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $members->editForm($id); 
} else if (isset($_POST['btn-update'])) {
        $id = $_POST['id'];
        $members->edit($id, $_POST);
} else if(!empty($_GET['addForm'])){
        $members->addForm(); 
}else{
        $members->index();
}
?>