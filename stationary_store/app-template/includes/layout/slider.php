<?php
   include("includes/DataBase.php");
    $query = "SELECT * FROM slides";
    $slides = $conn->query($query);
?>
                <section>
                    <div id="carousel" class="carousel slide">
                        <div class="carousel-indicators">
                            <button
                                type="button"
                                data-bs-target="#carousel"
                                data-bs-slide-to="0"
                                class="active"
                            ></button>
                            <button
                                type="button"
                                data-bs-target="#carousel"
                                data-bs-slide-to="1"
                            ></button>
                            <button
                                type="button"
                                data-bs-target="#carousel"
                                data-bs-slide-to="2"
                            ></button>
                        </div>
                       

                        <div class="carousel-inner rounded">
                             <?php
                        if ($slides->rowCount()>0) {
                            foreach ($slides as $slide) {
                                echo $slide['status'];
                        ?>
                            <div
                                class="carousel-item overlay carousel-height <?= ($slide['status']) ? 'active' : ''?>"
                            >
                                <img
                                    src="./assets/images/slides/<?php echo $slide['img']; ?>"
                                    class="d-block w-100"
                                    alt="post-image"
                                />
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><?php echo $slide['title'] ?></h5>
                                    <p>
                                    <?php echo $slide['body'] ?>
                                    </p>
                                </div>
                            </div>
                           
                        <button
                            class="carousel-control-prev"
                            type="button"
                            data-bs-target="#carousel"
                            data-bs-slide="prev"
                        >
                            <span class="carousel-control-prev-icon"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button
                            class="carousel-control-next"
                            type="button"
                            data-bs-target="#carousel"
                            data-bs-slide="next"
                        >
                            <span class="carousel-control-next-icon"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <?php 
                            }   
                        }?>
                    </div>
                    
                </section>
