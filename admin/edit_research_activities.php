<?php include("admin_header.php") ?>
<?php include("numberToWord/BanglaNumberToWord.php") ?>
<?php
$obj = new BanglaNumberToWord();
// echo $obj->engToBn(5207.56);
?>

<?php
if (isset($_POST['edit_research_activities'])) {
    extract($_POST);

    $update_sql = "UPDATE `research_activities` SET `fiscal_year`='$fiscal_year',`researcher_number`='$researcher_number' WHERE id='$research_activities_id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: view_research_activities.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
    }
}
?>

<?php
if (isset($_GET['research_activities_id'])) {
    $id = $_GET['research_activities_id'];

    $select_from_new_paper = "SELECT * FROM research_activities WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);

    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
        // echo $researcher_number;
        // echo $obj->engToBn(15) . " জন গবেষক";
?>

        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">গবেষণা কার্যক্রম সম্পর্কে তথ্য সংশোধন</h2>
                <form action="" method="post">
                    <input type="hidden" name="research_activities_id" value="<?php echo $id ?>">
                    <div class="mt-3">
                        <label for="fiscal_year">অর্থবছর</label>
                        <select name="fiscal_year" id="fiscal_year" class="form-select" required>
                            <option value="">অর্থবছর নির্বাচন করুন</option>
                            <?php
                            $select_from_new_paper = "SELECT DISTINCT fiscal_year FROM `research_activities`";
                            $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                            if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                                while ($row1 = mysqli_fetch_assoc($run_select_from_new_paper)) {
                            ?>
                                    <option value="<?php echo $row1['fiscal_year'] ?>" <?php if ($fiscal_year == $row1['fiscal_year']) {
                                                                                            echo "selected";
                                                                                        }
                                                                                        ?>><?php echo $row1['fiscal_year'] ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="researcher_number">গবেষকদের সংখ্যা</label>
                        <select name="researcher_number" id="researcher_number" class="form-control" required>
                            <option value="">গবেষকদের সংখ্যা নির্বাচন করুন</option>
                            <option value="করোনাকাল" <?php if (isset($researcher_number) && $researcher_number == "করোনাকাল") {
                                                            echo "selected";
                                                        } ?>>করোনাকাল</option>
                            <?php
                            for ($i = 1; $i <= 50; $i++) {
                            ?>
                                <option value="<?php echo $obj->engToBn($i) ?> জন গবেষক" <?php if (isset($researcher_number) && $researcher_number == $obj->engToBn($i) . " জন গবেষক") {
                                                                                                echo "selected";
                                                                                            } ?>><?php echo $obj->engToBn($i) ?> জন গবেষক</option>
                            <?php
                            }
                            ?>
                            <option value="চলমান" <?php if (isset($researcher_number) && $researcher_number == "চলমান") {
                                                        echo "selected";
                                                    } ?>>চলমান</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_research_activities" value="Update" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

<?php
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য পাওয়া যায়নি</p>";
    }
} ?>
<?php include("admin_footer.php") ?>