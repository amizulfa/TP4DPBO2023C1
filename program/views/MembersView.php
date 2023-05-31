<?php

  class MembersView {
    public function render($data){
      $no = 0;
      $dataMembers = null;
      foreach($data as $val){

        $dataMembers .= '<tr>
                <th scope="row">' . ++$no . '</th>
                <td>' . $val['name'] . '</td>
                <td>' . $val['email'] . '</td>
                <td>' . $val['phone'] . '</td>
                <td>' . $val['join_date'] . '</td>
                <td>' . $val['nama_grup'] . '</td>
                <td>
                  <a href="index.php?id=' . $val['id'] .  '" class="btn btn-warning">Edit</a>
                  <a href="index.php?hapus=' . $val['id'] . '" class="btn btn-danger">Hapus</a>
                </td>
              </tr>';
      }
      $data_active = null;
      $data_active .=
      '<li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="group.php">Group</a>
      </li>';
      $tpl = new Template("templates/index.html");
      $tpl->replace("DATA_TITLE", "Members");
      $tpl->replace("DATA_TABLE", $dataMembers);
      $tpl->replace("DATA_SATU", "Nama Member");
      $tpl->replace("DATA_DUA", "Nama Email");
      $tpl->replace("DATA_TIGA", "No Hp");
      $tpl->replace("DATA_EMPAT", "Tanggal Bergabung");
      $tpl->replace("DATA_LIMA", "Grup");
      $tpl->replace("DATA_ACTIVE_NAVBAR", $data_active);
      $tpl->replace("DATA_LINK_FORM", "index.php?addForm=true");
      $tpl->write(); 
    }
    
    public function addForm($data)
    {
      $dataOption = '<option value="">Pilih Grup</option>';
      foreach ($data as $val) 
      {
          $dataOption .= '<option value="' . $val['id_grup'] . '">' . $val['nama_grup'] . '</option>';
      }
      $dataForm = null;
        $dataForm .= '
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama Group" required />
        
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email Group" required />
        
        <label for="phone" class="form-label">Phone Group</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukan Phone Group" required />
        
        <label for="join_date" class="form-label">Join Date</label>
        <input type="date" class="form-control" id="join_date" name="join_date" placeholder="Masukan Tanggal Join Group" required />
        
        <label for="id_grup" class="form-label">Group</label>
        <select id="id_grup" name="id_grup" required>' . $dataOption .
        '</select>

        <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary mt-3">Submit</button>
        ';

      $data_active = null;
      $data_active .=
      '<li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="group.php">Group</a>
      </li>';
      $tpl = new Template("templates/form.html");

      $tpl->replace("DATA_FORM", $dataForm);
      $tpl->replace("DATA_TITLE","Tambah Member");
      $tpl->replace("DATA_LINK", "index.php");
      $tpl->replace("DATA_ACTIVE_NAVBAR", $data_active);
      $tpl->write(); 
    }

    public function editForm($dataGroup, $dataMembers)
    {
      $dataOption = null;
      foreach ($dataGroup as $val) {
        $selected = ($val['id_grup'] == $dataMembers[0]['id_grup']) ? "selected" : "";
        $dataOption .= '<option ' . $selected . ' value="' . $val['id_grup'] . '">' . $val['nama_grup'] . '</option>';
      }
        $dataForm = null;
          $dataForm .= '
          <label for="name" class="form-label">Nama</label>
          <input type="hidden" name="id" value="' . $dataMembers[0]['id'] . '">
          <input type="text" class="form-control" id="name" name="name" value="' . $dataMembers[0]['name'] . '" placeholder="Masukan Nama Group" required />
          
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" id="email" name="email" value="' . $dataMembers[0]['email'] . '" placeholder="Masukan Email Group" required />
          
          <label for="phone" class="form-label">Phone Group</label>
          <input type="text" class="form-control" id="phone" name="phone" value="' . $dataMembers[0]['phone'] . '" placeholder="Masukan Phone Group" required />
          
          <label for="join_date" class="form-label">Join Date</label>
          <input type="date" class="form-control" id="join_date" name="join_date" value="' . $dataMembers[0]['join_date'] . '" placeholder="Masukan Tanggal Join Group" required />
          
          <label for="id_grup" class="form-label">Group</label>
          <select id="id_grup" name="id_grup" required>' . $dataOption .
          '</select>

          <button type="submit" name="btn-update" id="btn-submit" class="btn btn-primary mt-3">Submit</button>
          ';

          $data_active = null;
          $data_active .=
          '<li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="group.php">Group</a>
          </li>';

      $tpl = new Template("templates/form.html");

      $tpl->replace("DATA_FORM", $dataForm);
      $tpl->replace("DATA_TITLE","Edit Member");
      $tpl->replace("DATA_LINK", "index.php");
      $tpl->replace("DATA_ACTIVE_NAVBAR", $data_active);
      $tpl->write(); 
    }
  }
?>