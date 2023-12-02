<?php include("admin_header.php") ?>
<?php
if (isset($_POST['add_faculty'])) {
    extract($_POST);

    $insert_sql = "INSERT INTO `faculties`(`faculty`) VALUES('$faculty')";
    $run_insert_qry = mysqli_query($conn, $insert_sql);
    if ($run_insert_qry) {
        header("location: view_faculties.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">বিশ্ববিদ্যালয়ের অনুষদগুলোর তথ্য সংযুক্তি</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="faculty">নাম</label>
                <input type="text" name="faculty" id="faculty" class="form-control" placeholder="অনুষদের নাম লিখুন" required>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_faculty" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>