<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_fiscal_year'])) {
    extract($_POST);

    $update_sql = "UPDATE `fiscal_years` SET `fiscal_year`='$fiscal_year' WHERE id='$fiscal_year_id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: view_fiscal_years.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
    }
}
?>

<?php
if (isset($_GET['fiscal_year_id'])) {
    $id = $_GET['fiscal_year_id'];

    $select_from_new_paper = "SELECT * FROM fiscal_years WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">গুরুত্বপূর্ণ বছরগুলোর তথ্য সংশোধন</h2>
                <form action="" method="post">
                    <div class="mt-3">
                        <input type="hidden" name="fiscal_year_id" value="<?php echo $id; ?>" />
                        <label for="fiscal_year">অর্থবছর</label>
                        <input type="text" name="fiscal_year" id="fiscal_year" class="form-control" placeholder="অর্থবছর লিখুন" value="<?php echo $fiscal_year ?>" required>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_fiscal_year" value="Update" class="btn btn-primary">
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