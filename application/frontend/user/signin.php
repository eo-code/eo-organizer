<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/./sign.css">
  <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../../../assets/icon/css/all.css">
  <title>Sign In</title>
</head>

<body>
  <div class="sign d-flex justify-content-center align-items-center w-100">
    <div class="container">
      <div class="box-sign w-100 d-flex p-4">
        <div class="left d-flex align-items-center justify-content-center flex-column">
          <div class="logo mb-4"></div>
          <h3 class="text-center">Paper Flower Backdrop Decoration</h3>
        </div>
        <div class="right d-flex flex-column p-4">
          <h2 class="mb-5">Sign In</h2>

          <form action="../../backend/user/signin.php" method="post">
            <div class="form-group">
              <label for="">Email</label>
              <input type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" class="form-control" name="password" id="password">
            </div>
            <p>Apakah anda belum punya akun? <a href="./signup.php">Sign Up</a></p>
            <button class="mt-2">Sign In</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</body>

</html>