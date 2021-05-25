<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shoping Cart</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">Online Shoping Cart</span>
                </a>

                <nav class="d-inline-flex mt-md-0 ms-md-auto">
                    <a class="me-3 py-2 text-dark text-decoration-none btn btn-primary btn-sm" href="index.php">Home</a>
                    <a class="me-3 py-2 text-light text-decoration-none btn btn-primary btn-sm" href="viewCart.php">View Cart</a>
                </nav>
            </div>
        </header>

        <div class="row">
            <h1 class="text-center border-bottom pb-4 mb-4">View Cart Products</h1>
            <?php
                if(isset($_GET['value']) == "updated"){
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Successfully!</strong> Your product updated.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }else if(isset($_GET['value']) == "deleted"){
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Successfully!</strong> Your product deleted.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }
            ?>
        </div>

        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <td>Sno</td>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                        <td>Update</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sno = 1;
                        $t = 0;
                        foreach($_SESSION as $product){
                            $p = 0;
                            $q = 0;
                            echo "<form action='editCart.php' method='POST'>";
                            echo "<tr>";
                                echo "<td>".$sno++."</td>";
                                foreach($product as $key => $value){
                                    if($key == 0){
                                        echo "<td>".$value."</td>";
                                        echo "<input type='hidden' name='pro$key' value='".$value."'>";
                                    }else if($key == 1){
                                        echo "<td>".$value."</td>";
                                        echo "<input type='hidden' name='pro$key' value='".$value."'>";
                                        $p = $value;
                                    }else if($key == 2){
                                        echo "<td><input type='text' name='pro$key' value='".$value."' class='form-control'></td>";
                                        $q = $value;
                                    }
                                }
                                $t = $p * $q;
                                echo "<td>".$t."</td>";
                                echo "<td><input type='submit' name='event' value='Update' class='btn btn-warning'></td>";
                                echo "<td><input type='submit' name='event' value='Delete' class='btn btn-danger'></td>";
                            echo "</tr>";
                            echo "</form>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>