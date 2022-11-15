<!-- Danang Wisnu Prayoga (24060120140160) -->

<?php
//File      : add_customer.php  
//Deskripsi : Menampilkan form penambahan customer dan menyimpannya ke database

//Mencegah user mengakses halaman ini secara langsung
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

//Memanggil file db_login.php
require_once('db_login.php');

//Mengecek apakah user belum menekan tombol submit
if (isset($_POST["submit"])) {
    $valid = TRUE; //flag validasi
    $name = test_input($_POST["name"]);
    if (empty($name)) {
        $error_name = "Name is required";
        $valid = FALSE;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Only letters and white space allowed";
        $valid = FALSE;
    }

    $address = test_input($_POST["address"]);
    if (empty($address)) {
        $error_address = "Address is required";
        $valid = FALSE;
    }

    $city = $_POST["city"];
    if (empty($city) || $city == 'none') {
        $error_city = "City is required";
        $valid = FALSE;
    }

    //Add data into database
    if ($valid) {
        //escape input data
        $address = $db->real_escape_string($address);
        //assign a query
        $query = "INSERT INTO customers (name, address, city) VALUES ('" . $name . "','" . $address . "','" . $city . "')";
        // Execute the query
        $result = $db->query($query);
        echo $result;
        if (!$result) {
            die("Could not query the database: <br />" . $db->error . '<br>Query:' . $query);
        } else {
            $db->close();
            header('Location: view_customer.php');
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Tambah Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">Add Customers Data</div>
            <div class="card-body">
                <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($name)) echo $name; ?>">
                        <!-- Fungsi isset() memeriksa apakah suatu variabel disetel, yang berarti variabel tersebut harus dideklarasikan dan bukan NULL. -->
                        <div class="text-danger"><?php if (isset($error_name)) echo $error_name; ?></div>
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" id="address" name="address" rows="5"><?php if (isset($address)) echo $address; ?></textarea>
                        <div class="text-danger"><?php if (isset($error_address)) echo $error_address; ?></div>
                    </div>

                    <div class="form-group">
                        <label for="city">City:</label>
                        <select name="city" id="city" class="form-control" required>
                            <option value="none" <?php if (isset($city)) echo 'selected="true"'; ?>>--Select a city--</option>
                            <option value="Airport West" <?php if (isset($city) && $city == "Airport West") echo 'selected="true"'; ?>>Airport West</option>
                            <option value="Box Hill" <?php if (isset($city) && $city == "Box Hill") echo 'selected="true"'; ?>>Box Hill</option>
                            <option value="Yarravile" <?php if (isset($city) && $city == "Yarravile") echo 'selected="true"'; ?>>Yarravile</option>
                        </select>
                        <div class="text-danger"><?php if (isset($error_city)) echo $error_city; ?></div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                    <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>
<?php
$db->close();
?>