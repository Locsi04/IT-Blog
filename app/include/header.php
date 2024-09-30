<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                     <a href="index.php">IT Blog</a>
                    </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="index.php">Головна</a></li>
                    <li><a href="about.php">Про нас</a></li>
                    <li><a href="#">Послуги</a></li>
                    <li>
                        <?php if (isset($_SESSION['id'])): ?>
                        <a href="#">
                            <i class="far fa-user"></i>
                             <?php echo $_SESSION['login'];?>
                            </a>
                     <ul>
                        <?php if ($_SESSION['admin']): ?>
                        <li><a href="/IT%20Blog/admin/posts/index.php">Адмін панель</a></li>
                        <?php endif; ?>
                        <li><a href="logout.php">Вихід</a></li>
                     </ul>
                        <?php else: ?>
                            <a href="log.php">
                            <i class="fa-solid fa-user"></i>
                            Авторизація
                            </a>
                     <ul>
                        <li><a href="reg.php">Реєстрація</a></li>
                     </ul>
                        <?php endif; ?>
                        
                    </li>
                </ul>
            </nav>
        </div>
    </div>
 </header>