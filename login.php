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

echo $username; // FOR TESTING PURPOSES. MAKING SURE THE PHP FILE TOOK IN THE VALUES SUBMITTED. USING ECHO.
echo $password; // FOR TESTING PURPOSES. MAKING SURE THE PHP FILE TOOK IN THE VALUES SUBMITTED. USING ECHO.

$conn->close();
?>
