<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>
<?php
        require('db/db.php');

    session_start();
    $isAdmin = isset($_SESSION['isAdmin']);


    $data = $db->query("SELECT * FROM students");
    $rows = $data->fetchAll();

    $registered = isset($_GET['registered']);
    $authError = isset($_GET['auth_error']);
?>
<body>
    <div class="container">
    <?php if($isAdmin) : ?>
    <div>
    <h1>Student List</h1>
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam dolore illo ipsum eius eligendi. Consequatur ipsam obcaecati incidunt aspernatur eos. Porro corrupti consectetur corporis qui molestiae totam nostrum, inventore quam.
   iat quaerat?
    Culpa, vitae. Ipsum, omnis ducimus! Perferendis debitis minima, aliquam est repellat nemo perspiciatis delectus doloremque suscipit molestias atque nulla, cum odit ab veniam itaque culpa incidunt ea. Distinctio, ipsa esse!
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
        <?php foreach($rows as $row): ?>
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
        <?php endforeach ?>
    </table>
    <a href="_actions/logout.php">Log out</a>
        </div>
    <?php else : ?>
    <div style="max-width: 400px; margin: 0 auto; margin-top: 4rem;" >
    <?php if($registered) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Successfully registered</strong> your account !! Please Log in
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
   <?php endif ?>
   <?php if($authError) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Incorrect Credentials !!</strong> Please type your email and password carefully
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
   <?php endif ?>
    <h1 class="mb-4" >Login here</h1>
    <form action="auth/authcheck.php" method="POST" class="register-form">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control mb-3" name="email" required />
      <label for="nrc" class="form-label">Password</label>
      <input type="password" class="form-control mb-4" name="password" required />
      <input type="submit" class="btn btn-primary me-3" value="Login" />  
      <a href="_actions/user-register.php" class="btn btn-outline-primary">Register</a>
    </form>
    </div>
    <?php endif ?>
</div>
</body>
</html>