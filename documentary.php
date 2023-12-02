<?php include_once('linker.php') ?>

<body style="font-family: 'Kalpurush', Arial, sans-serif">
    <header>
        <?php include_once('header.php') ?>
    </header>

    <section style="height: 90vh;" class="d-flex align-items-center">
        <div class="container mt-5" data-aos="fade-up">
            <h2 class="text-uppercase fw-bold text-center mb-3 secondaryColor" data-aos="fade-up">
                আমাদের প্রামাণ্যচিত্র
            </h2>
            <div class="row d-flex justify-content-center text-center g-4" data-aos="fade-up-right">
                <?php
                $select_from_new_paper = "SELECT * FROM `documentary` ORDER BY id DESC";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                    while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                        extract($row);
                ?>
                        <div class="col-md-3">

                            <div class="card rounded shadow" style="min-height: 30vh;">
                                <img src="Images/documentary/<?php echo $image ?>" alt="vc_img" class="card-img-top" style="height: 30vh;">

                                <div class="card-body">

                                    <h5 class="card-title primary_color" style="height: 6vh;"><?php echo $title; ?></h5>
                                    <p class="card-text" style="height: 3vh;"><?php echo $screenplay_name; ?></p>
                                    <!-- <a href="./Files/documentary/pdf_file/<?php echo $pdf_file ?>" target="_blank" class="btn btn-primary">ডাউনলোড</a> -->
                                    <!-- <a href="<?php if (isset($pdf_file)) { ?>./Files/documentary/pdf_file/<?php echo $pdf_file;
                                                                                                            } else {
                                                                                                                ?>
published_book.php                                                                                                                <?php
                                                                                                                                } ?>" target="_blank" class="btn btn-primary" <?php if ($pdf_file === "") {
                                                                                                                                                                                ?> onclick="return confirm_download()" <?php                                                              } ?>>ডাউনলোড</a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?> -->

                                </div>
                            </div>
    </section>

    <script>
        function confirm_download() {
            // alert(" ফাইল এখনো আপলোড করা হয়নি");
            // window.location.reload();
            if (confirm("ফাইল এখনো আপলোড করা হয়নি")) window.location.reload();
            else window.location.reload();
        }
    </script>


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