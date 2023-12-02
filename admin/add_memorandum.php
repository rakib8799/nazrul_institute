<?php include("admin_header.php") ?>
<?php
if (isset($_POST['add_memorandum'])) {
    extract($_POST);

    $insert_sql = "INSERT INTO `memorandum`(`details`) VALUES('$long_desc1')";
    $run_insert_qry = mysqli_query($conn, $insert_sql);
    if ($run_insert_qry) {
        header("location: view_memorandum.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">দ্বি-পাক্ষিক সমঝোতা চুক্তি সম্পর্কে তথ্য সংযুক্তি</h2>
        <form action="" method="post">
            <div class="mt-3">
                <label for="long_desc1">বিস্তারিত</label>
                <textarea name="long_desc1" class="long_desc" id="long_desc1" required></textarea>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_memorandum" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>