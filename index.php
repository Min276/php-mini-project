<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registeration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
   .register-form {
    max-width: 400px;
   }
</style>
<?php
   session_start();
   require("db/db.php");
   $registered = isset($_SESSION['registered']);
   $enrolled = isset($_GET['enrolled']);
   if($enrolled){
   $id = $_GET['enrolled'];

   $data = $db->query("SELECT * FROM students WHERE id=$id");
   $row = $data->fetch();
   }
?>
<body>
<div class="container">
    <?php if($registered && $enrolled) : ?>
    <h1 class="mt-4">You've successfully registered for the 2022-2023 Academic Year !!</h1>
    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, perferendis? Et aspernatur ea illo quaerat ducimus quos est doloribus, suscipit blanditiis magni architecto voluptatum quisquam fugiat fuga amet aut iste.
    </p>
    <table class="table table-striped table-bordered">
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Email</th>
          <th>NRC</th>
          <th>DOB</th>
          <th>Address</th>
          <th>Phone No</th>
          <th>Registered at</th>
        </tr>
        
        <tr>
           <td><?= $row->id ?></td>
           <td><?= $row->name ?></td>
           <td><?= $row->email ?></td>
           <td><?= $row->nrc ?></td>
           <td><?= $row->dob ?></td>
           <td><?= $row->address ?></td>
           <td><?= $row->phone_no ?></td>
           <td><?= $row->registered_at ?></td>
        </tr>
      
    </table>
    <a href="_actions/update.php">Register again</a>
    <?php else : ?>
    <div style="max-width: 400px; margin: 0 auto">
    <h1 class="my-4">You can register here</h1>
    <form action="_actions/register.php" method="POST" class="register-form">
      <label for="name" class="form-label">Your Name *</label>
      <input type="text" class="form-control mb-3" name="name" required />
      <label for="email" class="form-label">Your Email</label>
      <input type="email" class="form-control mb-3" name="email" />
      <label for="nrc" class="form-label">Your NRC No * </label>
      <input type="text" class="form-control mb-3" name="nrc" required />
      <label for="dob" class="form-label">Your DOB * </label>
      <input type="date" class="form-control mb-3" name="dob" required />
      <label for="address" class="form-label">Your Address *</label>
      <input type="text" class="form-control mb-3" name="address" required/>
      <label for="phone" class="form-label">Your Ph no *</label>
      <input type="tel" class="form-control mb-5" name="phone" required />
      <input type="submit" class="btn btn-primary" value="Submit" />      
    </form>
    </div>
    <?php endif ?>
    </div>
</body>
</html>