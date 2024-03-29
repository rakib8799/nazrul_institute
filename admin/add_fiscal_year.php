<?php include("admin_header.php") ?>

<?php
if (isset($_POST['add_fiscal_year'])) {
    extract($_POST);

    $t = time();
    $current_time = date("Y-m-d H:i:s", $t);

    $insert_sql = "INSERT INTO `fiscal_years`(`fiscal_year`,`created_at`) VALUES('$fiscal_year','$current_time')";
    $run_insert_qry = mysqli_query($conn, $insert_sql);
    if ($run_insert_qry) {
        header("location: view_fiscal_years.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">গুরুত্বপূর্ণ বছরগুলোর তথ্য সংযুক্তি</h2>
        <form action="" method="post">
            <div class="mt-3">
                <label for="fiscal_year">অর্থবছর</label>
                <input type="text" name="fiscal_year" id="fiscal_year" class="form-control" placeholder="অর্থবছর লিখুন" required>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_fiscal_year" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>