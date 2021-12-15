<?php
    include('connection.php');
    $personID = $_POST['personID'];



    $sql="DELETE FROM people 
          WHERE personID = '$personID'; ";


    if($conn->query($sql)){

        echo '<p style="font-size:24pt;color:black;text-align:center">'."Submitted successfully! Returning to home page...".'<p>';

        $url = "index.html";

        echo "<meta http-equiv='Refresh' content='3;URL=$url'>";

    }else{

        echo '<p style="font-size:24pt;color:black;text-align:center">'."There was an error! Please resubmit.".'<p>';


        $url1 = "addremovePeople.html";

        echo "<meta http-equiv='Refresh' content='3;URL=$url1'>";


    }

        $conn->close();
?>