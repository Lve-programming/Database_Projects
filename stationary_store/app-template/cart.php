<?php
include("includes/layout/header.php");
include("includes/DataBase.php");
?>
<?php
if (isset($_SESSION['user'])) {
    $userId = $user['id'];
    $products = [];
    if (isset($_GET['action'])) {
        $id = $_GET['id'];
        $action = $_GET['action'];
        if ($action == 'delete') {
            $query = $conn->prepare("DELETE FROM cart WHERE id = $id");
        }
        $query->execute();
    }
    $cart = $conn->query("SELECT * FROM products as p INNER JOIN cart as c ON c.product_id = p.id WHERE c.user_id = $userId ORDER BY p.id DESC");
    ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Main Section -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="fs-3 fw-bold">محصولات</h1>

                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="finalize-cart.php" class="btn btn-sm btn-dark">
                            نهایی کردن خرید
                        </a>
                    </div>
                </div>

                <!-- Posts -->
                <div class="mt-4">
                    <div class="table-responsive small">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>عنوان</th>
                                    <th>قیمت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($cart->rowCount() > 0) {
                                    $totoalPrice = 0;
                                    foreach ($cart as $product) {
                                        $totoalPrice += $product['price'];
                                        ?>
                                        <tr>
                                            <th>
                                                <?php echo $product['id']; ?>
                                            </th>
                                            <td>
                                                <?php echo $product['name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $product['price']; ?>
                                            </td>
                                            <td>
                                                <a href="cart.php?action=delete&id=<?php echo $product['id']; ?>"
                                                    class="btn btn-sm btn-outline-danger">حذف</a>
                                            </td>
                                        </tr>
                                        <?php
                                    } ?>
                                    <p class="fw-bold alert alert-secondary">مجموع قیمت سبد خرید: <?php echo $totoalPrice;?> تومان</p>
                                        <?php
                                } else {
                                    ?>
                                    <p class="alert alert-danger">محصولی در سبد خرید قرار نداده اید!</p>
                                    <?php

                                }
}
?>
                        </tbody>

                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Footer -->
<?php
include('includes/layout/footer.php');
?>