<?php
include("includes/layout/header.php");
include("includes/DataBase.php");
$url = "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$parts = parse_url($url);
parse_str($parts['query'], $query);
$query = "SELECT * FROM products Where id =" . $query['id'];
$product = $conn->query($query);
// print_r($categories);
$attributes = array();


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

                            <form>
                                <div class="mb-3">
                                    <label class="form-label">نام</label>
                                    <input type="text" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">متن کامنت</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-dark">
                                    ارسال
                                </button>
                            </form>
                        </div>
                    </div>

                    <hr class="mt-4" />
                    <!-- Comment Content -->
                    <p class="fw-bold fs-6">تعداد کامنت : 3</p>

                    <div class="card bg-light-subtle mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="./assets/images/profile.png" width="45" height="45" alt="user-profle" />

                                <h5 class="card-title me-2 mb-0">
                                    محمد صالحی
                                </h5>
                            </div>

                            <p class="card-text pt-3 pr-3">
                                لورم ایپسوم متن ساختگی با تولید
                                سادگی نامفهوم از صنعت چاپ و با
                                استفاده از طراحان گرافیک است.
                            </p>
                        </div>
                    </div>

                    <div class="card bg-light-subtle mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="./assets/images/profile.png" width="45" height="45" alt="user-profle" />

                                <h5 class="card-title me-2 mb-0">
                                    متین سیدی
                                </h5>
                            </div>

                            <p class="card-text pt-3 pr-3">
                                لورم ایپسوم متن ساختگی با تولید
                                سادگی نامفهوم از صنعت چاپ
                            </p>
                        </div>
                    </div>

                    <div class="card bg-light-subtle mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="./assets/images/profile.png" width="45" height="45" alt="user-profle" />

                                <h5 class="card-title me-2 mb-0">
                                    زهرا عزیزی
                                </h5>
                            </div>

                            <p class="card-text pt-3 pr-3">
                                لورم ایپسوم متن ساختگی با تولید
                                سادگی
                            </p>
                        </div>
                    </div>
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