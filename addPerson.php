<?php
    include('connection.php');
    $incidentId = $_POST['incidentId'];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $jobTitle = $_POST['jobTitle'];
    $emailAddress = $_POST['emailAddress'];
    $association = $_POST['association'];


    $sql="INSERT INTO PEOPLE(incidentID,lastName,firstName,jobTitle,email, personAssociation)
    VALUES('$incidentId','$lastName','$firstName','$jobTitle','$emailAddress','$association')";


    if($conn->query($sql)){

        echo '<p style="font-size:24pt;color:black;text-align:center">'."Submitted successfully! Returning to home page...".'<p>';

        $url = "index.html";

        echo "<meta http-equiv='Refresh' content='3;URL=$url'>";

    }else{

        echo '<p style="font-size:24pt;color:black;text-align:center">'."There was an error! Please resubmit.".'<p>';


        $url1 = "addPerson.html";

        echo "<meta http-equiv='Refresh' content='3;URL=$url1'>";


    }

        $conn->close();
?>
