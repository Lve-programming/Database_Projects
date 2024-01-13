<?php
include('includes/layout/header.php');
// if (isset($_GET['keyword'])) {
// $keyword = ;
// $query  ="SELECT * FROM products Where name like $keyword";
$stmt = $conn->prepare("SELECT * FROM products Where name like :keyword OR detail like :keyword");
$keyword = $_GET['keyword'];
$stmt->execute(['keyword'=>"%$keyword%"]);
$row = $stmt->fetchAll();
// }
?>
<main>
    <!-- Content Section -->
    <section class="mt-4">
        <div class="row">
            <!-- Posts Content -->
            <div class="col-lg-8">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-secondary">
                            پست های مرتبط با کلمه -> <?php
                            
                                                        try {
                                                            echo $_GET['keyword'];
                                                        } catch(Exception $e){
                                                            include('./index.php');
                                                        }
                                                        ?> <-
                        <?php
                          if (empty($row)) {
                        ?>
                         </div>
                        <div class="alert alert-danger">
                            مقاله مورد نظر پیدا نشد !!!!
                        </div>
                        
                        <?php
                        }
                        ?>
                        </div>
                        
                        <?php
                        if(!empty($row)){
                            foreach ($row as $key => $pro) {
                        ?>
                    </div>
                    
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="card">
                            <img src="./assets/images/products/<?php echo $pro['img']; ?>" class="card-img-top" alt="post-image" />
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title fw-bold">
                                        <?php echo $pro['name']?>
                                    </h5>
                                    <div>
                                        <span class="badge text-bg-secondary"><?php echo  $categories[$pro['category']]; ?></span>
                                    </div>
                                </div>
                                <p class="card-text text-secondary pt-3">
                                <?php echo $pro['detail']?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="single.php?id=<?php echo $pro['id'] ;?>" class="btn btn-sm btn-dark">مشاهده</a>

                                    <p class="fs-7 mb-0">
                                        قیمت : <?php echo $pro['price']; ?>

                                    </p>
                                </div>
                                </div>
                        
                            </div>
                        
                    </div>
                </div>
               
            </div>
                    <?php
                    }
                }
                ?>
            <!-- Sidebar Section -->
            <?php
            include('includes/layout/sidebar.php');
            ?>
    </section>
</main>

<!-- Footer Section -->
<?php
include('includes/layout/footer.php');
?>