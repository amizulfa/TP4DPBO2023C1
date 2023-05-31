<?php

class Members extends DB
{
    function getMembers()
    {
        // query join member dengan grup
        $query = "SELECT * FROM members JOIN grup ON members.id_grup=grup.id_grup ORDER BY members.ID";
        return $this->execute($query);
    }

    function getMembersById($id)
    {
        // mengambil data members berdasarkan id
        $query = "SELECT * FROM members WHERE ID=$id;";
        return $this->execute($query);
    }

    function addMembers($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_grup = $data['id_grup'];

        // query untuk menambahkan members ke tabel members
        $query = "INSERT INTO members VALUES('', '$name', '$email', '$phone', '$join_date', '$id_grup');";

        return $this->execute($query);
    }

    function edit($id, $data)
    {
        $id_grup = $data['id_grup'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];

        // query untuk mengupdate data members di tabel members berdasarkan id
        $query = "UPDATE members SET id_grup='$id_grup', NAME='$name', EMAIL='$email', PHONE='$phone', JOIN_DATE='$join_date' WHERE ID='$id';";

        return $this->execute($query);
    }

    function delete($id)
    {
        // query untuk menghapus data members dari tabel members berdasarkan id
        $query = "DELETE FROM members WHERE ID=$id";
        return $this->execute($query);
    }
}