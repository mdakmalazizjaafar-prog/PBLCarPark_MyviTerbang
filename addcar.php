<?php include 'db.php'; ?>
<!--
  add.php — CREATE (the "C" in CRUD)
  Shows a form to type a new student, then saves it into the database.
-->
<h2>Parking Fees</h2>

<!--
  An HTML form. method="post" sends the typed data hidden in the request
  body (not shown in the URL) when the form is submitted.
  Each <input> has a name="..." — that name is how PHP reads the value later.
-->
<form method="post">
  Car Type: <input type="text" name="car_type"><br>
  Hours: <input type="text" name="parkinghour"><br>
  Parking Fee: <input type="text" name="parkingfee"><br>
  <!-- The submit button. Clicking it sends the form. name="save" lets PHP tell that THIS button was pressed. -->
  <input type="submit" name="save" value="Save">
</form>

<?php
// isset(...) checks whether a value exists / was set.
// $_POST is a built-in PHP array that holds the data sent by a form using method="post".
// So this line means: "IF the Save button was clicked, run the code inside { }."
if(isset($_POST['save'])){
  // Read each value the user typed. The key inside [ ] matches the input's name="...".
  $car_type   = $_POST['car_type'];
  $parkinghour = $_POST['parkinghour'];
  $parkingfee = $_POST['parkingfee'];  

  // Send an INSERT command to add a new row to the parkingfees table.
  // "INSERT INTO table (columns) VALUES (...)" is the SQL for creating new data.
  $conn->query("INSERT INTO parkingfees (car_type, parkinghour, parkingfee) VALUES ('$car_type', '$parkinghour', '$parkingfee')");

  // header("Location: ...") tells the browser to redirect to another page.
  // After saving, we send the user back to the list so they can see the new student.
  header("Location: index.php");
}
?>