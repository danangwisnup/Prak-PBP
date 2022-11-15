<?php error_reporting(false); ?>
<?php
if (isset($_POST["submit"])) {
    $nim = test_input($_POST['nim']);
    if ($nim == '') {
        $error_nim = "NIM harus diisi";
    } else if (!preg_match("/^[0-9]{14}+$/", $nim)) {
        $error_nim = "Format NIM tidak benar, minimal 14 digit";
    }

    $nama = test_input($_POST['nama']);
    if (empty($nama)) {
        $error_nama = "Nama harus diisi";
    } else if (!preg_match("/^[a-zA-z ]*$/", $nama)) {
        $error_nama = "Nama hanya dapat berisi huruf dan spasi";
    }

    $jenis_kelamin = $_POST['jenis_kelamin'];
    if ($jenis_kelamin == '') {
        $error_jenis_kelamin = "Jenis kelamin harus diisi";
    }

    $kelas = $_POST['kelas'];
    if ($kelas == '') {
        $error_kelas = "Kelas harus diisi";
    }

    $extra = $_POST['extra'];
    if ($kelas != 'XII') {
        if (empty($extra)) {
            $error_extra = "Pilih minimal 1 Extrakurikuler";
        } else if (count($extra) > 3) {
            $error_extra = "Pilih minimal 3 Extrakurikuler";
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <title>Pertemuan 3 | Form Input Siswa</title>
</head>

<body>
    <div class="container"><br>
        <div class="card">
            <div class="card-header">Form Input Siswa</div>
            <div class="card-body">
                <form method="POST" autocomplete="on" action="">
                    <div class="form-group">
                        <label for="nim">NIM:</label>
                        <input type="number" class="form-control" id="nim" name="nim" value="<?php if (isset($nim)) echo $nim; ?>">
                        <div class="alert-link text-danger"><?php if (isset($error_nim)) echo $error_nim; ?></div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php if (isset($nama)) echo $nama; ?>">
                        <div class="alert-link text-danger"><?php if (isset($error_nama)) echo $error_nama; ?></div>
                    </div>
                    <label>Jenis Kelamin:</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="pria" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "pria") echo "checked"; ?>>Pria
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="jenis_kelamin" value="wanita" <?php if (isset($jenis_kelamin) && $jenis_kelamin == "wanita") echo "checked"; ?>>Wanita
                        </label>
                    </div>
                    <div class="alert-link text-danger"><?php if (isset($error_jenis_kelamin)) echo $error_jenis_kelamin; ?></div>
                    <br>
                    <div class="form-group">
                        <label for="kelas">Kelas:</label>
                        <select id="kelas" name="kelas" class="form-control" onchange="getKelas()">
                            <option value="">-- pilih kelas --</option>
                            <option value="X" <?php if (isset($kelas) && $kelas == "X") echo 'selected="true"'; ?>>X</option>
                            <option value="XI" <?php if (isset($kelas) && $kelas == "XI") echo 'selected="true"'; ?>>XI</option>
                            <option value="XII" <?php if (isset($kelas) && $kelas == "XII") echo 'selected="true"'; ?>>XII</option>
                        </select>
                        <div class="alert-link text-danger"><?php if (isset($error_kelas)) echo $error_kelas; ?></div>
                    </div>
                    <label>Extrakurikuler:</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="extra[]" value="Pramuka" <?php if (isset($extra) && in_array('Pramuka', $extra)) echo 'checked'; ?> <?php if (isset($kelas) && $kelas == "XII") echo 'disabled'; ?>>Pramuka
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="extra[]" value="Seni Tari" <?php if (isset($extra) && in_array('Seni Tari', $extra)) echo 'checked'; ?> <?php if (isset($kelas) && $kelas == "XII") echo 'disabled'; ?>>Seni Tari
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="extra[]" value="Sinematografi" <?php if (isset($extra) && in_array('Sinematografi', $extra)) echo 'checked'; ?> <?php if (isset($kelas) && $kelas == "XII") echo 'disabled'; ?>>Sinematografi
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="extra[]" value="Basket" <?php if (isset($extra) && in_array('Basket', $extra)) echo 'checked'; ?> <?php if (isset($kelas) && $kelas == "XII") echo 'disabled'; ?>>Basket
                        </label>
                    </div>
                    <div class="alert-link text-danger"><?php if (isset($error_extra)) echo $error_extra; ?></div>
                    <br>
                    <!-- submit, reset dan button -->
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <button onclick="getKelas()" type="reset" class="btn btn-danger">Reset</button>
                </form>
                <br>
                <?php
                if (isset($_POST["submit"])) {
                    if (!$error_nim && !$error_nama && !$error_jenis_kelamin && !$error_kelas && !$error_extra) {
                        echo "<h3>Your Input:</h3>";
                        echo 'NIM : ' . $nim . '<br />';
                        echo 'Nama : ' . $nama . '<br />';
                        echo 'Kelas : ' . $kelas . '<br />';
                        echo 'Jenis Kelamin : ' . $jenis_kelamin . '<br />';

                        if ($kelas != 'XII') {
                            $no = 1;
                            if (!empty($extra)) {
                                echo 'Extrakurikuler yang dipilih: ';
                                foreach ($extra as $extra_item) {
                                    echo '<br />' . $no . '. ' . $extra_item;
                                    $no++;
                                }
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script>
        function getKelas() {
            var id_kelas = document.getElementById('kelas');
            var fields = document.getElementsByTagName("input");
            for (var i = 0; i < fields.length; i++) {
                if (fields[i].type == "checkbox" && id_kelas.value == 'XII') {
                    fields[i].disabled = true;
                    fields[i].checked = false;
                } else {
                    fields[i].disabled = false;
                }
            }
        };
    </script>
</body>

</html>