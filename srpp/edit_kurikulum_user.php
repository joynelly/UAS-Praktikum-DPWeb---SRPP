<?php

// redirect to login_page.php if user has not logged
session_start();
if (!isset($_SESSION['username'])) {
    $error_message = urlencode('Anda Belum Login');
    header("location: login.php?error_message=$error_message");
}

require "./model/DB.php";
require "./model/Input.php";
require "./model/DataKurikulumUtama.php";
require "./model/DataKurikulumUser.php";
require "./model/Template.class.php";

if(empty(Input::get('id'))) {
    header('Location:index.php');
}

$DB = DB::getInstance();
$u_id = Input::get('id');
$student = $DB->getWhereOnce("student", ['user_id','=',$u_id]);

$kurikulum = $DB->orderBy('semester');
$kurikulum1 = $DB->getWhere("data_kurikulum_user", ['user_id','=',$u_id]);

$data_k_user = new DataKurikulumUser();

if (isset($_POST['update'])) { // form submitted
    //$error_message = $mahasiswa->validate($_POST, 'update');
    $data_k_user->update($u_id, $_POST);
    $data_k_user->updateIPK($u_id);
    //$message = urlencode("Mahasiswa dengan Nama <b>{$mahasiswa->getItem('nama')}</b>, NIM <b>{$mahasiswa->getItem('nim')}</b> sudah berhasil di-update");
    header("edit_kurikulum_user.php?id={$u_id}");
    
  }

//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
if (!empty(Input::get('id_hapus'))) {
    //memanggil add
    $id_hapus = Input::get('id_hapus');
    $data_k_user->delete($u_id);
    header("edit_kurikulum_user.php?id={$u_id}");
}

/*
if (isset($_POST['update'])) {
    
    //memanggil add
    $member->update($_POST);
    header("edit_kurikulum_user.php?id={$u_id}");
}*/

$data = null;
$no = 1;

foreach ($kurikulum1 as $result) {
    
    $ket = $DB->getWhereOnce("data_kurikulum_utama", ['id','=',$result->data_kurikulum_utama_id]);
    
    $data.= "<tr>
        <td>" . $no++ . "</td>
        <td>" . $ket->kode_matkul . "</td>
        <td>" . $ket->kategori . "</td>
        <td>" . $ket->nama_matkul . "</td>
        <td>" . $result->semester . "</td>
        <td>" . $result->sks . "</td>
        <td>" . $result->nilai . "</td>
        <td>" . $result->mutu . "</td>
        <td>
        <a href='edit_kurikulum_user.php?id={$u_id}&id_edit=" . $result->id .  " 'class='btn btn-warning'>Edit</a>
        <a href='edit_kurikulum_user.php?id={$u_id}&id_hapus=" . $result->id .  "' class='btn btn-danger'>Hapus</a>
        </td></tr>";
}

$tpl = new Template("template/add-kurikulum.html");
$tpl->replace("DATA_TABEL", $data);

$data_replace = null;
$link_nav = '<li><a href="save_kurikulum.php?id='.$u_id.'">Kembali</a></li>
            <li><a href="student_index.php?id='.$u_id.'">Selesai</a></li>';
$tpl->replace("NAV_LINK", $link_nav);


if (!empty(Input::get('id_edit'))) {
    
    $edit_id = Input::get('id_edit');
    $hasil = $DB->getWhereOnce('data_kurikulum_user', ['id','=',$edit_id]);
    $hasil2 = $DB->getWhereOnce('data_kurikulum_utama', ['id','=',$hasil->data_kurikulum_utama_id]);

    $data_replace = '<div class="col-lg-3 col-md-3 col-sm-3 col-3 m-2">
                        <div class="card p-5 mr-3">
                        <form action="edit_kurikulum_user.php?id='.$u_id.'" method="POST">
                        <h2 class="card-title">Input Nilai</h2>
                        <h6>Masukkan nilai pada mata kuliah yang telah diambil.</h6>
                        <div class="form-row">
                        <div class="form-group col">
                            <label for="kode_matkul">Kode MK</label> : 
                            <label for="nim">'. $hasil2->kode_matkul .'</label>
                        </div>
                        </div>

                        <div class="form-row">
                        <div class="form-group col">
                            <label for="kategori">Kategori</label> : 
                            <label for="nim">'. $hasil2->kategori .'</label>
                        </div>
                        </div>

                        <div class="form-row">
                        <div class="form-group col">
                            <label for="nama_matkul">Nama Mata Kuliah</label> : 
                            <label for="nama_matkul">'. $hasil2->nama_matkul .'</label>
                        </div>
                        </div>

                        <div class="form-row">
                        <div class="form-group col">
                            <label for="semester">Semester</label> : 
                            <label for="nim">'. $hasil->semester .'</label>
                        </div>
                        </div>

                        <div class="form-row">
                        <div class="form-group col">
                            <label for="sks">SKS</label> : 
                            <label for="nim">'. $hasil->sks .'</label>
                        </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                            <label for="nilai">Nilai</label>
                            <input type="text" class="form-control" id="nilai" name="nilai" required />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                            <label for="mutu">Mutu</label>
                            <input type="number" class="form-control" id="mutu" name="mutu" required />
                            </div>
                        </div>

                        <button type="submit" name="update" class="btn btn-primary mt-3">Update Nilai</button>
                    </form>            
                    </div>
                    </div>';
    $tpl->replace("FORM_EDIT", $data_replace);

    /*
    $judul_form .= 'Input Nilai';
    $tpl->replace("JUDUL_FORM", $judul_form);

    $desk_form .= 'Masukkan nilai pada mata kuliah yang telah diambil.';
    $tpl->replace("DESK_FORM", $desk_form);

    $kode_mk .= '<input type="text" class="form-control" id="kode_matkul" name="kode_matkul" required />
                <label for="nim">'. $hasil2->kode_matkul .'</label>';
    $tpl->replace("DATA_KODE_MK", $kode_mk);

    $kategori = '<input type="text" class="form-control" id="kategori" name="kategori" required />
                <label for="nim">'. $hasil2->kategori .'</label>';
    $tpl->replace("DATA_KATEGORI", $kategori);

    $nama_matkul = '<input type="text" class="form-control" id="nama_matkul" name="nama_matkul" required />
                    <label for="nim">'. $hasil2->nama_matkul .'</label>';
    $tpl->replace("DATA_NAMA_MK", $nama_matkul);

    $semester = '<input type="number" class="form-control" id="semester" name="semester" required/>
                <label for="nim">'. $hasil->semester .'</label>';
    $tpl->replace("DATA_SEMESTER", $semester);

    $sks = '<input type="text" class="form-control" id="sks" name="sks" required/>
            <label for="nim">'. $hasil->sks .'</label>';
    $tpl->replace("DATA_SKS", $sks);

    $form_edit = '<div class="form-row">
                    <div class="form-group col">
                    <label for="nilai">Nilai</label>
                    <input type="number" class="form-control" id="nilai" name="nilai" required />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                    <label for="mutu">Mutu</label>
                    <select class="custom-select form-control" id="mutu" name="mutu" rows="3" required>
                        <option selected>Mutu</option>
                    </select>
                    </div>
                </div>';
    $tpl->replace("Keterangan_FORM", $sks);

    $button_form = '<button type="submit" name="UPDATE" class="btn btn-primary mt-3">Add</button>';
    $tpl->replace("BUTTON_FORM", $button_form);*/

} else {

    $data_replace = '';
    $tpl->replace("FORM_EDIT", $data_replace);

    /*
    $desk_form .= 'Tambah mata kuliah yang tidak ada pada kurikulum.';
    $tpl->replace("DESK_FORM", $desk_form);

    $kode_mk .= '<input type="text" class="form-control" id="kode_matkul" name="kode_matkul" required />';
    $tpl->replace("DATA_KODE_MK", $kode_mk);

    $kategori = '<input type="text" class="form-control" id="kategori" name="kategori" required />';
    $tpl->replace("DATA_KATEGORI", $kategori);

    $nama_matkul = '<input type="text" class="form-control" id="nama_matkul" name="nama_matkul" required />';
    $tpl->replace("DATA_NAMA_MK", $nama_matkul);

    $semester = '<input type="number" class="form-control" id="semester" name="semester" required/>';
    $tpl->replace("DATA_SEMESTER", $semester);

    $sks = '<input type="text" class="form-control" id="sks" name="sks" required/>';
    $tpl->replace("DATA_SKS", $sks);

    $add_ket = 'Pastikan data diisi dengan benar.';
    $tpl->replace("Keterangan_FORM", $button_form);

    $button_form = '<button type="submit" name="add" class="btn btn-primary mt-3">Add</button>';
    $tpl->replace("BUTTON_FORM", $button_form);*/
}

$tpl->write();
