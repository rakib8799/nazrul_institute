<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_designation'])) {
    extract($_POST);

    $update_sql = "UPDATE `designations` SET `designation`='$designation' WHERE id='$designation_id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: view_designations.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
    }
}
?>

<?php
if (isset($_GET['year_id'])) {
    $id = $_GET['year_id'];

    $select_from_new_paper = "SELECT * FROM designations WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">গুরুত্বপূর্ণ পদবিগুলোর তথ্য সংশোধন</h2>
                <form action="" method="post">
                    <div class="mt-3">
                        <input type="hidden" name="year_id" value="<?php echo $id; ?>" />
                        <label for="designation">পদবি</label>
                        <input type="text" name="designation" id="designation" class="form-control" placeholder="পদবি লিখুন" value="<?php echo $designation ?>" required>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_designation" value="Update" class="btn btn-primary">
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