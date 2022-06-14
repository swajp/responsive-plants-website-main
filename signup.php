<?php
include_once 'header.php';
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>reg</title>
    </head>
    <body>
    <section class="vh-100 bg-image" style="background-color: rgb(248,248,248);">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class=" text-black text-center mb-5">Registrace</h2>

                                <form class="text-black" action="includes/signup.inc.php" method="post">

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Uživatelské jméno</label>
                                        <input type="text" name="name" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg">Email</label>
                                        <input type="email" name="email" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Heslo</label>
                                        <input type="password" name="pwd" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Heslo znovu</label>
                                        <input type="password" name="pwdrepeat" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg">Registrační kód</label>
                                        <input type="text" name="invite" class="form-control form-control-lg" />
                                    </div>


                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="submit" style="width: 150px"
                                                class="btn btn-block btn-lg text-black">Registrovat</button>
                                    </div>

                                    <p class="text-center  mt-5 mb-0"><a href="login.php" style="color: #3E6553" class="text-decoration-none fw-bold"><u>Zaregistrujte se zde</u></a></p>
                                    <?php
                                    if(isset($_GET["error"])){
                                        if($_GET["error"] == "emptyinput"){
                                            echo "<p>Vyplňte všechna pole!</p>";
                                        }
                                        else if ($_GET["error"] == "invalidemail"){
                                            echo "<p>Vyberte si správný mail!</p>";
                                        }
                                        else if ($_GET["error"] == "passwordsdontmatch"){
                                            echo "<p>Hesla se neshodují!</p>";
                                        }
                                        else if ($_GET["error"] == "stmtfailed"){
                                            echo "<p>Něco se nepovedlo!</p>";
                                        }
                                        else if ($_GET["error"] == "emailtaken"){
                                            echo "<p>Email už je zaregistrovaný!</p>";
                                        }
                                        else if ($_GET["error"] == "none"){
                                            echo "<p>Úspěšně zaregistrován!</p>";
                                        }
                                        else if ($_GET["error"] == "invalidinvite"){
                                            echo "<p>Špatný kód!</p>";
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

    </body>
    </html>
