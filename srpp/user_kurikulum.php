

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Add Kurikulum | SRPP</title>
     <link rel="stylesheet" type="text/css" href="./assets/style.css" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <!-- ***** Header Area Start ***** -->
     <nav>
        <div class="menu-icon">
           <span class="fas fa-bars"></span>
        </div>
        <div class="logo">
           <a href="dashboard-user.html">SRPP</a>
        </div>
        <div class="nav-items">
           <li><a href="index.html" target="_blank">Home</a></li>
           <li><a href="about.html" target="_blank">About</a></li>
        </div>
     </nav>
    <!-- header area end -->

  <!-- Home page start -->
  <div class="container tiga-menu">
    <ul>
     <li><a href="edit-kurikulum.html">MK Core</a></li>
     <li><a href="edit-kurikulum-MKKPS.html">MKKPS</a></li>
     <li><a href="add-kurikulum.html">MK</a></li>
    </ul>
 </div>
   <div class="container-fluid d-flex">
      <div class="col-lg-3 col-md-3 col-sm-3 col-3 m-2">
        <div class="card p-5 mr-3">
          <h2 class="card-title">Add Nilai</h2>
          <h6>Isi form ini untuk memasukkan nilai</h6>
          <form action="index.php" method="POST">
            <div class="form-row">
              <div class="form-group col">
                <label for="kode_matkul">Kode MK</label>
                DATA_KODE_MK
                <!-- <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" required /> -->
              </div>
            </div>
  
            <div class="form-row">
              <div class="form-group col">
                <label for="kategori">Kategori</label>
                DATA_KATEGORI
                <!-- <input type="text" class="form-control" id="kategori" name="kategori" required /> -->
              </div>
            </div>
  
            <div class="form-row">
              <div class="form-group col">
                <label for="nama_matkul">Nama Mata Kuliah</label>
                <!-- DATA_NAMA_MK -->
                <select class="custom-select form-control" id="nama_matkul" name="nama_matkul" rows="3" required>
                  <option selected>NAMA_MK</option>
                </select>
              </div>
            </div>
  
            <div class="form-row">
              <div class="form-group col">
                <label for="semester">Semester</label>
                <!-- DATA_SEMESTER -->
                <input type="number" class="form-control" id="semester" name="semester" required />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col">
                <label for="sks">SKS</label>
                <!-- DATA_SKS -->
                <input type="text" class="form-control" id="sks" name="sks" required />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col">
                <label for="nilai">Nilai</label>
                <!-- DATA_NILAI -->
                <input type="number" class="form-control" id="nilai" name="nilai" step=".01" required />
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col">
                <label for="mutu">Mutu</label>
                <!-- DATA_MUTU -->
                <select class="custom-select form-control" id="mutu" name="mutu" rows="3" required>
                  <option selected>Mutu</option>
                </select>
              </div>
            </div>

            <button type="submit" name="add" class="btn btn-primary mt-3">Add</button>
          </form>
        </div>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-7 col-7 m-3">
        <h1 class="text-center mt-3">Tabel Kurikulum</h1>
        <table id="kurikulum" border="1">
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Kategori</th>
            <th>Nama Mata Kuliah</th>
            <th>Semester</th>
            <th>SKS</th>
            <th>Nilai</th>
            <th>Mutu</th>
            <th>Action</th>
          </tr>
          <!-- DATA_TABEL -->
          <tr>
            <td>1</td>
            <td>DATA_KODE</td>
            <td>KATEGORI</td>
            <td>NAMA_MK</td>
            <td>SEMESTER</td>
            <td>SKS</td>
            <td>NILAI</td>
            <td>MUTU</td>
            <td>
               <input type="submit" value="edit">
            </td>
          </tr>
        </table>
      </div>
   </div>


  <div class="clearfix"></div>
      
  <!-- Home page end -->

  <!-- Footer start -->
  <footer class="footer">
    <div class="container">
      <span>&copy;SRPP | Tugas Besar RPL | Kelompok 8 </span>
    </div>
  </footer>
  <!-- Footer end -->
</body>

<!-- script -->
<script src="assets/script.js"></script>
<!-- script end -->

</html>