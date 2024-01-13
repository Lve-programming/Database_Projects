<?php
include("includes/layout/header.php");
include("includes/DataBase.php");
$url = "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$parts = parse_url($url);
parse_str($parts['query'], $query);
$id = $query['id'];
$query = "SELECT * FROM products Where id =" . $id;
$product = $conn->query($query);
$error = "";
if (isset($_POST['comment'])) {
    if (isset($_SESSION['user'])) {
        if (empty($_POST['commentText'])) {
            $error = "نظرتان را در کادر بالا بنویسید";
        } else {
            $userId = $user['id'];
            $txt = $_POST['commentText'];
            $time = date("y/m/d h:i:s", time());
            $insertComment = $conn->prepare("INSERT INTO comment (`user_id`,`product_id`,`text`,`send_time`)values(:userId,:productId,:text,:time)");
            $insertComment->execute(["userId" => $userId, "productId" => $id, "text" => $txt, "time" => $time]);
        }
    } else {
        header('Location: login-form.php');
    }
}
$query = "SELECT u.user_name,c.* FROM comment c 
INNER JOIN products p ON p.id = c.product_id
INNER JOIN users u ON u.id = c.user_id
WHERE c.product_id = $id  AND c.visible = true
ORDER BY c.send_time DESC";
$comments = $conn->query($query);
$added = "";
// print_r($categories);
$attributes = array();
if (isset($_POST['addcart'])) {

    if (isset($_SESSION['user'])) {

        $userId = $user['id'];
        $productId = $_GET['id'];
        $query = $conn->query("INSERT INTO cart(user_id, product_id, quantity) VALUES ($userId,$productId,1)");
        $added = "added";
    } else {
        header('Location: login-form.php');
    }

}

?>
<main>
    <!-- Content -->
    <section class="mt-4">
        <div class="row">
            <!-- Posts & Comments Content -->
            <?php
            if ($product->rowCount() > 0) {
                foreach ($product as $values) {
                    ?>
                    <div class="col-lg-8">
                        <div class="row justify-content-center">
                            <!-- Post Section -->
                            <div class="col">
                                <div class="card">
                                    <img src="./assets/images/products/<?php echo $values['img'] ?>" class="card-img-top"
                                        alt="post-image" />
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="card-title fw-bold">
                                                <?php echo $values['name']; ?>
                                            </h5>
                                            <div>
                                                <span class="badge text-bg-secondary">
                                                    <?php
                                                    $catId = $values['category'];
                                                    echo $categories[$catId];
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <p class="card-text text-secondary text-justify pt-3">
                                            <?php echo $values['detail']; ?>
                                        </p>
                                        <hr>
                                        <h5 class="card-title fw-bold">
                                            مشخصات:
                                        </h5>
                                        <?php
                                        $attributes = json_decode($values['attributes'], true);
                                        if (isset($values['attributes'])) {
                                            foreach ($attributes as $key => $value) {

                                                ?>
                                                <p class="card-text text-secondary text-justify pt-3">
                                                    <?php echo $key . " : " . $value; ?>
                                                </p>
                                            <?php }
                                        } ?>
                                        <div>
                                            <p class="btn btn-info">
                                                <?php echo "قیمت: " . $values['price']; ?>
                                            </p>
                                        </div>
                                        <div>
                                            <form method="post">
                                                <button name="addcart" type="submit button button" class="btn btn-danger">
                                                    <?php echo "افزودن به سبد خرید" ?>
                                                </button>
                                            </form>
                                            <?php
                                            if ($added == "added") {
                                                ?>
                                                </br>
                                                <p class="alert alert-success"> با موفقیت به سبد خرید افزوده شد</p>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="mt-4" />
                            <?php
                }
            }
            ?>
                    <!-- Comment Section -->
                    <div class="col">
                        <!-- Comment Form -->
                        <div class="card">
                            <div class="card-body">
                                <p class="fw-bold fs-5">
                                    ارسال کامنت
                                </p>

                                <form method="post">
                                    <div class="mb-3">
                                        <label class="form-label">متن کامنت</label>
                                        <textarea name="commentText" class="form-control" rows="3"></textarea>
                                    </div>
                                    <button name="comment" type="submit" class="btn btn-dark">
                                        ارسال
                                    </button>
                                </form>
                                <?php
                                if (strlen($error) > 0) {
                                    ?>
                                    </br>
                                    <p class="alert alert-danger">
                                        <?php echo $error; ?>
                                    </p>
                                
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                        <hr class="mt-4" />
                        <!-- Comment Content -->
                        <?php
                        if (isset($comments)) {
                            ?>
                            <p class="fw-bold fs-6">تعداد کامنت :
                                <?php echo $comments->rowCount(); ?>
                            </p>
                            <?php
                            foreach ($comments as $key => $value) {
                                ?>


                                <div class="card bg-light-subtle mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <img src="./assets/images/profile.png" width="45" height="45" alt="user-profle" />

                                            <h5 class="card-title me-2 mb-0">
                                                <?php echo $value['user_name']; ?>
                                            </h5>
                                        </div>

                                        <p class="card-text pt-3 pr-3">
                                            <?php echo $value['text']; ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Sidebar Section -->
            <?php
            include('includes/layout/sidebar.php');
            ?>
    </section>
</main>

<!-- Footer -->
<?php
include('includes/layout/footer.php');
?>