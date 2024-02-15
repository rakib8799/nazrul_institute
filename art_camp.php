<?php include_once('linker.php') ?>

<body style="font-family: 'Kalpurush', Arial, sans-serif">
    <header>
        <?php include_once('header.php') ?>
    </header>

    <section style="min-height: 90vh;" class="d-flex align-items-center">
        <div class="container mt-5" data-aos="fade-up">
            <h2 class="text-uppercase fw-bold text-center mb-3 secondaryColor" data-aos="fade-up">
                আমাদের আর্ট ক্যাম্পের কার্যক্রমসমূহ
            </h2>
            <div class="row g-4">
                <?php
                $select_from_new_paper = "SELECT * FROM `art_camp` ORDER BY id DESC";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                    $imgIndex = 0;
                    while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                        extract($row);
                        $images = explode(",", $image);
                ?>
                        <!-- <div class="card mb-3 p-3 shadow">
                                    <div class="card-body">
                                        <p class="card-title fw-bold fs-5 text-center"><?php echo $title ?></p>
                                        <p class="card-text text-justify"><?php echo $details ?></p>
                                    </div>
                                </div> -->


                        <div class="col" style="min-height: 50vh;">

                            <div class="card rounded shadow" style="min-height: 30vh;">
                                <div class="row">
                                    <?php
                                    if (count($images) > 1) {
                                        while ($imgIndex < count($images)) {
                                    ?>
                                            <div class="col-md-4">
                                                <img src="Images/art_camp/<?php echo $images[$imgIndex] ?>" alt="vc_img" class="card-img-top" style="height: 30vh;">
                                                <!-- <img src="../Images/art_camp/<?php echo $images[$imgIndex] ?>" width='50px' height='50px'> -->
                                            </div>
                                        <?php
                                            $imgIndex++;
                                        }
                                    } else {
                                        ?>
                                        <img src="Images/art_camp/<?php echo $image ?>" alt="vc_img" class="card-img-top" style="height: 30vh;">
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="card-body" style="min-height: 20vh;">
                                    <h5 class="card-title fw-bold fs-5"><?php echo $title; ?></h5>
                                    <p class="card-text"><?php echo $details; ?></p>
                                    <!-- <a href="./Files/art_camp/pdf_file/<?php echo $pdf_file ?>" target="_blank" class="btn btn-primary">ডাউনলোড</a> -->
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