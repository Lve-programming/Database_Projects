 <?php
 $n_error="";
 $e_error="";
$result_text="";
if (isset($_POST['news'])) {
    if (empty($_POST['name_news'])) {
        $n_error="نام نمیتواند خالی باشد";
    }elseif (empty($_POST['email_news'])) {
        $e_error="ایمیل نمیتواند خالی باشد";
    }else {
        try {   
            $name=$_POST['name_news'];
            $email=$_POST['email_news'];
           $query=$conn->prepare("INSERT INTO news (name,email)values(:name,:email)");
           $result=$query->execute(["name"=>$name,"email"=>$email]);
           if ($result) {
               $result_text="تبریک شما عضو خبرنامه شدید";
           }
        } catch (Exception $e) {
            if ($e->getCode() == "23000") {
                $result_text="این ایمیل قبلا عضو شده است";
            }
                    
           }
       }
    }
?>
 
 
 <div class="col-lg-4">
                            <!-- Sesrch Section -->
                            <div class="card">
                                <div class="card-body">
                                    <p class="fw-bold fs-6">جستجو در فروشگاه</p>
                                    <form action="search.php" action="../search.php" method="GET">
                                        <div class="input-group mb-3">
                                            <input
                                                type="text"
                                                name='keyword'
                                                class="form-control"
                                                placeholder="جستجو ..."
                                            />
                                            <button
                                                class="btn btn-secondary"
                                                type="submit"
                                            >
                                                <i class="bi bi-search"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Categories Section -->
                            
                           
                                    
                           
                            <div class="card mt-4">
                                <div class="fw-bold fs-6 card-header">دسته بندی ها</div> 
                              <?php 
                               if (count($categories)>0) {
                                foreach ($categories as $key => $cat) {
                               ?>
                                <ul class="list-group list-group-flush p-0">
                                    <li class="list-group-item">
                                        <a
                                            class="link-body-emphasis text-decoration-none"
                                            href="index.php?category=<?= $key?>"
                                            ><?= $cat?></a
                                        >
                                    </li>

                                </ul>
                                <?php
                                      }
                                    }
                                ?>
                            </div>

                            <!-- Subscribue Section -->
                            <div class="card mt-4">
                                <div class="card-body">
                                    <p class="fw-bold fs-6">عضویت در خبرنامه</p>

                                    <form name="news" method="post">
                                        <div class="mb-3">
                                            <label class="form-label"
                                                >نام</label
                                            >
                                            <input
                                            name="name_news"
                                                type="text"
                                                class="form-control"
                                            />
                                        </div>
                                        <?php if (strlen($n_error)>0) {
                                                ?>
                                            <p class="alert alert-danger">
                                                <?php  echo $n_error;?>
                                            </p>
                                            <?php }?>
                                        <div class="mb-3">
                                            <label class="form-label"
                                                >ایمیل</label
                                            >
                                            <input
                                            name="email_news"
                                                type="email"
                                                class="form-control"
                                            /> </div>
                                            <?php if (strlen($e_error)>0) {
                                                ?>
                                            <p class="alert alert-danger">
                                                <?php  echo $e_error;?>
                                            </p>
                                            <?php }?>
                                       
                                        <div class="d-grid gap-2">
                                            <button
                                            name="news"
                                                type="submit"
                                                class="btn btn-secondary"
                                            >
                                                ارسال
                                            </button>
                                            <?php if (strlen($result_text)>0) {
                                                ?>
                                            <p class="alert alert-info">
                                                <?php  echo $result_text;?>
                                            </p>
                                            <?php }?>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- About Section -->
                            <div class="card mt-4">
                                <div class="card-body">
                                    <p class="fw-bold fs-6">درباره ما</p>
                                    <p class="text-justify">
                                        لورم ایپسوم متن ساختگی با تولید سادگی
                                        نامفهوم از صنعت چاپ و با استفاده از
                                        طراحان گرافیک است. چاپگرها و متون بلکه
                                        روزنامه و مجله در ستون و سطرآنچنان که
                                        لازم است و برای شرایط فعلی تکنولوژی مورد
                                        نیاز و کاربردهای متنوع با هدف بهبود
                                        ابزارهای کاربردی می باشد.
                                    </p>
                                </div>
                            </div>
                        </div>
