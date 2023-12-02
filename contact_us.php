<?php include_once('linker.php') ?>

<body style="font-family: 'Kalpurush', Arial, sans-serif">
    <header>
        <?php include_once('header.php') ?>
    </header>

    <section style="min-height: 90vh;" class="d-flex align-items-center">
        <div class="container mt-5" data-aos="fade-up">
            <h2 class="text-uppercase fw-bold text-center mb-3 secondaryColor" data-aos="fade-up">
                যোগাযোগের ঠিকানা
            </h2>
            <div class="row d-flex justify-content-center text-center g-4" data-aos="fade-up-right" style="min-height: 40vh">
                <?php
                $select_from_new_paper = "SELECT * FROM `contact` ORDER BY id DESC";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                    $row = mysqli_fetch_assoc($run_select_from_new_paper);
                    extract($row);
                ?>
                    <div class="col-md-4">
                        <div class="card rounded shadow p-5" style="height: 100%">

                            <div class="card-body">
                                <i class="fa-solid fa-envelope fs-1"></i>
                                <h5 class="mt-3 card-title primary_color">ইমেইল</h5>
                                <p class="card-text">
                                    <a href="mailto:<?php echo $email; ?>" class="text-decoration-none" target="_blank"><?php echo $email; ?></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card rounded shadow p-5" style="height: 100%">

                            <div class="card-body">
                                <i class="fa-solid fa-location-dot fs-1"></i>
                                <h5 class="mt-3 card-title primary_color">ঠিকানা</h5>
                                <p class="card-text"><?php echo $location; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card rounded shadow p-5" style="height: 100%">

                            <div class="card-body">
                                <i class="fa-solid fa-phone fs-1"></i>
                                <h5 class="mt-3 card-title primary_color">ফোন নাম্বার</h5>
                                <p class="card-text"><?php echo $contact; ?></p>
                            </div>
                        </div>
                    </div>
                <?php
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