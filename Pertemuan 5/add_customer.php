<?php
//Danang Wisnu Prayoga (24060120140160)
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
                <form method="" autocomplete="on" action="javascript:;">
                    <div class="form-group">
                        <label for="name">Nama:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" id="address" name="address" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="city">City:</label>
                        <select name="city" id="city" class="form-control" required>
                            <option value="none">--Select a city--</option>
                            <option value="Airport West">Airport West</option>
                            <option value="Box Hill">Box Hill</option>
                            <option value="Yarravile">Yarravile</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" onclick="add_customer_get()">Add Customer (GET)</button>
                    <button type="submit" class="btn btn-primary" onclick="add_customer_get()">Add Customer (POST)</button>
                </form>
                <br />
                <div id="add_response"></div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="ajax.js"></script>
</body>

</html>