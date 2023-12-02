<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_faculty'])) {
    extract($_POST);

    $update_sql = "UPDATE `faculties` SET `faculty`='$faculty' WHERE id='$faculty_id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: view_faculties.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
    }
}
?>

<?php
if (isset($_GET['faculty_id'])) {
    $id = $_GET['faculty_id'];

    $select_from_new_paper = "SELECT * FROM faculties WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">বিশ্ববিদ্যালয়ের অনুষদগুলোর তথ্য সংশোধন</h2>
                <form action="" method="post">
                    <input type="hidden" name="faculty_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="faculty">নাম</label>
                        <input type="text" name="faculty" id="faculty" class="form-control" placeholder="অনুষদের নাম লিখুন" value="<?php echo $faculty; ?>">
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_faculty" value="Update" class="btn btn-primary">
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