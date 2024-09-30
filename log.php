<?php 
include "path.php";
include "app/controllers/users.php";
?>

<!doctype html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/iconsfont.css">
    <!-- Style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">

    <title>IT Blog</title>
  </head>
  <body>

  <?php include("app/include/header.php"); ?> 
 
<!--Form-->
<div class="container reg_form">
    <form class="row justify-content-center" method="post" action="log.php">
        <h2 class="col-12">Авторизація</h2>
        <div class="mb-3 col-12 col-md-4 err">
        </div>
        <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
        <label for="formGroupExampleInput" class="form-label">Введіть вашу пошту</label>
        <input name="mail" value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
    <div class="w-100"></div>
    <div class="mb-3 col-12 col-md-4">
      <label for="exampleInputPassword1" class="form-label">Введіть ваш пароль</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1">
    </div>
      <div class="w-100"></div>
      <div class="mb-3 col-12 col-md-4">
    <button type="submit" name="button-log" class="btn btn-secondary">Увійти</button>
    <a href="reg.php">Реєстрація</a>
    </div>
    </form>
</div>
<!--Form END-->

<?php include("app/include/footer.php"); ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    
  </body>
</html>