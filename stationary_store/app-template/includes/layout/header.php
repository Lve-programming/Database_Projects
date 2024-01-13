<?php
include(__DIR__ . "/../DataBase.php");
$query = "SELECT * FROM category";
$category = $conn->query($query);
$categories = array();
foreach ($category as $cat) {
    $id = $cat['id'];
    $categories[$id] = $cat['name'];
}
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$logout = __DIR__ . "/../logout.php";
$user = array();
if (isset($_SESSION['user'])) {
    foreach ($_SESSION['user'] as $key => $value) {
        $user[$key] = $value;
    }
}

?>




<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>نوشت افزار مهاجر</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />

    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>
    <div class="container py-3">
        <header class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="index.php" class="fs-4 fw-medium link-body-emphasis text-decoration-none">
                نوشت افزار مهاجر
            </a>

            <nav class="d-inline-flex mt-2 mt-md-0 me-md-auto">

                <?php foreach ($categories as $key => $cat) { ?>
                    <a class=" me-3 py-2 link-body-emphasis text-decoration-none<?= (isset($_GET['category'])) && $key == $_GET['category'] ? ' fw-bold' : '' ?>"
                        href="index.php?category=<?= $key ?>"><?php
                          echo $cat;

                          ?></a>

                <?php } ?>
            </nav>
            <?php
            if (isset($_SESSION['user'])) {
                ?>
                <!-- <a name="logout"
                    id="logout"
                    style="margin : 10px"
                        href="includes/logout.php"
                        class="btn btn-sm btn-dark "
                        >خروج</a> -->
                <a style="margin: 5px;" href="includes/logout.php"
                    class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"> خروج از
                    حساب
                    <?= $user['user_name'] ?>
                </a>

                <?php
            } else {
                ?>
                <a name="login" id="login" style="margin : 10px" href="./login-form.php"
                    class="btn btn-sm btn-dark ">ورود</a>
                <?php
            }
            ?>
            <?php
            if (isset($_SESSION['user'])) {
                ?>
                <a href="cart.php">
                    <i class="btn btn-success bi bi-cart"></i>
                </a>
                <?php
            }
            ?>
        </header>