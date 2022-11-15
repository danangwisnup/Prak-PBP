<?php
//Danang Wisnu Prayoga (24060120140160)
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">Show Customers Data</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="city">Select Customer :</label>
                    <select name="customer" id="customer" class="form-control" onchange="showCustomer(this.value)">
                        <option value="none">--Select a customer--</option>
                        <?php
                        require_once('db_login.php');
                        $query = "SELECT * FROM customers ORDER BY customerid";
                        $result = $db->query($query);
                        if (!$result) {
                            die("Could not query the database: <br />" . $db->error);
                        } else {
                            while ($row = $result->fetch_object()) {
                                echo '<option value="' . $row->customerid . '">' . $row->name . '</option>';
                            }
                        }
                        $result->free();
                        $db->close();
                        ?>
                    </select>
                </div>
                <br />
                <div id="detail_customer"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="ajax.js"></script>
</body>

</html>