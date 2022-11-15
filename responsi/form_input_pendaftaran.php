<?php include('header.html') ?>
<?php
if (isset($_POST['submit'])) {
    /*TODO: buat 
1. server side validation
2. insert new user
3. tampilkan hasilnya error/berhasil */

    require_once 'db_config.php';

    $nama = test_input($_POST['nama']);
    $email = test_input($_POST['email']);
    $gender = $_POST['gender'];
    $alamat = test_input($_POST['alamat']);
    $provinsi = test_input($_POST['provinsi']);
    $kabupaten = test_input($_POST['kabupaten']);

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $db->query($sql);

    if ($nama == '' || $email == '' || $gender == '' || $alamat == '' || $provinsi == '' || $kabupaten == '') {
        echo "<div class='alert alert-danger' role='alert'>Data masih kosong!</div>";
    } else if ($result->num_rows > 0) {
        echo "<div class='alert alert-danger' role='alert'>Email sudah terdaftar!</div>";
    } else {
        $sql = "INSERT INTO user (nama, email, jenis_kelamin, alamat, id_provinsi, id_kabupaten) VALUES ('$nama', '$email', '$gender', '$alamat', '$provinsi', '$kabupaten')";
        $result = $db->query($sql);
        if ($result) {
            echo "<div class='alert alert-success' role='alert'>Data berhasil disimpan</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Data gagal disimpan</div>";
        }
    }
}

?>

<div class="card">
    <div class="card-header">Form Input Pendaftaran</div>
    <div class="card-body">
        <!-- /* TODO definisikan method dan actions */ -->
        <form method="POST" onsubmit="return submitForm()" name="daftar">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control">
                <div id="error_nama" style="color: red;"></div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <!-- /* TODO buat cek email menggunakan ajax */ -->
                <input type="email" name="email" id="email" class="form-control" onblur="checkEmail()">
                <div id="error_email" style="color: red;"></div>
                <div id="success_email" style="color: green; display: none;"> Email dapat digunakan</div>
            </div>
            <label>Jenis Kelamin</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" value="Laki-laki">Laki-laki
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="gender" value="Perempuan">Perempuan
                </label>
            </div>
            <div id="error_jenis_kelamin" style="color: red;"></div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
                <div id="error_alamat" style="color: red;"></div>
            </div>
            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <select name="provinsi" id="provinsi" class="form-control" onchange="get_kabupaten()">
                    <option value="">Pilih Provinsi</option>
                    <!-- /* TODO tampilkan daftar provinsi menggunakan ajax */ -->
                    <?php include('get_provinsi.php') ?>
                </select>
                <div id="error_provinsi" style="color: red;"></div>
            </div>
            <div class="form-group">
                <label for="kabupaten">Kabupaten</label>
                <select name="kabupaten" id="kabupaten" class="form-control">
                    <option value="">Pilih Kabupaten</option>
                    <!-- /* TODO tampilkan daftar kabupaten berdasarkan pilihan provinsi sebelumnya, menggunakan ajax*/ -->
                </select>
                <div id="error_kabupaten" style="color: red;"></div>
            </div>
            <br>
            <button type="submit" name="submit" value="submit" class="btn btn-primary container-fluid">Daftar</button>
        </form>
    </div>
</div>

<?php include('footer.html') ?>