<?php include("admin_header.php") ?>

<?php
if (isset($_POST['add_about'])) {
    extract($_POST);

    $insert_sql = "INSERT INTO `about`(`title_en`,`details_en`,`title_bd`,`details_bd`) VALUES('$title_en','$long_desc1','$title_bd','$long_desc2')";
    $run_insert_qry = mysqli_query($conn, $insert_sql);
    if ($run_insert_qry) {
        header("location: view_about.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">ইন্সটিটিউটের সম্পর্কে তথ্য সংযুক্তি</h2>
        <form action="" method="post">
            <div class="mt-3">
                <label for="title_en">শিরোনাম (ইংরেজিতে)</label>
                <input type="text" name="title_en" id="title_en" class="form-control" placeholder="ইংরেজিতে ইন্সটিটিউট সম্পর্কে শিরোনাম লিখুন" required>
            </div>
            <div class="mt-3">
                <label for="long_desc1">বিস্তারিত (ইংরেজিতে)</label>
                <textarea name="long_desc1" class="long_desc" id="long_desc1" placeholder="ইংরেজিতে ইন্সটিটিউট সম্পর্কে বিস্তারিত লিখুন" required></textarea>
            </div>
            <div class="mt-3">
                <label for="title_bd">শিরোনাম (বাংলায়)</label>
                <input type="text" name="title_bd" id="title_bd" class="form-control" placeholder="বাংলায় ইন্সটিটিউট সম্পর্কে শিরোনাম লিখুন" required>
            </div>
            <div class="mt-3">
                <label for="long_desc2">বিস্তারিত (বাংলায়)</label>
                <textarea name="long_desc2" class="long_desc" id="long_desc2" placeholder="বাংলায় ইন্সটিটিউট সম্পর্কে বিস্তারিত লিখুন" required></textarea>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_about" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>