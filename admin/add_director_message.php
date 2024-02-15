<?php include("admin_header.php") ?>

<?php
if (isset($_POST['add_director_msg'])) {
    extract($_POST);

    $t = time();
    $current_time = date("Y-m-d H:i:s", $t);

    $insert_sql = "INSERT INTO `director_message`(`title`,`details`,`created_at`) VALUES('$title','$long_desc1','$current_time')";
    $run_insert_qry = mysqli_query($conn, $insert_sql);
    if ($run_insert_qry) {
        header("location: view_director_message.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">বর্তমান পরিচালকের বার্তা সংযুক্তি</h2>
        <form action="" method="post">
            <div class="mt-3">
                <label for="title">শিরোনাম</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="বর্তমান পরিচালককে নিয়ে শিরোনাম লিখুন" required>
            </div>
            <div class="mt-3">
                <label for="long_desc1">বিস্তারিত</label>
                <textarea name="long_desc1" class="long_desc" id="long_desc1" placeholder="বর্তমান পরিচালককে নিয়ে বিস্তারিত" required></textarea>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_director_msg" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>