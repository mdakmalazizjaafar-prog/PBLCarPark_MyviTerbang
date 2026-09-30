<?php include 'db.php'; ?>
<!--
  add.php — CREATE (the "C" in CRUD)
  Shows a form to type a new student, then saves it into the database.
-->
<h2>Add Driver</h2>

<!--
  An HTML form. method="post" sends the typed data hidden in the request
  body (not shown in the URL) when the form is submitted.
  Each <input> has a name="..." — that name is how PHP reads the value later.
-->
<form method="post">
  Name: <input type="text" name="name"><br>
  Phone Number: <input type="text" name="phone_num"><br>
  Email: <input type="email" name="email"><br>
  Password: <input type="password" name="password"><br>
  Car Plate Number: <input type="text" name="carplate_num"><br>
  <!-- The submit button. Clicking it sends the form. name="save" lets PHP tell that THIS button was pressed. -->
  <input type="submit" name="save" value="Save">
</form>

<?php
// isset(...) checks whether a value exists / was set.
// $_POST is a built-in PHP array that holds the data sent by a form using method="post".
// So this line means: "IF the Save button was clicked, run the code inside { }."
if(isset($_POST['save'])){
  // Read each value the user typed. The key inside [ ] matches the input's name="...".
  $name   = $_POST['name'];
  $phone_num = $_POST['phone_num'];
  $email  = $_POST['email'];
  $password = $_POST['password'];
  $carplate_num = $_POST['carplate_num'];

  // Send an INSERT command to add a new row to the users table.
  // "INSERT INTO table (columns) VALUES (...)" is the SQL for creating new data.
  $conn->query("INSERT INTO users (name,phone_num,email,password,carplate_num) VALUES ('$name','$phone_num','$email','$password','$carplate_num')");

  // header("Location: ...") tells the browser to redirect to another page.
  // After saving, we send the user back to the list so they can see the new student.
  header("Location: index.php");
}
?>