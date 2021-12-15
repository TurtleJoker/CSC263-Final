<?php
    include('connection.php');
    $incidentId = $_POST['incidentId'];
    $ipAddress = $_POST['ipAddress'];
    $association = $_POST['association'];


    $sql="INSERT INTO IPADDRESS(incidentID,ipAddress,ipAssociation)
    VALUES('$incidentId','$ipAddress','$association')";


    if($conn->query($sql)){

        echo '<p style="font-size:24pt;color:black;text-align:center">'."Submitted successfully! Returning to home page...".'<p>';

        $url = "index.html";

        echo "<meta http-equiv='Refresh' content='3;URL=$url'>";

    }else{

        echo '<p style="font-size:24pt;color:black;text-align:center">'."There was an error! Please resubmit.".'<p>';


        $url1 = "addIpAddress.html";

        echo "<meta http-equiv='Refresh' content='3;URL=$url1'>";


    }

        $conn->close();
?>
