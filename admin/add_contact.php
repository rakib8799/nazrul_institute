<?php include("admin_header.php") ?>

<?php
if (isset($_POST['add_contact'])) {
    extract($_POST);

    $t = time();
    $current_time = date("Y-m-d H:i:s", $t);

    $insert_sql = "INSERT INTO `contact`(`email`,`location`,`contact`,`created_at`) VALUES('$email','$location','$contact','$current_time')";
    $run_insert_qry = mysqli_query($conn, $insert_sql);
    if ($run_insert_qry) {
        header("location: view_contact.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">ইন্সটিটিউটের সাথে যোগাযোগের তথ্য সংযুক্তি</h2>
        <form action="" method="post">
            <div class="mt-3">
                <label for="email">ইমেইল</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="ইন্সটিটিউটের ইমেইল লিখুন" required>
            </div>
            <div class="mt-3">
                <label for="location">ঠিকানা</label>
                <input type="text" name="location" id="location" class="form-control" placeholder="ইন্সটিটিউটের ঠিকানা লিখুন" required>
            </div>
            <div class="mt-3">
                <label for="contact">মোবাইল/টেলিফোন</label>
                <input type="text" name="contact" id="contact" class="form-control" placeholder="ইন্সটিটিউটের মোবাইল/টেলিফোন নাম্বার লিখুন" required>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_contact" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>