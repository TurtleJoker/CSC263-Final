<!DOCTYPE html>
<html>
<head>
  <title> Attempt To Connect To Database (Adding Incident) </title>
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

          $incidID = $_POST['incidentID'];
          $tID = $_POST['typeID'];
          $perID = $_POST['personID'];
          $date = $_POST['date'];
          $state = $_POST['state'];
          $insertingValues = "INSERT INTO incidents(incidentID, typeID, personID, date, state) VALUES
                        ('$incidID', '$tID', '$perID', '$date', '$state')";
  
       
          if ($conn -> query($insertingValues))
          {
              echo '<p style="font-size:16pt;color:Black;text-align:center">'."Incident recorded. Redirecting to home page.".'<p>';

        	$url = "index.html";

       	      echo "<meta http-equiv='Refresh' content='2;URL=$url'>";

          }
	  else{

        	echo '<p style="font-size:16pt;color:Red;text-align:center">'."Error. Requiring resubmission.".'<p>';

       		 $url1 = "addToIncidents.html";

        	echo "<meta http-equiv='Refresh' content='2;URL=$url1'>";
       
	  } //end of the main if statement
    $conn -> close();
    ?>
 
  </body>
</html>
