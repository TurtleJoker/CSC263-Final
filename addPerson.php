<!DOCTYPE html>
<html>

  <head>
    <title>Adding People...</title>
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
    $personID = $_POST['personID'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $jobTitle = $_POST['jobTitle'];
    $email = $_POST['email'];



    $sql="INSERT INTO PEOPLE(personID,firstname,lastname,jobTitle,email)
    VALUES('$personID','$firstName','$lastName','$jobTitle','$email')";


    if($conn->query($sql)){

        echo '<p style="font-size:24pt;color:black;text-align:center">'."Submitted successfully! Returning to home page...".'<p>';

        $url = "index.html";

        echo "<meta http-equiv='Refresh' content='30;URL=$url'>";

    }else{

        echo '<p style="font-size:24pt;color:black;text-align:center">'."There was an error! Please resubmit.".'<p>';


        $url1 = "addremovePeople.html";

        echo "<meta http-equiv='Refresh' content='30;URL=$url1'>";


    }

        $conn->close();
?>
    <h2>Powered by Runtime Errors</h2>
  </body>

</html>
