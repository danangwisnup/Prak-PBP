function submitForm() {
  var valid = true;

  if (document.forms["daftar"]["nama"].value == "") {
    document.getElementById("error_nama").innerHTML = "Nama tidak boleh kosong";
    valid = false;
  }

  if (document.forms["daftar"]["email"].value == "") {
    document.getElementById("error_email").innerHTML =
      "Email tidak boleh kosong";
    valid = false;
  }

  if (document.forms["daftar"]["gender"].value == "") {
    document.getElementById("error_jenis_kelamin").innerHTML =
      "Jenis kelamin tidak boleh kosong";
    valid = false;
  }

  if (document.forms["daftar"]["alamat"].value == "") {
    document.getElementById("error_alamat").innerHTML =
      "Alamat tidak boleh kosong";
    valid = false;
  }

  if (document.forms["daftar"]["provinsi"].value == "") {
    document.getElementById("error_provinsi").innerHTML =
      "Provinsi tidak boleh kosong";
    valid = false;
  }

  if (document.forms["daftar"]["kabupaten"].value == "") {
    document.getElementById("error_kabupaten").innerHTML =
      "Kabupaten tidak boleh kosong";
    valid = false;
  }

  return valid;
}

function hideError(id) {
  document.getElementById("error_" + id).innerHTML = "";
}

function checkEmail() {
  var success = document.getElementById("success_email");
  var xhr = new XMLHttpRequest();

  xhr.open("GET", "get_user.php?email=" + email.value);

  xhr.onload = function () {
    if (xhr.responseText == "false") {
      document.getElementById("error_email").innerHTML =
        "Email sudah terdaftar, gunakan email lain.";
      success.style.display = "none";
    } else {
      hideError("email");
      success.style.display = "block";
    }
  };

  xhr.send();
}

function get_kabupaten() {
  var xhr = new XMLHttpRequest();
  var inner = "kabupaten";
  var url = "get_kabupaten.php?id_provinsi=" + provinsi.value;

  xhr.open("GET", url);
  // success
  xhr.onload = function () {
    if (xhr.responseText != "false") {
      document.getElementById(inner).innerHTML = xhr.responseText;
    } else {
      document.getElementById(inner).innerHTML = "";
    }
  };

  xhr.send();
}
