<?php
include('includes/layout/header.php');

if (isset($_GET['type']) && isset($_GET['action']) && isset($_GET['id'])) {
    $type = $_GET['type'];
    $action = $_GET['action'];
    $id = $_GET['id'];
    switch ($type) {
        case 'product':
            $query = $conn->prepare("DELETE FROM products WHERE id=$id");
            break;
        case 'category':
            $query = $conn->prepare("DELETE FROM category WHERE id=$id");
            break;
    }
    $query->execute();



}
$products = $conn->query("SELECT * FROM products ORDER BY id DESC LIMIT 4");
$categories = $conn->query("SELECT * FROM category ORDER BY id DESC LIMIT 4");

?>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Section -->
        <?php
        include('includes/layout/sidebar.php');
        ?>
        <!-- Main Section -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="fs-3 fw-bold">داشبورد</h1>
            </div>

            <!-- Recently products -->
            <div class="mt-4">
                <h4 class="text-secondary fw-bold">محصولات اخیر</h4>
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
                        <?php
                        if ($products->rowCount() > 0) {
                            $count = 0;
                            foreach ($products as $key => $value) {
                                //$count++;
                                ?>
                                <tbody>
                                    <tr>
                                        <th>
                                            <?php echo $value['id']; ?>
                                        </th>
                                        <td>
                                            <?php echo $value['name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $value['price'] ?>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-dark">ویرایش</a>
                                            <a href="index.php?type=product&action=delete&id=<?php echo $value['id']; ?>"
                                                class="btn btn-sm btn-outline-danger">حذف</a>
                                        </td>
                                    </tr>
                                    <?php
                            }
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recently Comments -->
            <!-- <div class="mt-4">
                <h4 class="text-secondary fw-bold">کامنت های اخیر</h4>
                <div class="table-responsive small">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>نام</th>
                                <th>متن کامنت</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>علی شیخ</td>
                                <td>
                                    لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم از صنعت چاپ و با
                                    استفاده از طراحان گرافیک است.
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-dark disabled">تایید شده</a>
                                    <a href="#" class="btn btn-sm btn-outline-danger">حذف</a>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>علی شیخ</td>
                                <td>
                                    لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم از صنعت چاپ و با
                                    استفاده از طراحان گرافیک است.
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-info">در انتظار تایید</a>
                                    <a href="#" class="btn btn-sm btn-outline-danger">حذف</a>
                                </td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>علی شیخ</td>
                                <td>
                                    لورم ایپسوم متن ساختگی با تولید
                                    سادگی نامفهوم از صنعت چاپ
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-dark disabled">تایید شده</a>
                                    <a href="#" class="btn btn-sm btn-outline-danger">حذف</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> -->

            <!-- Categories -->
            <div class="mt-4">
                <h4 class="text-secondary fw-bold">دسته بندی</h4>
                <div class="table-responsive small">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>عنوان</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($products->rowCount() > 0) {
                                $count = 0;
                                foreach ($categories as $key => $value) {
                                    // $count++;
                                    ?>
                                    <tr>
                                        <th>
                                            <?php echo $value['id'] ?>
                                        </th>
                                        <td>
                                            <?php echo $value['name'] ?>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-outline-dark">ویرایش</a>
                                            <a href="index.php?type=category&action=delete&id=<?php echo $value['id']; ?>"
                                                class="btn btn-sm btn-outline-danger">حذف</a>
                                        </td>
                                    </tr>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</body>

</html>