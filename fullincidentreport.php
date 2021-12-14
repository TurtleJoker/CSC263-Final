<!DOCTYPE html>
<html>
<head>
  <title>Incident Report</title>
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
    <h2>
    INCIDENT REPORT FORM
    </h2>
   <?php
      
        // We need a server name,  username, password, and the database we are using in order to connect to the database.
        $servername = "localhost";
        $username = "root";
        $password = "angelisha28"; // TO TEST INDIVIDUALLY, ENTER YOUR SQL PASSWORD AS IT IS ON YOUR SYSTEM.
        $dbname = "securitydb"; // AGREED NAME OF OUR DATABASE.
      
        // Attempt to connect to the database in SQL.
        $conn = new mysqli($servername, $username, $password, $dbname);

        // In the case that connection fails.
        if ($conn->connect_error){
           die("<p style='color:red'>" . "Unable to connect to the database: " . $conn->connect_error . "</p>");
        }

           // SQL Query, given the incidentID submitted by incident responder.
           $sql = "SELECT incidents.incidentID, incidenttypes.typeName, incidents.date, 
incidents.state, incidents.personid, people.lastname, people.firstname, 
people.jobTitle, people.email, incidents_ipaddresses.ipAddress, 
handler.reason, incidents_comments.comments
FROM incidents, incidenttypes, people, incidents_ipaddresses, handler, incidents_comments
WHERE incidents.typeID = incidenttypes.typeID
AND incidents.personID = people.personID
AND people.personID = handler.personID
AND handler.handlerID = incidents_ipaddresses.handlerID
AND handler.handlerID = incidents_comments.handlerID
AND incidents.incidentID = ". $_POST["incidentID"] . ";";
  
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0){
          while ($row = $result->fetch_assoc()) {
            echo "<div class='inc_description'><h3>INCIDENT DESCRIPTION</h3>
<p><b>Incident ID</b>&nbsp;&nbsp;".$row["incidentID"]."</p><p><b>Type</b>
&nbsp;&nbsp;".$row["typeName"]."</p><p><b>Date</b>&nbsp;&nbsp;".$row["date"]."</p>
<p><b>State</b>&nbsp;&nbsp;".$row["state"]."</p></div><div class='people'>
<h3>PEOPLE ASSOCIATED</h3><h4>ID: ".$row["personid"]."</h4><p><b>Last Name</b>
&nbsp;&nbsp;".$row["lastname"]."</p><p><b>First Name</b>&nbsp;&nbsp;".$row["firstname"]."</p>
<p><b>Job Title</b>&nbsp;&nbsp;".$row["jobTitle"]."</p><p><b>Email Address</b>&nbsp;&nbsp;".$row["email"]." </p></div>
<div class='comments'><h3>COMMENTS</h3><h4>IP Address:&nbsp;&nbsp;".$row["ipAddress"]."<br>Reason:&nbsp;&nbsp;"
.$row["reason"]."</h4><p>".$row["comments"]."</p></div>";
          }
        } 
        else {
          echo "No results.";
        } 
        $conn->close();
    ?>
    <h2>Powered by Runtime Errors</h2>
</body>
</html>