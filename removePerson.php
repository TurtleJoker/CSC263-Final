<!DOCTYPE html>
<html>

  <head>
    <title>Add/Remove People</title>
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



    $sql="DELETE FROM people 
          WHERE personID = '$personID'; ";


    if($conn->query($sql)){

        echo '<h2 style="font-size:24pt;color:black;text-align:center">'."Submitted successfully! Returning to home page...".'</h2>';

        $url = "index.html";

        echo "<meta http-equiv='Refresh' content='3;URL=$url'>";

    }else{

        echo '<h2 style="font-size:24pt;color:black;text-align:center">'."There was an error! Please resubmit.".'</h2>';


        $url1 = "addremovePeople.html";

        echo "<meta http-equiv='Refresh' content='3;URL=$url1'>";


    }

        $conn->close();
?>
    <h2>Powered by Runtime Errors</h2>
  </body>

</html>
