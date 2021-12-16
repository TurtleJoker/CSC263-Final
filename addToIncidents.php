<!DOCTYPE html>
<html>
<head>
  <title> Attempt To Connect To Database (Adding Incident) </title>
</head>
<body>
  <h1> Connect To Database (PHP) </h1>
  <p><?php
    
     if (isset($_POST['submitted'])) 
     {
       
          // We need a server name,  username, password, and the database we are using in order to connect to the database.
          $servername = "localhost";
          $username = "root";
          $password = "red@1234"; // TO TEST INDIVIDUALLY, ENTER YOUR SQL PASSWORD AS IT IS ON YOUR SYSTEM.
          $dbname = "securitydb"; // AGREED NAME OF OUR DATABASE.

          // Attempt to connect to the database in SQL.
          $conn = new mysqli($servername, $username, $password, $dbname);

          // In the case that connection fails.
          if ($conn->connect_error)
          {
             die("<p style='color:red'>" . "Unable to connect to the database: " . $conn->connect_error . "</p>");
          }

          echo "Connected to the database, attempting to record incident...";

          $incidID = $_POST['incidentID'];
          $tID = $_POST['typeID'];
          $perID = $_POST['personID'];
          $date = $_POST['date'];
          $state = $_POST['state'];
          $insertingValues = "INSERT INTO incidents(incidentID, typeID, personID, date, state) VALUES
                        ('$incidID', '$tID', '$perID', '$date', '$state')";
          $query = $conn -> query($insertingValues);
       
          if (!$query) 
          {
              die('ERROR: Unable to record addition to the database.');
          }
       
	$conn -> close();
      } //end of the main if statement
    
    ?></p>
 
  </body>
</html>
