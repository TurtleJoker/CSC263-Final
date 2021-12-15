<!DOCTYPE html>
<html>

  <head>
    <title>Adding IP Address</title>
    <link rel="stylesheet" type="text/css" href="style.css">

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
    $ipAddress = $_POST['ipAddress'];
    $incidentID = $_POST['incidentID'];
    $handler = $_POST['handlerID'];


    $sql="INSERT INTO incidents_ipAddresses
    VALUES('$ipAddress', '$incidentID', '$handler')";


    if($conn->query($sql)){

        echo '<h2 style="font-size:24pt;color:black;text-align:center">'."Submitted successfully! Returning to home page...".'</h2>';

        $url = "index.html";

        echo "<meta http-equiv='Refresh' content='3;URL=$url'>";

    }else{

        echo '<h2 style="font-size:24pt;color:black;text-align:center">'."There was an error! Please resubmit.".'</h2>';


        $url1 = "addremoveipAddress.html";

        echo "<meta http-equiv='Refresh' content='3;URL=$url1'>";


    }

        $conn->close();
?>
    <h2>Powered by Runtime Errors</h2>
  </body>

</html>
