<?php include("admin_header.php") ?>
<?php include("numberToWord/BanglaNumberToWord.php") ?>
<?php
$obj = new BanglaNumberToWord();
?>

<?php
if (isset($_POST['add_scholarship_students'])) {
    extract($_POST);

    $t = time();
    $current_time = date("Y-m-d H:i:s", $t);

    if (isset($_FILES['image']['name'])) {
        $scholarship_students_image_name = $_FILES['image']['name'];
        $notice_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($scholarship_students_image_name, PATHINFO_EXTENSION));
        $scholarship_students_image_name = uniqid() . ".$path_info";

        $arr = array("jpg", "png", "jpeg");

        if (isset($_FILES['pdf_file']['name']) && !empty($_FILES['pdf_file']['name'])) {
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
                $insert_sql = "INSERT INTO `scholarship_students`(`fiscal_year`,`session_year`,`faculty`,`department`,`scholarship_student`,`image`,`pdf_file`,`created_at`) VALUES('$fiscal_year','$session_year','$faculty','$department','$scholarship_student','$scholarship_students_image_name','$pdf_file_name','$current_time')";

                $run_insert_qry = mysqli_query($conn, $insert_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($notice_image_tmp_name, '../Images/scholarship_students/' . $scholarship_students_image_name);
                    move_uploaded_file($pdf_file_tmp_name, '../Files/scholarship_students/pdf_file/' . $pdf_file_name);

                    header("location: view_scholarship_students.php");
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
                $insert_sql = "INSERT INTO `scholarship_students`(`fiscal_year`,`session_year`,`faculty`,`department`,`scholarship_student`,`image`,`created_at`) VALUES('$fiscal_year','$session_year','$faculty','$department','$scholarship_student','$scholarship_students_image_name','$current_time')";

                $run_insert_qry = mysqli_query($conn, $insert_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($notice_image_tmp_name, '../Images/scholarship_students/' . $scholarship_students_image_name);

                    header("location: view_scholarship_students.php");
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
        <h2 class="text-capitalize text-center">বৃত্তিপ্রাপ্ত শিক্ষার্থীদের সম্পর্কে তথ্য সংযুক্তি</h2>
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
                <label for="session_year">শিক্ষাবর্ষ</label>
                <select name="session_year" id="session_year" class="form-control" required>
                    <option value="">শিক্ষাবর্ষ নির্বাচন করুন</option>
                    <?php
                    $select_from_new_paper = "SELECT DISTINCT session_year FROM `session_years` ORDER BY `session_year`";
                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                        while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                            extract($row);
                    ?>
                            <option value="<?php echo $session_year ?>"><?php echo $session_year ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mt-3">
                <label for="faculty">অনুষদ</label>
                <select name="faculty" id="faculty" class="form-control" required>
                    <option value="">অনুষদ নির্বাচন করুন</option>
                    <?php
                    $select_from_new_paper = "SELECT DISTINCT `faculty`  FROM `faculties` ORDER BY `id`";
                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                    $serial_no = 1;
                    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                        while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                            extract($row);
                            $serial_no++;
                        }
                    }
                    for ($i = 1; $i <= $serial_no; $i++) {
                    ?>
                        <option value="<?php echo $obj->engToBn($i) ?> টি"><?php echo $obj->engToBn($i) ?> টি</option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mt-3">
                <label for="department">বিভাগ</label>
                <select name="department" id="department" class="form-control" required>
                    <option value="">বিভাগ নির্বাচন করুন</option>
                    <?php
                    for ($i = 1; $i <= 60; $i++) {
                    ?>
                        <option value="<?php echo $obj->engToBn($i) ?> টি"><?php echo $obj->engToBn($i) ?> টি</option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mt-3">
                <label for="scholarship_student">বৃত্তিপ্রাপ্ত শিক্ষার্থী সংখ্যা</label>
                <select name="scholarship_student" id="scholarship_student" class="form-control" required>
                    <option value="">বৃত্তিপ্রাপ্ত শিক্ষার্থী সংখ্যা নির্বাচন করুন</option>
                    <?php
                    for ($i = 1; $i <= 100; $i++) {
                    ?>
                        <option value="<?php echo $obj->engToBn($i) ?> জন"><?php echo $obj->engToBn($i) ?> জন</option>
                    <?php
                    }
                    ?>
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
                <input type="submit" name="add_scholarship_students" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>