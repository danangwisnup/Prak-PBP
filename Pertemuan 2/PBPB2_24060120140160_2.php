<!DOCTYPE html>
<html lang="id">

<head>
  <title>Array PHP</title>
</head>
<style>
  fieldset {
    width: 800px;
    margin: auto;
  }

  table,
  th,
  td {
    border: 3px solid white;
    border-collapse: collapse;
  }

  th,
  td {
    text-align: center;
    background-color: #96D4D4;
    height: 35px;
  }
</style>

<body>

  <?php
  $array_mhs = array(
    'Abdul' => array(89, 90, 54),
    'Budi' => array(78, 60, 64),
    'Nina' => array(67, 56, 84),
    'Budi' => array(87, 69, 50),
    'Budi' => array(98, 65, 74)
  );

  function hitung_rata($array)
  {
    $simpan = 0;
    $n = sizeof($array);
    foreach ($array as $nilai) {
      $simpan += $nilai;
    }
    $rata = $simpan / $n;

    return $rata;
  }

  function print_mhs($array_mhs)
  {
    foreach ($array_mhs as $nama => $nilai) {
      echo '<tr><td>' . $nama . '</td>';
      foreach ($nilai as $value) {
        echo '<td>' . $value . '</td>';
      }
      $rata = hitung_rata($nilai);
      echo '<td>' . $rata . '</td>';
    }
  }

  ?>

  <fieldset>
    <div id="sukses"></div>
    <legend>
      <h2>Daftar Nilai Mahasiswa</h2>
    </legend>
    <table style="width:100%">
      <tr>
        <th>Nama Mahasiswa</th>
        <th>Nilai 1</th>
        <th>Nilai 2</th>
        <th>Nilai 3</th>
        <th>Rata-Rata</th>
      </tr>
      <?php print_mhs($array_mhs); ?>
  </fieldset>

</body>

</html>