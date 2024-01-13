<?php
include('../../includes/layout/header.php');
if (isset($_GET['action']) and $_GET['action'] == 'delete') {
    $id =$_GET['id'];
    $conn->query("DELETE FROM comment WHERE id = $id");
}elseif(isset($_GET['action']) and $_GET['action'] == 'confirm'){
    $id =$_GET['id'];
    $conn->query("UPDATE comment SET visible = true WHERE id = $id");
}
$comments = $conn->query("SELECT * FROM comment ORDER BY send_time DESC");

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
                <h1 class="fs-3 fw-bold">کامنت ها</h1>
            </div>

            <!-- Comments -->
            <div class="mt-4">
                <div class="table-responsive small">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>آی دی محصول</th>
                                <th>آی دی کاربر</th>
                                <th>متن کامنت</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($comments)) {
                                foreach ($comments as $key => $value) {
                                    ?>
                                    <tr>
                                        <th>
                                            <?php echo $value['product_id']; ?>
                                        </th>
                                        <td>
                                            <?php echo $value['user_id']; ?>
                                        </td>
                                        <td>
                                            <?php echo $value['text']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($value['visible']) {
                                                ?>
                                                <a href="#" class="btn btn-sm btn-outline-dark disable">تایید شده</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="index.php?action=confirm&id=<?php echo $value['id'] ?>"
                                                    class="btn btn-sm btn-outline-info "> در انتظار تایید </a>
                                            <?php } ?>
                                            <a href="index.php?action=delete&id=<?php echo $value['id'] ?>"
                                                class="btn btn-sm btn-outline-danger">حذف</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>

                            </tr>
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