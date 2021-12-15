<!DOCTYPE html>
<html>

  <head>
    <title>Logging in...</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <body>
    <header>
      <h1>
        CSIRT
      </h1>
      <h4>
        Computer Security Incident Response Teams
      </h4>
    </header>
    <?php
include('connection.php');
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM login WHERE (username = '$username') AND (password ='$password') limit 1";

$result = $conn->query($sql);

$row = mysqli_fetch_assoc($result);

if($row == 0) {
    $url = "login.html";

    echo "<script>alert('Error. You should enter the valid username or password.')</script>";

    echo "<meta http-equiv='Refresh' content='0; URL = $url'>";
}

echo "<div class='diff'><h5>Redirecting to... <a href='index.html'>HOME</a></h5></div>";

$conn->close();
?>
    <h2>Powered by Runtime Errors</h2>
  </body>

</html>
