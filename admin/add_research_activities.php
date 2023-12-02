<?php include("admin_header.php") ?>
<?php include("numberToWord/BanglaNumberToWord.php") ?>
<?php
$obj = new BanglaNumberToWord();
// echo $obj->engToBn(5207.56);
?>

<?php
if (isset($_POST['add_research_activities'])) {
    extract($_POST);

    $insert_sql = "INSERT INTO `research_activities`(`fiscal_year`,`researcher_number`) VALUES('$fiscal_year','$researcher_number')";
    $run_insert_qry = mysqli_query($conn, $insert_sql);
    if ($run_insert_qry) {
        header("location: view_research_activities.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">গবেষণা কার্যক্রম সম্পর্কে তথ্য সংযুক্তি</h2>
        <form action="" method="post">
            <div class="mt-3">
                <label for="fiscal_year">অর্থবছর</label>
                <select name="fiscal_year" id="fiscal_year" class="form-select" required>
                    <option value="">অর্থবছর নির্বাচন করুন</option>
                    <?php
                    $select_from_new_paper = "SELECT DISTINCT fiscal_year FROM `fiscal_years` ORDER BY `fiscal_year`";
                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                        while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                            extract($row);
                    ?>
                            <option value="<?php echo $fiscal_year ?>"><?php echo $fiscal_year ?></option>
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
                    <option value="করোনাকাল">করোনাকাল</option>
                    <?php
                    for ($i = 1; $i <= 50; $i++) {
                    ?>
                        <option value="<?php echo $obj->engToBn($i) ?> জন গবেষক"><?php echo $obj->engToBn($i) ?> জন গবেষক</option>
                    <?php
                    }
                    ?>
                    <option value="চলমান">চলমান</option>
                </select>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_research_activities" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>