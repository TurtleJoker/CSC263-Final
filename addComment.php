<!DOCTYPE html>
<html>

  <head>
    <title>Adding Comments...</title>
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
    $commentID = $_POST['commentID'];
    $handlerID = $_POST['handlerID'];
    $comment = $_POST['comments'];
    $commentDate = date('Y-m-d', strtotime($_POST['date']));
    $ipAdd = $_POST['ipAddress'];
   
    $sql1="INSERT INTO incidents_comments
          VALUES ('$commentID','$handlerID','$comment','$commentDate', '$ipAdd');";


    if($conn->query($sql1)){

        echo '<p style="font-size:24pt;color:black;text-align:center">'."Submitted successfully! Returning to home page...".'<p>';

        $url = "index.html";

        echo "<meta http-equiv='Refresh' content='30;URL=$url'>";

    }else{

        echo '<p style="font-size:24pt;color:black;text-align:center">'."There was an error! Please resubmit.".'<p>';


        $url1 = "addComment.html";

        echo "<meta http-equiv='Refresh' content='30;URL=$url1'>";


    }





        $conn->close();
?>
<h2>Powered by Runtime Errors</h2>
  </body>

</html>

