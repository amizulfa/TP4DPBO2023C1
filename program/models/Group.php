<?php

class Group extends DB
{
    function getGroup()
    {
        // query untuk memilih semua data pada tabel grup
        $query = "SELECT * FROM grup";
        return $this->execute($query);
    }
    
    function getGroupByID($id)
    {
        // query untuk memilih data dari tabel grup berdasarkan id yang cocok
        $query = "SELECT * FROM grup Where id_grup='$id'";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama_grup = $data['nama_grup'];
        $nama_fandom = $data['nama_fandom'];
        $nama_agensi = $data['nama_agensi'];
        $debut = $data['debut'];

        // query untuk memasukan data grup ke dalam tabel grup berdasarkan id
        $query = "insert into grup values ('', '$nama_grup', '$nama_fandom', '$nama_agensi', '$debut')";

        // Mengeksekusi query
        return $this->execute($query);
    }
    
    function delete($id)
    {
        // query untuk menghapus data dari tabel grup berdasarkan id
        $query = "DELETE FROM grup WHERE id_grup= '$id'";
        
        // Mengeksekusi query
        return $this->execute($query);
    }
    
    function edit($id, $data)
    {
        $nama_grup = $data['nama_grup'];
        $nama_fandom = $data['nama_fandom'];
        $nama_agensi = $data['nama_agensi'];
        $debut = $data['debut'];

        // query untuk mengupdate data grup di tabel grup dengan mengambil nilai yang sudah ada berdasarkan id
        $query = "UPDATE grup set nama_grup='$nama_grup', nama_fandom='$nama_fandom', nama_agensi='$nama_agensi', debut='$debut' where id_grup=$id";

        // Mengeksekusi query
        return $this->execute($query);
    }
    
}


?>