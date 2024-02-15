<?php include_once('linker.php') ?>
<?php include("admin/numberToWord/BanglaNumberToWord.php") ?>
<?php
$obj = new BanglaNumberToWord();
?>

<body style="font-family: 'Kalpurush', Arial, sans-serif">
    <header>
        <?php include_once('header.php') ?>
    </header>

    <section style="min-height: 90vh;" class="d-flex align-items-center">
        <?php
        if (isset($_GET['notices_id'])) {
            $id = $_GET['notices_id'];

            $select_from_new_paper = "SELECT * FROM notices WHERE id='$id'";
            $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
            if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                $row = mysqli_fetch_assoc($run_select_from_new_paper);
                extract($row);
        ?>

                <div class="container mt-5" data-aos="fade-up">
                    <h2 class="text-uppercase fw-bold text-center mb-3 secondaryColor" data-aos="fade-up">
                        নোটিশের বিস্তারিত
                    </h2>
                    <div class="row d-flex justify-content-center g-4 mt-3" data-aos="fade-up">

                        <!-- <div class="card mb-3 p-3 shadow">
                                    <div class="card-body">
                                        <p class="card-title fw-bold fs-5 text-center"><?php echo $title ?></p>
                                        <p class="card-text text-justify"><?php echo $details ?></p>
                                    </div>
                                </div> -->

                        <div class="col-md-4 d-flex align-items-center">
                            <img src="Images/notices/<?php echo $image ?>" alt="vc_img" class="img-fluid" style="min-height: 50vh; object-fit: cover;">
                        </div>

                        <div class="col-md-8 d-flex align-items-center">
                            <div class="card rounded shadow-lg p-3 mb-5" style="min-height: 20vh;">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold fs-4"><?php echo $title; ?></h5>
                                    <p class="fs-6 text-muted">প্রকাশের সময়কালঃ <?php echo $obj->engToBn($created_at) ?></p>
                                    <p class="card-text"><?php echo $details; ?></p>
                                    <a href="<?php if (isset($pdf_file) && $pdf_file !== "") { ?>./Files/notices/pdf_file/<?php echo $pdf_file;
                                                                                                                        } else {
                                                                                                                            ?>
notices.php                                                                                                                <?php
                                                                                                                        } ?>" class="btn btn-primary" <?php if ($pdf_file === "") {
                                                                                                                                                        ?> onclick="return confirm_download()" <?php                                                              } ?>>ডাউনলোড</a>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                    ?>
                    </div>
                </div>
            <?php
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য পাওয়া যায়নি</p>";
        }
            ?>
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
    <!-- Activate AOS notices -->
    <script>
        AOS.init();
    </script>
</body>

</html>