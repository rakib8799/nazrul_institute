<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_about'])) {
    extract($_POST);

    $update_sql = "UPDATE `about` SET `title_en`='$title_en',`details_en`='$long_desc1',`title_bd`='$title_bd',`details_bd`='$long_desc2' WHERE id='$about_id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: view_about.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
    }
}
?>

<?php
if (isset($_GET['about_id'])) {
    $id = $_GET['about_id'];

    $select_from_new_paper = "SELECT * FROM about WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">ইন্সটিটিউটের সম্পর্কে তথ্য সংশোধন</h2>
                <form action="" method="post">
                    <input type="hidden" name="about_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="title_en">শিরোনাম (ইংরেজিতে)</label>
                        <input type="text" name="title_en" id="title_en" class="form-control" placeholder="ইংরেজিতে ইন্সটিটিউট সম্পর্কে শিরোনাম লিখুন" value="<?php echo $title_en; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="long_desc1">বিস্তারিত (ইংরেজিতে)</label>
                        <textarea name="long_desc1" class="long_desc" id="long_desc1" placeholder="ইংরেজিতে ইন্সটিটিউট সম্পর্কে বিস্তারিত লিখুন"><?php echo $details_en ?></textarea>
                    </div>
                    <div class="mt-3">
                        <label for="title_bd">শিরোনাম (বাংলায়)</label>
                        <input type="text" name="title_bd" id="title_bd" class="form-control" value="<?php echo $title_bd; ?>" placeholder="বাংলায় ইন্সটিটিউট সম্পর্কে শিরোনাম লিখুন">
                    </div>
                    <div class="mt-3">
                        <label for="long_desc2">বিস্তারিত (বাংলায়)</label>
                        <textarea name="long_desc2" class="long_desc" id="long_desc2" placeholder="বাংলায় ইন্সটিটিউট সম্পর্কে বিস্তারিত লিখুন"><?php echo $details_bd ?></textarea>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_about" value="Update" class="btn btn-primary">
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