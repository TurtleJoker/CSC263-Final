<!DOCTYPE html>
<html>
<head>
  <title> Attempt To Connect To Database </title>
<body>
  <h1> Connect To Database (PHP) </h1>
  <p><?php
      
        // We need a server name,  username, password, and the database we are using in order to connect to the database.
        $servername = "localhost";
        $username = "root";
        $password = "red@1234"; // TO TEST INDIVIDUALLY, ENTER YOUR SQL PASSWORD AS IT IS ON YOUR SYSTEM.
        $dbname = " "; // BEFORE USING THIS .php FILE, ENTER THE DATABASE NAME WERE USING.
      
        // Attempt to connect to the database in SQL.
        $conn = new mysqli($servername, $username, $password, $dbname);

        // In the case that connection fails.
        if ($conn->connect_error){
           die("<p style='color:red'>" . "Unable to connect to the database: " . $conn->connect_error . "</p>");
        }

        echo "Established connection with the database!";
    ?></p>
</body>
</html>
  
  
