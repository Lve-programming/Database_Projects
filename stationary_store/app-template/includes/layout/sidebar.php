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

                                    <form>
                                        <div class="mb-3">
                                            <label class="form-label"
                                                >نام</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                            />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label"
                                                >ایمیل</label
                                            >
                                            <input
                                                type="email"
                                                class="form-control"
                                            />
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button
                                                type="submit"
                                                class="btn btn-secondary"
                                            >
                                                ارسال
                                            </button>
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
