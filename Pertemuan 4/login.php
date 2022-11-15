<!-- Danang Wisnu Prayoga (24060120140160) -->

<?php
//File      : login.php
//Deskripsi : menampilkan form login dan melakukan login ke halaman admin.php

session_start(); //inisialisasi session

//Mengarahkan user ke halaman view customer jika sudah login.
if (isset($_SESSION['username'])) {
    header('Location: view_customer.php');
}

require_once('db_login.php');

//cek apakah user sudah submit form
if (isset($_POST["submit"])) {
    $valid = TRUE; //flag validasi

    //cek validasi email
    $email = test_input($_POST['email']);
    if ($email == '') {
        $error_email = "Email is required";
        $valid = FALSE;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = "Invalid email format";
        $valid = FALSE;
    }

    //cek validasi password
    $password = test_input($_POST['password']);
    if ($password == '') {
        $error_password = "Password is required";
        $valid = FALSE;
    }

    //cek validasi
    if ($valid) {
        //asign a query
        $query = " SELECT * FROM admin WHERE email='" . $email . "' AND password='" . $password . "' ";
        //excute the query
        $result = $db->query($query);
        if (!$result) {
            die("Could not query the database: <br />" . $db->error);
        } else {
            if ($result->num_rows > 0) { //login berhasil
                $_SESSION['username'] = $email;
                header('Location: view_customer.php');
                exit;
            } else { //login gagal
                echo '<div class="alert alert-danger" role="alert">Login failed. Email or password is incorrect.</div>';
            }
        }
        //close db connection
        $db->close();
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <br>
    <div class="container">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-header">Login Form</div>
                <div class="d-flex align-items-center">
                    <div class="card-body">
                        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" size="30" value="<?php if (isset($email)) echo $email; ?>">
                                <div class="text-danger"><?php if (isset($error_email)) echo $error_email; ?></div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" size="30" value="">
                                <div class="text-danger"><?php if (isset($error_password)) echo $error_password; ?></div>
                            </div>
                            <br />
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>