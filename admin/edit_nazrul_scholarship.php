<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_nazrul_scholarship'])) {
    extract($_POST);

    $update_sql = "UPDATE `nazrul_scholarship` SET `faculty`='$faculty',`scholarship`='$scholarship' WHERE id='$nazrul_scholarship_id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: view_nazrul_scholarship.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
    }
}
?>

<?php
if (isset($_GET['nazrul_scholarship_id'])) {
    $id = $_GET['nazrul_scholarship_id'];

    $select_from_new_paper = "SELECT * FROM nazrul_scholarship WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">অনুষদ ভিত্তিক বৃত্তি সম্পর্কে তথ্য সংশোধন</h2>
                <form action="" method="post">
                    <input type="hidden" name="nazrul_scholarship_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="faculty">অনুষদ</label>
                        <select name="faculty" id="faculty" class="form-select" required>
                            <option value="">অনুষদ নির্বাচন করুন</option>
                            <?php
                            $select_from_new_paper = "SELECT DISTINCT faculty FROM `faculties` ORDER BY id";
                            $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                            if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                                while ($row1 = mysqli_fetch_assoc($run_select_from_new_paper)) {
                            ?>
                                    <option value="<?php echo $row1['faculty'] ?>" <?php if ($faculty == $row1['faculty']) {
                                                                                        echo "selected";
                                                                                    }
                                                                                    ?>><?php echo $row1['faculty'] ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="scholarship">বৃত্তি</label>
                        <input type="text" name="scholarship" id="scholarship" class="form-control" placeholder="বৃত্তির নাম লিখুন" value="<?php echo $scholarship; ?>">
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_nazrul_scholarship" value="Update" class="btn btn-primary">
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