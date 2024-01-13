<?php
include('../../includes/layout/header.php');
if (isset($_GET['action'])) {
   $action =$_GET['action'];
   $id =$_GET['id'];
   if ($action == 'delete') {
    $query =$conn->prepare("DELETE FROM products WHERE id = $id");
   }
   $query->execute();
}
$products = $conn->query("SELECT * FROM products ORDER BY id DESC");
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
                <h1 class="fs-3 fw-bold">محصولات</h1>

                <div class="btn-toolbar mb-2 mb-md-0">
                    <a href="./create.php" class="btn btn-sm btn-dark">
                        ایجاد محصول
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
                            if (isset($products)) {
                                foreach ($products as $key => $value) {
                                    ?>
                                    <tr>
                                        <th><?php echo $value['id'];?></th>
                                        <td><?php echo $value['name'];?></td>
                                        <td> <?php echo $value['price'];?></td>
                                        <td>
                                            <a href="./edit.html" class="btn btn-sm btn-outline-dark">ویرایش</a>
                                            <a href="index.php?action=delete&id=<?php echo $value['id'];?>" class="btn btn-sm btn-outline-danger">حذف</a>
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