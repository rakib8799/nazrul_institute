<?php include_once('linker.php') ?>

<body style="font-family: 'Kalpurush', Arial, sans-serif">
    <header>
        <?php include_once('header.php') ?>
    </header>

    <section style="min-height: 90vh;" class="d-flex align-items-center">
        <div class="container mt-5" data-aos="fade-up">
            <h2 class="text-uppercase fw-bold text-center mb-3 secondaryColor" data-aos="fade-up">
                একনজরে ইন্সটিটিউট অব নজরুল স্টাডিজ
            </h2>
            <div class="row g-4">
                <div class="col-md-5 d-flex justify-content-center">
                    <?php
                    $select_from_new_paper = "SELECT * FROM `about` ORDER BY id DESC";
                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                        $row = mysqli_fetch_assoc($run_select_from_new_paper);
                        extract($row);
                    ?>
                        <div class="d-flex align-items-center" style="min-height: 40vh;">
                            <div class="card mb-3 p-3 shadow">
                                <div class="card-body">
                                    <p class="card-title fw-bold fs-5 text-center"><?php echo $title_bd ?></p>
                                    <p class="card-text"><?php echo $details_bd ?></p>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-md-7 d-flex justify-content-center align-items-center">
                    <div class="row">
                        <?php
                        $select_from_new_paper = "SELECT * FROM `institute_details`";
                        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                            $row = mysqli_fetch_assoc($run_select_from_new_paper);
                            extract($row);
                        ?>
                            <div class="card mb-3 p-3 shadow">
                                <div class="card-body">
                                    <p class="card-text fw-bold">ইন্সটিটিউটের নাম:
                                    <p><?php echo $name ?></p>
                                    </p>
                                    <p class="card-text mt-4 fw-bold">প্রতিষ্ঠাকাল:
                                    <p><?php echo $founding_period ?></p>
                                    </p>
                                    <p class="card-text mt-4 fw-bold">লক্ষ্য:
                                    <p style="text-align: justify;"><?php echo $aim ?></p>
                                    </p>
                                    <p class="card-text mt-4 fw-bold">উদ্দেশ্য:
                                    <p style="text-align: justify;"><?php echo $target ?></p>
                                    </p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <footer data-aos="fade-up">
        <?php include_once('footer.php') ?>
    </footer>
    <!-- Here we hook our AOS JS file  -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Activate AOS Library -->
    <script>
        AOS.init();
    </script>
</body>

</html>