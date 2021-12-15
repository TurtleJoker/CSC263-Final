<?php
    include('connection.php');
    $incidentID = $_POST['incidentId'];
    $commentDate = date('Y/m/d');
    $comment = $_POST['comments'];
    $handlerName = $_POST['handlerName'];

    $sql1="INSERT INTO COMMENTS(incidentID, commentDate, comment, handlerName)
          VALUES ('$incidentID','$commentDate','$comment','$handlerName')";


    if($conn->query($sql1)){

        echo '<p style="font-size:24pt;color:black;text-align:center">'."Submitted successfully! Returning to home page...".'<p>';

        $url = "index.html";

        echo "<meta http-equiv='Refresh' content='3;URL=$url'>";

    }else{

        echo '<p style="font-size:24pt;color:black;text-align:center">'."There was an error! Please resubmit.".'<p>';


        $url1 = "addComment.html";

        echo "<meta http-equiv='Refresh' content='3;URL=$url1'>";


    }





        $conn->close();
?>
