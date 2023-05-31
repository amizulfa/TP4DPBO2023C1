<?php

  class GroupView {
    public function render($data){
      $no = 1; // variabel untuk nomor ururt
      $dataGroup = null;  // variabel untu menyimpan data grup dalam bentuk html
      
      
      foreach($data['grup'] as $val){
        list($id_grup, $nama_grup, $nama_fandom, $nama_agensi, $debut) = $val;
        $dataGroup .= '<tr>
                <td>' . $no. '</td>
                <td>' . $id_grup. '</td>
                <td>' . $nama_grup. '</td>
                <td>' . $nama_fandom. '</td>
                <td>' . $nama_agensi. '</td>
                <td>' . $debut. '</td>
                <td>
                  <a href="group.php?id=' . $id_grup.  '" class="btn btn-warning">Edit</a>
                  <a href="group.php?hapus=' . $id_grup. '" class="btn btn-danger">Hapus</a>
                </td>
              </tr>';
              $no++;
      }

      $data_active = null; // menyimpan variabel nav link active pada page grup dalam bentuk html
      $data_active .=
      '<li class="nav-item">
        <a class="nav-link " aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="group.php">Group</a>
      </li>';

      $tpl = new Template("templates/index.html");
      $tpl->replace("DATA_TITLE", "Grup");
      $tpl->replace("DATA_TABLE", $dataGroup);
      $tpl->replace("DATA_SATU", "Id Grup");
      $tpl->replace("DATA_DUA", "Nama Grup");
      $tpl->replace("DATA_TIGA", "Nama Fandom");
      $tpl->replace("DATA_EMPAT", "Nama Agensi");
      $tpl->replace("DATA_LIMA", "Debut");
      $tpl->replace("DATA_ACTIVE_NAVBAR", $data_active);
      $tpl->replace("DATA_LINK_FORM", "group.php?addForm=true");
      $tpl->write(); 
    }

    public function addForm($data)
    {
      $dataForm = null;
        $dataForm .= '
        <label for="nama_grup" class="form-label">Nama Group</label>
        <input type="text" class="form-control" id="nama_grup" name="nama_grup" placeholder="Masukan Nama Group" required />
        
        <label for="nama_fandom" class="form-label">Fandom Group</label>
        <input type="text" class="form-control" id="nama_fandom" name="nama_fandom" placeholder="Masukan Fandom Group" required />
        
        <label for="nama_agensi" class="form-label">Agensi Group</label>
        <input type="text" class="form-control" id="nama_agensi" name="nama_agensi" placeholder="Masukan Agensi Group" required />
        
        <label for="debut" class="form-label">Debut Group</label>
        <input type="date" class="form-control" id="debut" name="debut" placeholder="Masukan Tanggal Debut Group" required />
        
        <button type="submit" name="btn-submit" class="btn btn-primary mt-3">Submit</button>
        ';

        $data_active = null;
        $data_active .=
        '<li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="group.php">Group</a>
        </li>';

      $tpl = new Template("templates/form.html");
      $tpl->replace("DATA_TITLE","Tambah Grup");
      $tpl->replace("DATA_FORM", $dataForm);
      $tpl->replace("DATA_LINK", "group.php");
      $tpl->replace("DATA_ACTIVE_NAVBAR", $data_active);
      $tpl->write(); 
    }

    public function editForm($data)
    {
      $dataForm = null;
      foreach ($data['grup'] as $val) {
        list($id_grup, $nama_grup, $nama_fandom, $nama_agensi, $debut) = $val;
        $dataForm .= '
        <label for="nama_grup" class="form-label">Nama Group</label>
        <input type="hidden" name="id" value="' . $id_grup. '">
        <input type="text" class="form-control" id="nama_grup" name="nama_grup" value="' . $nama_grup. '" placeholder="Masukan Nama Group" required />
        
        <label for="nama_fandom" class="form-label">Email Group</label>
        <input type="text" class="form-control" id="nama_fandom" name="nama_fandom" value="' . $nama_fandom. '" placeholder="Masukan Email Group" required />
        
        <label for="nama_agensi" class="form-label">Phone Group</label>
        <input type="text" class="form-control" id="nama_agensi" name="nama_agensi" value="' . $nama_agensi. '" placeholder="Masukan Phone Group" required />
        
        <label for="debut" class="form-label">Debut Group</label>
        <input type="date" class="form-control" id="debut" name="debut" value="' . $debut. '" placeholder="Masukan Tanggal Join Group" required />
        
        <button type="submit" name="btn-update" id="btn-submit" class="btn btn-primary mt-3">Submit</button>
        ';
      }
      
      $data_active = null;
      $data_active .=
      '<li class="nav-item">
        <a class="nav-link " aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="group.php">Group</a>
      </li>';

      $tpl = new Template("templates/form.html");
      $tpl->replace("DATA_FORM", $dataForm);
      $tpl->replace("DATA_TITLE","Edit Grup");
      $tpl->replace("DATA_LINK", "group.php");
      $tpl->replace("DATA_ACTIVE_NAVBAR", $data_active);
      $tpl->write(); 
    }
  }
?>