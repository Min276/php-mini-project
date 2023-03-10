<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div style="max-width: 400px; margin: 0 auto; margin-top: 4rem;" >
    <h1 class="mb-4" >Register here</h1>
    <form action="create.php" method="POST" class="register-form">
    <label for="name" class="form-label">Name</label>
      <input type="name" class="form-control mb-3" name="name" required />
    <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control mb-3" name="email" required />
      <label for="nrc" class="form-label">Password</label>
      <input type="password" class="form-control mb-4" name="password" required />
      <input type="submit" class="btn btn-primary me-3" value="Register" />  
      <a href="../admin.php" class="btn btn-outline-primary">Login</a>

    </form>
    </div>
</div>
</body>
</html>