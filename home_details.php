<?php include("admin/numberToWord/BanglaNumberToWord.php") ?>
<?php
$obj = new BanglaNumberToWord();
?>

<div class="container mt-5">
    <div class="row g-4 d-flex justify-content-center align-items-center" data-aos="fade-up">
        <div class="col-md-3" style="font-family: 'Kalpurush', Arial, sans-serif" style="min-height: 70vh">
            <?php
            $select_from_new_paper = "SELECT * FROM `director` ORDER BY id DESC";
            $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
            if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                $row = mysqli_fetch_assoc($run_select_from_new_paper);
                // echo "<pre>";
                // print_r($row);
                extract($row);
            ?>
                <div class="card mb-3 p-3 shadow" style="min-height: 70vh">
                    <!-- <div class="row g-0"> -->
                    <img src="Images/director/<?php echo $image ?>" alt="vc_img" class="img-fluid rounded-pill m-auto" style="width: 300px" />
                    <!-- <div class="col-md-8 d-flex justify-content-center align-items-center"> -->
                    <div class="card-body text-center">
                        <p class="card-title fs-5 fw-bold"><?php echo $name ?></p>
                        <p class="card-text fs-6"><?php echo $designation ?></p>
                        <p class="card-text">ইন্সটিটিউট অব নজরুল স্টাডিজ,<br><span>জাতীয় কবি কাজী নজরুল ইসলাম বিশ্ববিদ্যালয়</span></p>
                        <a href="about_director.php" class="text-decoration-none">আরো দেখুন</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="col-md-6" style="min-height: 70vh">
            <div class="card mb-3 p-3 shadow" style="height: 70vh">
                <?php
                $select_from_new_paper = "SELECT * FROM `about` ";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                    $row = mysqli_fetch_assoc($run_select_from_new_paper);
                    extract($row);
                ?>
                    <div class="d-flex align-items-center" style="height: 70vh;">
                        <div class="card-body">
                            <p class="card-title fw-bold fs-5 text-center"><?php echo $title_en ?></p>
                            <p class="card-text text-justify"><?php echo $details_en ?></p>
                            <a class="text-decoration-none" href="institute_details.php">See more</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="col-md-3 card mb-3 p-3 shadow" style="min-height: 35vh; font-family: 'Kalpurush', Arial, sans-serif">
            <h2 class="secondaryColor fs-4 fw-bold text-center mb-3 mt-3">বর্তমান নোটিশগুলো</h2>
            <marquee behavior="scroll" direction="up" scrollamount="4" style="min-height: 35vh">
                <?php
                $select_from_new_paper = "SELECT * FROM `notices` ORDER BY id DESC ";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                    while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                        extract($row);
                ?>
                        <div class="card-body text-center">
                            <a href="notice_details.php?notices_id=<?php echo $id ?>" class="text-decoration-none"><?php echo $title ?></a>
                        </div>
                <?php
                    }
                }
                ?>
            </marquee>
        </div>
    </div>

    <div class="row mt-5 g-4 d-flex justify-content-center align-items-center" data-aos="fade-right" style="font-family: 'Kalpurush', Arial, sans-serif">
        <h2 class="secondaryColor fs-3 fw-bold text-center mb-3 mt-3" data-aos="fade-up">সমসাময়িক সংবাদ</h2>
        <?php
        $select_from_new_paper = "SELECT * FROM `news` ORDER BY id DESC";
        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                extract($row);
        ?>
                <div class="col-md-4">

                    <div class="card rounded shadow" style="min-height: 20vh;">
                        <img src="Images/news/<?php echo $image ?>" alt="vc_img" class="card-img-top" style="height: 30vh;">

                        <div class="card-body" style="min-height: 28vh;">
                            <h5 class="card-title fw-bold fs-5 text-center"><?php echo $title; ?></h5>
                            <p class="card-text"><?php if (strlen($details) < 200) {
                                                        echo $details;
                                                    } else {
                                                        echo (mb_substr($details, 0, 199) . "...");
                                                    } ?></p>
                            <a href="news_details.php?news_id=<?php echo $id; ?>" class="text-decoration-none">বিস্তারিত পড়ুন</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>

</div>