<?php include_once('linker.php') ?>

<body style="font-family: 'Kalpurush', Arial, sans-serif">
    <header>
        <?php include_once('header.php') ?>
    </header>

    <section style="min-height: 90vh;" class="d-flex align-items-center">
        <div class="container mt-5" data-aos="fade-up">
            <h2 class="text-uppercase fw-bold text-center mb-3 secondaryColor" data-aos="fade-up">
                আমাদের প্রশিক্ষণ কার্যক্রমসমূহ
            </h2>
            <div class="row d-flex justify-content-center g-4" data-aos="fade-up-right">
                <?php
                $select_from_new_paper = "SELECT * FROM `training` ORDER BY id DESC";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                    while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                        extract($row);
                ?>
                        <!-- <div class="card mb-3 p-3 shadow">
                                    <div class="card-body">
                                        <p class="card-title fw-bold fs-5 text-center"><?php echo $title ?></p>
                                        <p class="card-text text-justify"><?php echo $details ?></p>
                                    </div>
                                </div> -->



                        <div class="col-md-4" style="min-height: 50vh;">

                            <div class="card rounded shadow" style="min-height: 50vh;">
                                <img src="Images/training/<?php echo $image ?>" alt="vc_img" class="card-img-top" style="height: 30vh;">

                                <div class="card-body" style="min-height: 20vh;">
                                    <h5 class="card-title fw-bold fs-5 text-center"><?php echo $title; ?></h5>
                                    <p class="card-text text-justify"><?php if (strlen($details) < 120) {
                                                                            echo $details;
                                                                        } else {
                                                                            echo (mb_substr($details, 0, 119) . "...");
                                                                        } ?>
                                    </p>
                                    <a href="training_details.php?training_id=<?php echo $id ?>" class="text-decoration-none">বিস্তারিত পড়ুন</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
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