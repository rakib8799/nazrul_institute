<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_seminar'])) {
    extract($_POST);

    $update_sql = "UPDATE `seminar` SET `title`='$title1' WHERE id='$seminar_id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: view_seminar.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
    }
}
?>

<?php
if (isset($_GET['seminar_id'])) {
    $id = $_GET['seminar_id'];

    $select_from_new_paper = "SELECT * FROM seminar WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">সেমিনার সম্পর্কে তথ্য সংশোধন</h2>
                <form action="" method="post">
                    <input type="hidden" name="seminar_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="title1">শিরোনাম</label>
                        <input type="text" name="title1" id="title1" class="form-control" placeholder="সেমিনারের শিরোনাম লিখুন" value="<?php echo $title; ?>">
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_seminar" value="Update" class="btn btn-primary">
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