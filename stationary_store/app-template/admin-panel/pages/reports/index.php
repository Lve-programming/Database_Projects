<?php
include('../../includes/layout/header.php');
$unfinalizedCarts = $conn->query("SELECT u.id,u.user_name, SUM(c.quantity * p.price) as totalprice FROM users u
INNER JOIN cart c ON c.user_id = u.id
INNER JOIN products p ON c.product_id = p.id
GROUP BY u.id
ORDER BY totalprice DESC;");


$inProcessOrders = $conn->query("SELECT o.id,date(o.order_date) as order_date, SUM(od.quantity * od.price_per_unit) as totalprice FROM orders o 
INNER JOIN order_details od ON od.order_id = o.id
WHERE o.status ='process'
GROUP BY o.id
ORDER BY totalprice DESC;");

$monthorders = $conn->query("SELECT MONTHNAME(o.order_date) as monthName , COUNT(o.id) as countOfOrders 
FROM orders o
GROUP BY monthName
");
?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Section -->
        <?php
        include('../../includes/layout/sidebar.php');
        ?>
        <!-- Main Section -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="fs-3 fw-bold">گزارشات</h1>

                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="index.php" class="btn btn-sm btn-dark">
                        بروز آوری
                    </a>
                </div>
            </div>

            <!-- reports -->
            <div class="mt-4">
                <h4 class="text-secondary fw-bold">حساب هایی که سبد خرید نهایی نشده دارند </h4>
                <div class="table-responsive small">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>نام کاربری</th>
                                <th>ارزش سبد خرید</th>
                            </tr>
                        </thead>
                        <?php
                        if ($unfinalizedCarts->rowCount() > 0) {
                            foreach ($unfinalizedCarts as $key => $value) {
                                //$count++;
                                ?>
                                <tbody>
                                    <tr>
                                        <th>
                                            <?php echo $value['id']; ?>
                                        </th>
                                        <td>
                                            <?php echo $value['user_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['totalprice']; ?>
                                        </td>

                                    </tr>
                                    <?php
                            }
                        }
                        ?>


                </div>

                <div class="table-responsive small">
                    <table class="table table-hover align-middle">
                        <div class="mt-4">
                            <br>
                            <br>
                            <br>
                            <hr>
                            <h4 class="text-secondary fw-bold"> خرید های در حال پردازش </h4>


                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>تاریخ ثبت خرید</th>
                                    <th>ارزش خرید</th>
                                </tr>
                            </thead>
                            <?php
                            if ($inProcessOrders->rowCount() > 0) {
                                foreach ($inProcessOrders as $key => $value) {
                                    //$count++;
                                    ?>
                                    <tbody>
                                        <tr>
                                            <th>
                                                <?php echo $value['id']; ?>
                                            </th>
                                            <td>
                                                <?php echo $value['order_date']; ?>
                                            </td>
                                            <td>
                                                <?php echo $value['totalprice']; ?>
                                            </td>

                                        </tr>
                                        <?php
                                }
                            }
                            ?>




                                <div class="table-responsive small">
                                    <table class="table table-hover align-middle">
                                        <div class="mt-4">
                                            <br>
                                            <br>
                                            <br>
                                            <hr>
                                            <h4 class="text-secondary fw-bold"> تعداد سفارش بر اساس ماه     </h4>


                                            <thead>
                                                <tr>
                                                    <th>ماه</th>
                                                    <th>تعداد سفارش </th>
                                                </tr>
                                            </thead>
                                            <?php
                                            if ($monthorders->rowCount() > 0) {
                                                foreach ($monthorders as $key => $value) {
                                                    //$count++;
                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                            
                                                            <td>
                                                                <?php echo $value['monthName']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['countOfOrders']; ?>
                                                            </td>

                                                        </tr>
                                                        <?php
                                                }
                                            }
                                            ?>

                                        </div>
                                </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</body>

</html>