<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_memorandum'])) {
    extract($_POST);

    $update_sql = "UPDATE `memorandum` SET `details`='$long_desc1' WHERE id='$memorandum_id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: view_memorandum.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
    }
}
?>

<?php
if (isset($_GET['memorandum_id'])) {
    $id = $_GET['memorandum_id'];
    $select_from_new_paper = "SELECT * FROM memorandum WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">দ্বি-পাক্ষিক সমঝোতা চুক্তি সম্পর্কে তথ্য সংশোধন</h2>
                <form action="" method="post">
                    <input type="hidden" name="memorandum_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="long_desc1">বিস্তারিত</label>
                        <textarea name="long_desc1" class="long_desc" id="long_desc1"><?php echo $details ?></textarea>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_memorandum" value="Update" class="btn btn-primary">
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