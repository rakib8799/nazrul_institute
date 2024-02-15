<?php include_once('linker.php') ?>

<body style="font-family: 'Kalpurush', Arial, sans-serif">
    <header>
        <?php include_once('header.php') ?>
    </header>

    <section style="min-height: 90vh;" class="d-flex align-items-center">
        <div class="container mt-5" data-aos="fade-up">
            <h2 class="text-uppercase fw-bold text-center mb-3 secondaryColor" data-aos="fade-up">
                বর্তমান পরিচালক
            </h2>
            <div class="row g-4">
                <div class="col-md-4 d-flex justify-content-center">
                    <?php
                    $select_from_new_paper = "SELECT * FROM `director` ORDER BY id DESC";
                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                        $row = mysqli_fetch_assoc($run_select_from_new_paper);
                        extract($row);
                    ?>
                        <div class="card mb-3 p-3 shadow">
                            <img src="Images/director/<?php echo $image ?>" alt="vc_img" class="img-fluid rounded-pill m-auto" style="width: 300px" />
                            <div class="card-body text-center">
                                <p class="card-title fs-4 fw-bold"><?php echo $name ?></p>
                                <p class="card-text fs-5"><?php echo $designation ?></p>
                                <p class="card-text">ইন্সটিটিউট অব নজরুল স্টাডিজ,<br><span>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়</span></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-md-8 d-flex justify-content-center">
                    <div class="row" style="width: 100%">
                        <div class="card mb-3 p-3 shadow">
                            <?php
                            $select_from_new_paper = "SELECT * FROM `director_message` ";
                            $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                            if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                                $row = mysqli_fetch_assoc($run_select_from_new_paper);
                                extract($row);
                            ?>
                                <div class="d-flex align-items-center" style="min-height: 55vh;">
                                    <div class="card-body">
                                        <p class="card-title fw-bold fs-5 text-center"><?php echo $title ?></p>
                                        <p class="card-text text-justify"><?php echo $details ?></p>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
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