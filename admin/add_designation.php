<?php include("admin_header.php") ?>
<?php
if (isset($_POST['add_designation'])) {
    extract($_POST);

    $insert_sql = "INSERT INTO `designations`(`designation`) VALUES('$designation')";
    $run_insert_qry = mysqli_query($conn, $insert_sql);
    if ($run_insert_qry) {
        header("location: view_designations.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">গুরুত্বপূর্ণ পদবিগুলোর তথ্য সংযুক্তি</h2>
        <form action="" method="post">
            <div class="mt-3">
                <label for="designation">পদবি</label>
                <input type="text" name="designation" id="designation" class="form-control" placeholder="পদবির নাম লিখুন" required>
            </div>
            <!-- <div class="mt-3">
                <label for="session">শিক্ষাবর্ষ</label>
                <input type="text" name="session" id="session" class="form-control" placeholder="শিক্ষাবর্ষ লিখুন" required>
            </div> -->
            <div class="mt-3">
                <input type="submit" name="add_designation" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>