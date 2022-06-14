<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';
?>


<main class="main">
    <!--==================== HOME ====================-->
    <section class="home" id="home">
        <div class="home__container container grid">
            <img src="assets/img/home.png" alt="" class="home__img">

            <div class="home__data">
                <h1 class="home__title">
                    Rostliny pro <br> lepší život
                </h1>
                <p class="home__description">
                    Dodejde svému domu nový vzhled. Ozdobte své kanceláře a prázdné prostory.
                </p>
                <a href="#about" class="button button--flex">
                    Prozkoumat <i class="ri-arrow-right-down-line button__icon"></i>
                </a>
            </div>

            <div class="home__social">
                <span class="home__social-follow">Sledujte</span>

                <div class="home__social-links">
                    <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                        <i class="ri-facebook-fill"></i>
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                        <i class="ri-instagram-line"></i>
                    </a>
                    <a href="https://twitter.com/" target="_blank" class="home__social-link">
                        <i class="ri-twitter-fill"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!--==================== ABOUT ====================-->
    <section class="about section container" id="about">
        <div class="about__container grid">
            <img src="assets/img/about.png" alt="" class="about__img">

            <div class="about__data">
                <h2 class="section__title about__title">
                    Kdo opravdu jsme & <br> Proč zrovna my
                </h2>

                <p class="about__description">
                    Máme přes 4000 spokojených zákazníků, kteří nám už několik let důvěřují. A spoléhají na naši
                    kvalitu.
                </p>

                <div class="about__details">
                    <p class="about__details-description">
                        <i class="ri-checkbox-fill about__details-icon"></i>
                        Vždy doručujeme včas.
                    </p>
                    <p class="about__details-description">
                        <i class="ri-checkbox-fill about__details-icon"></i>
                        Příručky ohledně zakoupených rostlin.
                    </p>
                    <p class="about__details-description">
                        <i class="ri-checkbox-fill about__details-icon"></i>
                        Garance vrácení peněz.
                    </p>
                    <p class="about__details-description">
                        <i class="ri-checkbox-fill about__details-icon"></i>
                        Přijedeme zkontrolovat vámi zakoupené rostliny.
                    </p>
                </div>

                <a href="#products" class="button--link button--flex">
                    Nakupovat <i class="ri-arrow-right-down-line button__icon"></i>
                </a>
            </div>
        </div>
    </section>

    <!--==================== PRODUCTS ====================-->
    <section class="product section container" id="products">
        <h2 class="section__title-center">
            Podívejte se na naše produkty
        </h2>

        <p class="product__description">
            Zde jsou některé vybrané rostliny z našeho showroomu, všechny jsou ve výborném stavu a mají dlouhou
            životnost. Nakupujte a užívejte si nejlepší kvalitu.
        </p>

        <div class="product__container grid">
            <?php
            $sql = "SELECT * FROM products";

            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        if ($row['productAvailable']) {
                            $_SESSION['currentProduct'] = $row['productsId'];
                            echo "
                    <article class='product__card'>
                <div class='product__circle'></div>

                <img src='assets/img/product1.png' alt='' class='product__img'>

                <h3 class='product__title'>" . $row['productsName'] . "</h3>
                <span class='product__price'>$" . $row['productsPrice'] . "</span>";
                            if (isset($_SESSION['role'])) {
                                if ($_SESSION['role'] == 'user') {
                                    echo " <form name='form' action='cart.php'  method='post'>
                               ID: <input name='id' readonly value=" . $row['productsId'] . " style='width: 30px; border: none;' type='number'>
                                <input name='quantity' min='1' max='10' value='1' style='width: 40px;' type='number'>
                                <input class='btn btn-outline-success' type='submit' value='Přidat'>
</i>
</form>";
                                }

                            } else{
                            }

                            echo " </article>";

                        }
                    }
                    mysqli_free_result($result);
                } else {
                    echo "No rows in database.";
                }
            }
            ?>
        </div>
    </section>


    <?php
    include_once 'footer.php';
    ?>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-fill scrollup__icon"></i>
    </a>

    <!--=============== SCROLL REVEAL ===============-->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
</main>
</html>
