<!-- Header and Slidebar-->
<?php
include("includes/layout/header.php");
include("includes/layout/slider.php");

include("includes/DataBase.php");
if (isset($_GET['category'])) {
    $cat_id = $_GET['category'];
    $products = $conn->prepare("SELECT * FROM products WHERE category = $cat_id  ORDER BY id DESC");
    $products->execute();
}else{
$query = "SELECT * FROM products ORDER BY id DESC LIMIT 4";
$products = $conn->query($query);
}
?>

    <main>

    <!-- Content Section -->
    <section class="mt-4">
      
        <div class="row">
            <!-- Posts Content -->
            <div class="col-lg-8">
                
                <div class="row g-3">

                    <?php
                        if($products->rowCount()>0){
                            foreach($products as $product){
                    ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <img
                                src="./assets/images/products/<?php echo $product['img']?>"
                                class="card-img-top"
                                alt="post-image"
                            />
                            <div class="card-body">
                                <div
                                    class="d-flex justify-content-between"
                                >
                                    <h5 class="card-title fw-bold">
                                        <?php echo $product['name'];?>
                                    </h5>
                                    <div>
                                        <span
                                            class="badge text-bg-secondary"
                                            >
                                            <?php 
                                            $catId = $product['category'];
                                            echo $categories[$catId];
                                            ?>
                                            </span
                                        >
                                    </div>
                                </div>
                                <p
                                    class="card-text text-secondary pt-3"
                                >
                                <?php echo substr($product['detail'],0,250)."...";?>

                                </p>
                                <div
                                    class="d-flex justify-content-between align-items-center"
                                >
                                    <a
                                        href="single.php?id=<?php echo $product['id'];?>"
                                        class="btn btn-sm btn-dark"
                                        >مشاهده</a
                                    >

                                    <p class="fs-7 mb-0">
                                    <?php echo"قیمت: ".$product['price'];?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                                  }
                            }
                    ?>
                 
                                </div>
                            </div>
                            <?php   
       include('includes/layout/sidebar.php');
       ?>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
                       
<!-- Sidebar Section -->
   
            
        </section>
    </main> 
<!-- Footer Section -->
<?php
    include("includes/layout/footer.php");     
?>