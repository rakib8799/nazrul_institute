<?php include("admin_header.php") ?>
<?php
if (isset($_POST['add_art_camp'])) {
    extract($_POST);

    $insert_sql = "INSERT INTO `art_camp`(`title`,`details`) VALUES('$long_desc1','$long_desc2')";
    $run_insert_qry = mysqli_query($conn, $insert_sql);
    if ($run_insert_qry) {
        header("location: view_art_camp.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">আর্ট ক্যাম্প সম্পর্কে তথ্য সংযুক্তি</h2>
        <form action="" method="post">
            <div class="mt-3">
                <label for="long_desc1">শিরোনাম</label>
                <textarea name="long_desc1" class="long_desc" id="long_desc1" required></textarea>
            </div>
            <div class="mt-3">
                <label for="long_desc2">বিস্তারিত</label>
                <textarea name="long_desc2" class="long_desc" id="long_desc2" required></textarea>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_art_camp" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>