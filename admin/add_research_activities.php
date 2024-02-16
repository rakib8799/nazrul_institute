<?php include("admin_header.php") ?>
<?php include("numberToWord/BanglaNumberToWord.php") ?>
<?php
$obj = new BanglaNumberToWord();
?>

<?php
if (isset($_POST['add_research_activities'])) {
    extract($_POST);

    $t = time();
    $current_time = date("Y-m-d H:i:s", $t);

    if (isset($_FILES['image']['name'])) {
        $research_activities_image_name = $_FILES['image']['name'];
        $notice_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($research_activities_image_name, PATHINFO_EXTENSION));
        $research_activities_image_name = uniqid() . ".$path_info";

        $arr = array("jpg", "png", "jpeg");

        if (!empty($_FILES['pdf_file']['name'])) {
            $pdf_file_name = $_FILES['pdf_file']['name'];
            $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
            $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));
            $pdf_file_name = uniqid() . ".$path_info3";

            $arr3 = array("pdf");

            if (!in_array($path_info, $arr)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
            }
            if (in_array($path_info, $arr) && !in_array($path_info3, $arr3)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ফাইলের ফরম্যাট (PDF) হতে হবে</p>";
            } else {
                $insert_sql = "INSERT INTO `research_activities`(`fiscal_year`,`researcher_number`,`image`,`pdf_file`,`created_at`) VALUES('$fiscal_year','$researcher_number','$research_activities_image_name','$pdf_file_name','$current_time')";

                $run_insert_qry = mysqli_query($conn, $insert_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($notice_image_tmp_name, '../Images/research_activities/' . $research_activities_image_name);
                    move_uploaded_file($pdf_file_tmp_name, '../Files/research_activities/pdf_file/' . $pdf_file_name);

                    header("location: view_research_activities.php");
                    ob_end_flush();
                } else {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
                }
            }
        } else {
            $arr3 = array("pdf");

            if (!in_array($path_info, $arr)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
            } else {
                $insert_sql = "INSERT INTO `research_activities`(`fiscal_year`,`researcher_number`,`image`,`created_at`) VALUES('$title','$long_desc1','$research_activities_image_name','$current_time')";

                $run_insert_qry = mysqli_query($conn, $insert_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($notice_image_tmp_name, '../Images/research_activities/' . $research_activities_image_name);

                    header("location: view_research_activities.php");
                    ob_end_flush();
                } else {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
                }
            }
        }
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">গবেষণা কার্যক্রম সম্পর্কে তথ্য সংযুক্তি</h2>
        <form action="" method="post" enctype="multipart/form-data">
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
                <label for="image">ছবি</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="pdf_file">পিডিএফ ফাইল সংযুক্তি</label>
                <input type="file" name="pdf_file" id="pdf_file" class="form-control">
            </div>
            <div class="mt-3">
                <input type="submit" name="add_research_activities" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>