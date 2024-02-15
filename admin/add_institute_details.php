<?php include("admin_header.php") ?>

<?php
if (isset($_POST['add_institute'])) {
    extract($_POST);

    $t = time();
    $current_time = date("Y-m-d H:i:s", $t);

    $insert_sql = "INSERT INTO `institute_details`(`name`,`founding_period`,`aim`,`target,`created_at`) VALUES('$name','$long_desc1','$long_desc2','$long_desc3','$current_time')";
    $run_insert_qry = mysqli_query($conn, $insert_sql);
    if ($run_insert_qry) {
        header("location: view_institute_details.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">ইন্সটিটিউটের বৃত্তান্ত সংযুক্তি</h2>
        <form action="" method="post">
            <div class="mt-3">
                <label for="name">ইন্সটিটিউটের নাম</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="আপনার ইন্সটিটিউটের নাম লিখুন" required>
            </div>
            <div class="mt-3">
                <label for="long_desc1">প্রতিষ্ঠাকাল</label>
                <textarea name="long_desc1" class="long_desc" id="long_desc1" placeholder="আপনার ইন্সটিটিউটের প্রতিষ্ঠাকাল সম্পর্কে বিস্তারিত লিখুন" required></textarea>
            </div>
            <div class="mt-3">
                <label for="long_desc2">লক্ষ্য</label>
                <textarea name="long_desc2" class="long_desc" id="long_desc2" placeholder="আপনার ইন্সটিটিউটের লক্ষ্য সম্পর্কে বিস্তারিত লিখুন" required></textarea>
            </div>
            <div class="mt-3">
                <label for="long_desc3">উদ্দেশ্য</label>
                <textarea name="long_desc3" class="long_desc" id="long_desc3" placeholder="আপনার ইন্সটিটিউটের উদ্দেশ্য সম্পর্কে বিস্তারিত লিখুন" required></textarea>
            </div>

            <div class="mt-3">
                <input type="submit" name="add_institute" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>