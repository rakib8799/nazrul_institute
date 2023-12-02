<?php include("admin_header.php") ?>
<?php
if (isset($_POST['add_seminar'])) {
    extract($_POST);

    $insert_sql = "INSERT INTO `seminar`(`title`) VALUES('$title1')";
    $run_insert_qry = mysqli_query($conn, $insert_sql);
    if ($run_insert_qry) {
        header("location: view_seminar.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">সেমিনার সম্পর্কে তথ্য সংযুক্তি</h2>
        <form action="" method="post">
            <div class="mt-3">
                <label for="title1">শিরোনাম</label>
                <input type="text" name="title1" id="title1" class="form-control" placeholder="সেমিনারের শিরোনাম লিখুন" required>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_seminar" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>