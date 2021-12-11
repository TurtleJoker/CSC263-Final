<!DOCTYPE html>
<html>
<head>
  <title> Attempt To Connect To Database </title>
<body>
  <h1> Connect To Database (PHP) </h1>
  <p><?php
      
        // We need a server name,  username, password, and the database we are using in order to connect to the database.
        $servername = "localhost";
        $username = "root";
        $password = "red@1234"; // TO TEST INDIVIDUALLY, ENTER YOUR SQL PASSWORD AS IT IS ON YOUR SYSTEM.
        $dbname = "securitydb"; // AGREED NAME OF OUR DATABASE.
      
        // Attempt to connect to the database in SQL.
        $conn = new mysqli($servername, $username, $password, $dbname);

        // In the case that connection fails.
        if ($conn->connect_error){
           die("<p style='color:red'>" . "Unable to connect to the database: " . $conn->connect_error . "</p>");
        }

        echo "Established connection with the database!";
    
           // SQL Query, given the incidentID submitted by incident responder.
           $sql = "SELECT Incidents.typeID, Incidents.personID, Incidents.date, Incidents.state, Incidents_IPAddresses.ipAddress, Handler.handlerID, Incidents_Comments.commentID
                   FROM Incidents, Handler, Incidents_IPAddresses, Incidents_Comments
                   WHERE Incidents_Comments.handlerID = Handler.handlerID
                   AND Incidents.date = Incidents_Comments.date
                   AND Handler.personID = Incidents.personID
                   AND Incidents_IPAddresses.incidentID = Handler.incidentID
                   AND Handler.incidentID = Incidents.incidentID
                   AND Incidents.incidentID = ". $_POST["incidentID"] . ";";
  
        $result = $conn->query($sql);
        
        // Creates table for data obtained through the query.
        if ($result->num_rows > 0){
        echo "<table><tr><th>Type ID</th><th>Person ID</th><th>Date</th><th>State</th><th>IP Address</th><th>Handler ID</th><th>Comment ID</th></tr>";
          while ($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["typeID"]."</td><td>".$row["personID"]."</td><td>".$row["date"]."</td><td>".$row["state"]."</td><td>".$row["ipAddress"]."</td><td>".$row["handlerID"]."</td><td>".$row["commentID"]."</td></tr>";
          }
        } 
        else {
          echo "No results.";
        }
        echo "</table>"; 
        $conn->close();
    ?></p>
</body>
</html>
  
  
