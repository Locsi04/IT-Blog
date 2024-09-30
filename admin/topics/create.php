<?php
    include "../../path.php";
    include "../../app/controllers/topics.php";
?>
<!doctype html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="stylesheet" href="../../assets/css/iconsfont.css">
    <!-- Style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">

    <title>IT Blog</title>
  </head>
  <body>

    <?php include("../../app/include/header-admin.php"); ?>
    <div class="container">
    <?php include("../../app/include/sidebar-admin.php"); ?>
            
            <div class="posts col-9">
                <div class="button row">
                    <a href="create.php" class="col-2 btn btn-success">Створити категорію</a>
                <span class="col-1"></span>
                    <a href="index.php" class="col-3 btn btn-warning">Редагувати категорії</a>
                </div>
                <div class="row title-table">
                    <h2>Додавання категорії</h2>
                </div>
                <div class="row add-post">
                <div class="mb-12 col-12 col-md-12 err">
                <p><?=$errMsg?></p>
                </div>
                    <form action="create.php" method = "post">
                    <div class="col">
                        <input name="name" value="<?=$name?>" type="text" class="form-control" placeholder="Назва категорії" aria-label="Назва категорії">
                    </div>
                    <div class="col">
                        <label for="content" class="form-label">Опис категорії</label>
                        <textarea name="description" class="form-control" id="content" rows="3"><?=$description;?></textarea>
                    </div>
                    
                    <div class="col">
                        <button name="topic-create" class="btn btn-primary" type="submit">Створити категорію</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Footer -->
<?php include("../../app/include/footer.php"); ?>
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