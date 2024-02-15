<?php include("admin_header.php") ?>

<?php
if (isset($_POST['add_nazrul_scholarship'])) {
    extract($_POST);

    $t = time();
    $current_time = date("Y-m-d H:i:s", $t);

    $insert_sql = "INSERT INTO `nazrul_scholarship`(`faculty`,`scholarship`,`created_at`) VALUES('$faculty','$scholarship','$current_time')";
    $run_insert_qry = mysqli_query($conn, $insert_sql);
    if ($run_insert_qry) {
        header("location: view_nazrul_scholarship.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
    }
}
?>
<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">অনুষদ ভিত্তিক বৃত্তি সম্পর্কে তথ্য সংযুক্তি</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="faculty">অনুষদ</label>
                <select name="faculty" id="faculty" class="form-select" required>
                    <option value="">অনুষদ নির্বাচন করুন</option>
                    <?php
                    $select_from_new_paper = "SELECT DISTINCT faculty FROM `faculties` ORDER BY `id`";
                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                        while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                            extract($row);
                    ?>
                            <option value="<?php echo $faculty ?>"><?php echo $faculty ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mt-3">
                <label for="scholarship">বৃত্তি</label>
                <input type="text" name="scholarship" id="scholarship" class="form-control" placeholder="বৃত্তির নাম লিখুন" required>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_nazrul_scholarship" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>