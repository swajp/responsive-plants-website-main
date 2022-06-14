<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">

    <title>Responsive plants website - Bedimcode</title>
</head>
<body>
<!--==================== HEADER ====================-->
<header class="header" id="header">
    <nav class="nav container">
        <a href="index.php" class="nav__logo">
            <i class="ri-leaf-line nav__logo-icon"></i> Plantex
        </a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="#home" class="nav__link active-link">Domů</a>
                </li>
                <li class="nav__item">
                    <a href="#about" class="nav__link">O nás</a>
                </li>
                <li class="nav__item">
                    <a href="#products" class="nav__link">Produkty</a>
                </li>
            </ul>

            <div class="nav__close" id="nav-close">
                <i class="ri-close-line"></i>
            </div>
        </div>

        <div class="nav__btns">
            <!-- Theme change button -->
            <?php
            if (isset($_SESSION['userid'])) {
                if ($_SESSION['role'] == "admin"){
                    echo "<a href='profile.php'><i class='ri-user-fill'></i></a>";
                    echo "<a href='adminpanel.php'><i class='ri-user-settings-fill'></i></a>";
                    echo "<a href='includes/logout.inc.php'><i class='ri-logout-box-r-fill'></i></a>";
                } else{
                    echo "<a href='profile.php'><i class='ri-user-fill'></i></a>";
                    echo "<a href='cart.php'><i class='ri-shopping-bag-fill'></i></a>";
                    echo "<a href='includes/logout.inc.php'><i class='ri-logout-box-r-fill'></i></a>";
                }
            }
            else {
                echo "<a href='login.php'><i class='ri-user-fill'></i></a>";
            }
            ?>

        </div>
    </nav>
</header>