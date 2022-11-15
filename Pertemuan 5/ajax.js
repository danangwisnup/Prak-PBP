//Danang Wisnu Prayoga (24060120140160)

//fungsi untuk membuat objek XMLHttpRequest
function getXMLHTTPRequest() {
  if (window.XMLHttpRequest) {
    // code for modern browsers
    return new XMLHttpRequest();
  } else {
    // code for old IE browsers
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
}

function get_server_time() {
  var xmlhttp = getXMLHTTPRequest();
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById("show_time").innerHTML = xmlhttp.responseText;
    }
  };
  xmlhttp.open("GET", "get_server_time.php", true);
  xmlhttp.send();
}

function add_customer_get() {
  var xmlhttp = getXMLHTTPRequest();
  //mengambil nilai dari form
  var name = encodeURI(document.getElementById("name").value);
  var address = encodeURI(document.getElementById("address").value);
  var city = encodeURI(document.getElementById("city").value);
  //validate form
  if (name != "" && address != "" && city != "") {
    // set url and inner
    var url =
      "add_customer_get.php?name=" +
      name +
      "&address=" +
      address +
      "&city=" +
      city;
    // open request
    xmlhttp.open("GET", url, true);
    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("add_response").innerHTML =
          xmlhttp.responseText;
      }
      return false;
    };
    xmlhttp.send(null);
  } else {
    alert("Please fill all the fields");
  }
}

function add_customer_post() {
  var xmlhttp = getXMLHTTPRequest();
  //mengambil nilai dari form
  var name = encodeURI(document.getElementById("name").value);
  var address = encodeURI(document.getElementById("address").value);
  var city = encodeURI(document.getElementById("city").value);
  //validate form
  if (name != "" && address != "" && city != "") {
    // set url and inner
    var url = "add_customer.php";
    // open request
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    xmlhttp.onreadystatechange = function () {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        document.getElementById("add_response").innerHTML =
          xmlhttp.responseText;
      }
      return false;
    };
    xmlhttp.send("name=" + name + "&address=" + address + "&city=" + city);
  } else {
    alert("Please fill all the fields");
  }
}

function callAjax(url, inner) {
  var xmlhttp = getXMLHTTPRequest();
  xmlhttp.open("GET", url, true);
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById(inner).innerHTML = xmlhttp.responseText;
    }
  };
  xmlhttp.send();
}

function showCustomer(customerid) {
  var inner = "detail_customer";
  var url = "get_customer.php?customerid=" + customerid;
  if (customerid == "") {
    document.getElementById(inner).innerHTML = "";
  } else {
    callAjax(url, inner);
  }
}

function search_book(title) {
  var inner = "search_response";
  var url = "get_book.php?title=" + title;
  if (title == "") {
    document.getElementById(inner).innerHTML = "";
  } else {
    callAjax(url, inner);
  }
}
