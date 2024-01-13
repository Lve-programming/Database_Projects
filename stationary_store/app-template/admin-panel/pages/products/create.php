<?php
include('../../includes/layout/header.php');
$categories = $conn->query('SELECT * FROM category');
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $attributes = $_POST['attributes'];

    $errors = [];
    if (empty(trim($name))) {
        array_push($errors, 'نام محصول نمیتواند خالی باشد');
    }
    if (empty(trim($price))) {
        array_push($errors, 'قیمت محصول نمیتواند خالی باشد');
    }
    if (empty(trim($detail))) {
        array_push($errors, 'توضیحات محصول نمیتواند خالی باشد');
    }
    if (empty(trim($category))) {
        array_push($errors, 'دسته بندی محصول نمیتواند خالی باشد');
    }
    if (empty($_FILES['img'])) {
        array_push($errors, 'تصویر محصول نمیتواند خالی باشد');
    }

    if (empty($errors)) {
        $imgName = time() . "-" . $_FILES['img']['name'];
        $tmpName = $_FILES['img']['tmp_name'];
        if (move_uploaded_file($tmpName, "../../../assets/images/products/$imgName")) {
            $query = $conn->prepare("INSERT INTO products (name, detail, category, price, img)VALUES(:name,:detail,:category,:price,:img)");
            $query->execute(['name' => $name, 'detail' => $detail, 'category' => $category, 'price' => $price, 'img' => $imgName]);

        } else {
            echo "error";
        }
    }
}
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
                <h1 class="fs-3 fw-bold">ایجاد محصول</h1>
            </div>
            <?php
            if (isset($errors)) {
                foreach ($errors as $key => $value) {
                    ?>

                    <p class="btn btn-danger">
                        <?php
                        echo $value;
                        ?>
                    </p>
                    </br>
                    <?php
                }
            }
            ?>

            <!-- Posts -->
            <div class="mt-4">
                <form method="post" enctype="multipart/form-data" class="row g-4">
                    <div class="col-12 col-sm-6 col-md-4">
                        <label class="form-label">عنوان محصول</label>
                        <input name="name" type="text" class="form-control" />
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <label class="form-label">قیمت</label>
                        <input name="price" type="text" class="form-control" />
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <label class="form-label">دسته بندی محصول</label>
                        <select name="category" class="form-select">
                            <?php
                            if (isset($categories)) {
                                foreach ($categories as $key => $value) {
                                    ?>
                                    <option name="category" value="<?php echo $value['id']; ?>"> <?php echo $value['name']; ?>
                                    </option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4">
                        <label for="formFile" class="form-label">تصویر محصول</label>
                        <input name="img" class="form-control" type="file" />
                    </div>

                    <div class="col-12">
                        <label for="formFile" class="form-label">توضیحات محصول </label>
                        <textarea name="detail" class="form-control" rows="6"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="formFile" class="form-label">(بصورت json) ویژگی های محصول </label>
                        <textarea name="attributes" class="form-control" rows="6"></textarea>
                    </div>


                    <div class="col-12">
                        <button name="add" type="submit" class="btn btn-dark">
                            ایجاد
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</body>

</html>