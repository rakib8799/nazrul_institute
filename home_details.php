<div class="container mt-5" data-aos="fade-up">
    <div class="row g-4">
        <div class="col-md-4 d-flex justify-content-center align-items-center" style="font-family: 'Kalpurush', Arial, sans-serif">
            <?php
            $select_from_new_paper = "SELECT * FROM `director` ORDER BY id DESC";
            $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
            if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                $row = mysqli_fetch_assoc($run_select_from_new_paper);
                // echo "<pre>";
                // print_r($row);
                extract($row);
            ?>
                <div class="card mb-3 p-3 shadow">
                    <!-- <div class="row g-0"> -->
                    <img src="Images/director/<?php echo $image ?>" alt="vc_img" class="img-fluid rounded-pill m-auto" style="width: 300px" />
                    <!-- <div class="col-md-8 d-flex justify-content-center align-items-center"> -->
                    <div class="card-body text-center">
                        <p class="card-title fs-4 fw-bold"><?php echo $name ?></p>
                        <p class="card-text fs-5"><?php echo $designation ?></p>
                        <p class="card-text">ইন্সটিটিউট অব নজরুল স্টাডিজ,<br><span>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়</span></p>
                        <a href="about_director.php" class="text-decoration-none">আরো দেখুন</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="col-md-8 d-flex justify-content-center align-items-center">
            <div class="row" style="width: 100%">
                <div class="card mb-3 p-3 shadow" style="min-height: 30vh">
                    <?php
                    $select_from_new_paper = "SELECT * FROM `about` ";
                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                        $row = mysqli_fetch_assoc($run_select_from_new_paper);
                        extract($row);
                    ?>
                        <div class="card-body">
                            <p class="card-title fw-bold fs-5 text-center"><?php echo $title_en ?></p>
                            <p class="card-text text-justify"><?php echo $details_en ?></p>
                            <a class="text-decoration-none" href="institute_details.php">See more</a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="card mb-3 p-3 shadow" style="min-height: 30vh; font-family: 'Kalpurush', Arial, sans-serif">
                    <?php
                    $select_from_new_paper = "SELECT * FROM `director_message` ";
                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                        $row = mysqli_fetch_assoc($run_select_from_new_paper);
                        extract($row);
                    ?>
                        <div class="card-body">
                            <p class="card-title fw-bold fs-5 text-center"><?php echo $title ?></p>
                            <p class="card-text text-justify"><?php echo $details ?></p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>

</div>