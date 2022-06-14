<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';

if (!isset($_SESSION['userid']) || $_SESSION['role'] == "admin") {
    header("location: ./index.php");
    exit();
}
if (isset($_POST['id'])){
    $sql = "INSERT INTO cart (usersId, productsId, productsQuantity) VALUES ('$_SESSION[userid]','$_POST[id]', ' $_POST[quantity]')";
    if(mysqli_query($conn, $sql)){
        echo "Records added successfully.";
        unset($_SESSION['currentProduct']);
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
?>

<div class="px-4 px-lg-0">
    <div style="margin-top: 10rem;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">Produkt</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Cena</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Množství</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Odebrat</div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql = "SELECT * FROM products INNER JOIN cart ON products.productsId = cart.productsId WHERE cart.usersId=" . $_SESSION['userid'];

                            if ($result = mysqli_query($conn, $sql)) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr>
                                <th scope='row' class='border-0'>
                                    <div class='p-2'>
                                        <img src='assets/img/product1.png' alt=''
                                             width='70' class='img-fluid rounded shadow-sm'>
                                        <div class='ml-3 d-inline-block align-middle'>
                                            <h5 class='mb-0'><a href='#' class='text-dark d-inline-block align-middle'>" . $row['productsName'] . "</a></h5><span
                                                    class='text-muted font-weight-normal font-italic d-block'>Category: Plant</span>
                                        </div>
                                    </div>
                                </th>
                                <td class='border-0 align-middle'><strong>" . $row['productsPrice'] * $row['productsQuantity'] . "</strong></td>
                                <td class='border-0 align-middle'><strong>" . $row['productsQuantity'] . "</strong></td>
                                <td class='border-0 align-middle'><a href=?productDelete=" .$row['cartsId']   .  "><i class='ri-delete-bin-fill'></i></td>
                            </tr>";
                                    }
                                    mysqli_free_result($result);
                                } else {
                                    echo "Cart is empty.";
                                }
                            }
                            if (isset($_GET['productDelete'])) {
                                $sql = "DELETE FROM cart WHERE cartsId =" . $_GET['productDelete'];
                                if(mysqli_query($conn, $sql)){
                                    echo "Product removed
                                    ";
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                                }
                            }
                            ?>
                            </tbody>
                        </table>

                    </div>
                    <!-- End -->
                </div>
                <div class="row py-5 p-4 bg-white rounded shadow-sm">

                    <div class="col-lg-6">
                        <div class="p-4">
                            <a href="ordercompleted.php" class="btn btn-dark rounded-pill py-2 btn-block">Závazně objednat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
