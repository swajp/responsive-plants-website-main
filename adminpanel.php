<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';

if ($_SESSION['role'] != 'admin') {
    header("location: ./index.php");
    exit();
}
?>
<div style="background-color: rgb(255,255,255);">
    <h1 style="margin-top: 5rem" class=" text-center text-black">Administrace</h1>
    <hr class="text-white">
    <?php
    $sql = "SELECT * FROM products";

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<h3 class='text-center mt-5 text-black'>Produkty</h3>";
            echo "<table class='table table-bordered'>";
            echo "<tr>";
            echo "<th class='text-black'>ID</th>";
            echo "<th class='text-black'>Název</th>";
            echo "<th class='text-black'>Cena</th>";
            echo "<th class='text-black'>Dostupnost</th>";
            echo "<th class='text-black'>Odebrání</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td class='text-black'>" . $row['productsId'] . "</td>";
                echo "<td class='text-black'>" . $row['productsName'] . "</td>";
                echo "<td class='text-black'>$" . $row['productsPrice'] . "</td>";
                if ($row['productAvailable'] == 1) {
                    echo "<td> <a href=adminpanel.php?idProduct=" . $row['productsId'] . "&available=" . $row['productAvailable'] . productStatus($conn) . "><p class='text-success'>Dostupný</p><a/></td>";
                } else if ($row['productAvailable'] == 0) {
                    echo "<td> <a href=adminpanel.php?idProduct=" . $row['productsId'] . "&available=" . $row['productAvailable'] . productStatus($conn) . "><p class='text-danger'>Nedostupný</p><a/></td>";
                }
                echo "<td> <a href=adminpanel.php?idRemove=" . $row['productsId'] . "><p class='text-danger'>Odebrání</p><a/></td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo "No rows in database.";
        }
    } else {
        echo "ERROR: $sql. " . mysqli_error($conn);
    }
    if (isset($_GET['idRemove'])) {
        $sql = "DELETE FROM products WHERE productsId = " . $_GET['idRemove'];
        if (mysqli_query($conn, $sql)) {
            echo "Úspěšně odebráno";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
    <?php
    $sql = "SELECT * FROM users";

    if ($result = mysqli_query($conn, $sql)) {
        echo "<h3 class='text-center mt-5 text-black'>Uživatelé</h2>";
        echo "<table class='table table-bordered'>";
        echo "<tr>";
        echo "<th class='text-black'>ID</th>";
        echo "<th class='text-black'>Jméno</th>";
        echo "<th class='text-black'>Email</th>";
        echo "<th class='text-black'>Role</th>";
        echo "<th class='text-black'>Mazání</th>";
        echo "<th class='text-black'>Změna rolí</th>";
        echo "</tr>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td class='text-black'>" . $row['usersId'] . "</td>";
                echo "<td class='text-black'>" . $row['usersName'] . "</td>";
                echo "<td class='text-black'>" . $row['usersEmail'] . "</td>";
                echo "<td class='text-black'>" . $row['usersRole'] . "</td>";
                if ($row['usersName'] == "admin") {
                    echo "<td></td>";
                }
                if ($row['usersName'] != "admin") {
                    echo "<td> <a href=adminpanel.php?idDelete=" . $row['usersId'] . deleteUser($conn) . ">Vymazat uživatele<a/></td>";
                }
                echo "<td> <a href=adminpanel.php?idEdit=" . $row['usersId'] . "&roleEdit=" . $row['usersRole'] . changeRole($conn) . ">Změnit roli<a/></td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo "No rows in database.";
        }
    } else {
        echo "Error:  $sql. " . mysqli_error($conn);
    }
    function productStatus($conn)
    {
        if (isset($_GET['idProduct'])) {
            if ($_GET['available'] == "0") {
                $sql = "UPDATE products SET productAvailable = " . '1 ' . "WHERE productsId = " . $_GET['idProduct'];
                if (mysqli_query($conn, $sql)) {
                    echo "Úspěšně změněno";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }
            if ($_GET['available'] == "1") {
                $sql = "UPDATE products SET productAvailable = " . '0 ' . "WHERE productsId = " . $_GET['idProduct'];
                if (mysqli_query($conn, $sql)) {
                    echo "Úspěšně změněno";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }
        }
    }

    function deleteUser($conn)
    {
        if (isset($_GET['idDelete'])) {
            $sql = "DELETE FROM users WHERE usersId = " . $_GET['idDelete'];

            if (mysqli_query($conn, $sql)) {
                echo "Uživatel vymazán";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    }

    function changeRole($conn)
    {
        if (isset($_GET['idEdit'])) {
            if ($_GET['roleEdit'] == "user") {
                $sql = "UPDATE users SET usersRole = " . '"admin "' . "WHERE usersId = " . $_GET['idEdit'];
                if (mysqli_query($conn, $sql)) {
                    echo "Úspěšně změněno";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }
            if ($_GET['roleEdit'] == "admin") {
                $sql = "UPDATE users SET usersRole = " . '"user "' . "WHERE usersId = " . $_GET['idEdit'];
                if (mysqli_query($conn, $sql)) {
                    echo "Úspěšně změněno";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }
        }
    }

    ?>
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div>
                        <div class="card-body p-5">
                            <h3 class='text-center mt-5 text-black'>Přidání zboží</h3>

                            <form class="text-black" action='' method="post">

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3cg">Název</label>
                                    <input type="text" name="productName" class="form-control form-control-lg"/>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cg">Cena</label>
                                    <input type="text" name="productPrice" class="form-control form-control-lg"/>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="add" style="width: 150px"
                                            class="btn btn-block btn-lg text-black">Přidat
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['add'])) {
    $sql = "INSERT INTO products (productsName, productsPrice) VALUES ('$_POST[productName]', '$_POST[productPrice]')";

    if (mysqli_query($conn, $sql)) {
        echo "Zboží prídáno";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
