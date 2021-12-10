// FOR WHEN INCIDENT RESPONDERS WANT TO SEARCH FOR A INCIDENT GIVEN incidentID.
<!DOCTYPE html>
<html>
<body>
  $sql = "SELECT Incidents.typeID, Incidents.personID, Incidents.date, Incidents.state, Incidents_IPAddresses.ipAddress, Handler.handlerID, Incidents_Comments.commentID
          FROM Incidents, Handler, Incidents_IPAddresses, Incidents_Comments
          WHERE Incidents_Comments.handlerID = Handler.handlerID
          AND Incidents.date = Incidents_Comments.date
          AND Handler.personID = Incidents.personID
          AND Incidents_IPAddresses.incidentID = Handler.incidentID
          AND Handler.incidentID = Incidents.incidentID
          AND Incidents.incidentID = ". $_POST["incidentID"] . ";";
  
  $result = $conn->query($sql);
  
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
  
// Test..
