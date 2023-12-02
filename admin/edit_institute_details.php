<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_institute_details'])) {
    extract($_POST);

    $update_sql = "UPDATE `institute_details` SET `name`='$name',`founding_period`='$long_desc1',`aim`='$long_desc2',`target`='$long_desc3' WHERE id='$institute_details_id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: view_institute_details.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
    }
}
?>

<?php
if (isset($_GET['institute_details_id'])) {
    $id = $_GET['institute_details_id'];

    $select_from_new_paper = "SELECT * FROM institute_details WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">ইন্সটিটিউটের বৃত্তান্ত সংশোধন</h2>
                <form action="" method="post">
                    <input type="hidden" name="institute_details_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="name">ইন্সটিটিউটের নাম</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="আপনার ইন্সটিটিউটের নাম লিখুন" value="<?php echo $name; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="long_desc1">প্রতিষ্ঠাকাল</label>
                        <textarea name="long_desc1" class="long_desc" id="long_desc1" placeholder="আপনার ইন্সটিটিউটের প্রতিষ্ঠাকাল সম্পর্কে বিস্তারিত লিখুন"><?php echo $founding_period ?></textarea>
                    </div>
                    <div class="mt-3">
                        <label for="long_desc2">লক্ষ্য</label>
                        <textarea name="long_desc2" class="long_desc" id="long_desc2" placeholder="আপনার ইন্সটিটিউটের লক্ষ্য সম্পর্কে বিস্তারিত লিখুন"><?php echo $aim ?></textarea>
                    </div>
                    <div class="mt-3">
                        <label for="long_desc3">উদ্দেশ্য</label>
                        <textarea name="long_desc3" class="long_desc" id="long_desc3" placeholder="আপনার ইন্সটিটিউটের উদ্দেশ্য সম্পর্কে বিস্তারিত লিখুন"><?php echo $target ?></textarea>
                    </div>

                    <div class="mt-3">
                        <input type="submit" name="edit_institute_details" value="Update" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
<?php
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য পাওয়া যায়নি</p>";
    }
}
?>
<?php include_once("admin_footer.php") ?>