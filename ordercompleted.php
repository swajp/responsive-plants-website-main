<?php
include_once 'header.php';

if (!isset($_SESSION['userid']) || $_SESSION['role'] == "admin") {
    header("location: ./index.php");
    exit();
}
?>
    <section class="vh-100 bg-image" style="background-color: rgb(248,248,248);">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class=" text-black text-center mb-5">Objednávka odeslána</h2>
                                <p class=" text-black text-center mb-5">Na Váš email byl záslan odkaz ohlědně dopravy a platby</p>
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