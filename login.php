<?php
include_once 'header.php';
?>

    <section class="vh-100 bg-image" style="background-color: rgb(248,248,248);">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class=" text-black text-center mb-5">Přihlášení</h2>

                                <form class="text-black" action="includes/login.inc.php" method="post">

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Email</label>
                                        <input type="email" name="email" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Heslo</label>
                                        <input type="password" name="pwd" class="form-control form-control-lg" />
                                    </div>


                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="submit" style="width: 150px"
                                                class="btn btn-block btn-lg text-black">Přihlásit</button>
                                    </div>

                                    <p class="text-center  mt-5 mb-0"><a href="signup.php" style="color: #3E6553" class="text-decoration-none fw-bold"><u>Zaregistrujte se zde</u></a></p>
                                    <?php
                                    if(isset($_GET["error"])){
                                        if($_GET["error"] == "emptyinput"){
                                            echo "<p class='d-flex text-danger fw-bold mt-3 justify-content-center'>Vyplňte všechna pole!</p>";
                                        }
                                        else if ($_GET["error"] == "wronglogin"){
                                            echo "<p class='d-flex text-danger fw-bold mt-3 justify-content-center'>Špatně zadané heslo nebo mail!</p>";
                                        }
                                    }
                                    ?>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include_once 'footer.php';
?>