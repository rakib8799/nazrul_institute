<?php include("admin_header.php") ?>
<?php include("numberToWord/BanglaNumberToWord.php") ?>
<?php
$obj = new BanglaNumberToWord();
?>

<?php
if (isset($_POST['edit_scholarship_students'])) {
    extract($_POST);

    if (!empty($_FILES['image']['name']) && empty($_FILES['pdf_file']['name'])) {
        $scholarship_students_image_name = $_FILES['image']['name'];
        $scholarship_students_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($scholarship_students_image_name, PATHINFO_EXTENSION));
        $scholarship_students_image_name = uniqid() . ".$path_info";

        $arr = array("jpg", "png", "jpeg");

        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        } else {
            unlink('../Images/scholarship_students/' . $current_image);

            $update_sql = "UPDATE `scholarship_students` SET `fiscal_year`='$fiscal_year',`session_year`='$session_year',`faculty`='$faculty',`department`='$department',`scholarship_student`='$scholarship_student', `image`='$scholarship_students_image_name' WHERE id='$scholarship_students_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($scholarship_students_image_tmp_name, '../Images/scholarship_students/' . $scholarship_students_image_name);

                header("location: view_scholarship_student.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    } else {
        if (!empty($_FILES['pdf_file']['name']) && empty($_FILES['image']['name'])) {
            $pdf_file_name = $_FILES['pdf_file']['name'];
            $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
            $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));
            $pdf_file_name = uniqid() . ".$path_info3";

            $arr3 = array("pdf");

            if (!in_array($path_info3, $arr3)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ফাইলের ফরম্যাট (PDF) হতে হবে</p>";
            } else {
                unlink('../Files/scholarship_students/pdf_file/' . $current_pdf_file);

                $update_sql = "UPDATE `scholarship_students` SET `fiscal_year`='$fiscal_year',`session_year`='$session_year',`faculty`='$faculty',`department`='$department',`scholarship_student`='$scholarship_student', `pdf_file`='$pdf_file_name' WHERE id='$scholarship_students_id'";
                $run_insert_qry = mysqli_query($conn, $update_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($pdf_file_tmp_name, '../Files/scholarship_students/pdf_file/' . $pdf_file_name);
                    header("location: view_scholarship_student.php");
                    ob_end_flush();
                } else {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
                }
            }
        } else if (!empty($_FILES['image']['name'] && $_FILES['pdf_file']['name'])) {
            $scholarship_students_image_name = $_FILES['image']['name'];
            $scholarship_students_image_tmp_name = $_FILES['image']['tmp_name'];
            $path_info = strtolower(pathinfo($scholarship_students_image_name, PATHINFO_EXTENSION));
            $scholarship_students_image_name = uniqid() . ".$path_info";

            $arr = array("jpg", "png", "jpeg");;
            $pdf_file_name = $_FILES['pdf_file']['name'];
            $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];;
            $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));
            $pdf_file_name = uniqid() . ".$path_info3";

            $arr3 = array("pdf");

            if (!in_array($path_info, $arr)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
            } else if (!in_array($path_info3, $arr3)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ফাইলের ফরম্যাট (PDF) হতে হবে</p>";
            } else {
                unlink('../Images/scholarship_students/' . $current_image);
                unlink('../Files/scholarship_students/pdf_file/' . $current_pdf_file);

                $update_sql = "UPDATE `scholarship_students` SET `fiscal_year`='$fiscal_year',`session_year`='$session_year',`faculty`='$faculty',`department`='$department',`scholarship_student`='$scholarship_student', `image`='$scholarship_students_image_name', `pdf_file`='$pdf_file_name' WHERE id='$scholarship_students_id'";
                $run_insert_qry = mysqli_query($conn, $update_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($scholarship_students_image_tmp_name, '../Images/scholarship_students/' . $scholarship_students_image_name);
                    move_uploaded_file($pdf_file_tmp_name, '../Files/scholarship_students/pdf_file/' . $pdf_file_name);
                    header("location: view_scholarship_student.php");
                    ob_end_flush();
                } else {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
                }
            }
        } else {
            $update_sql = "UPDATE `scholarship_students` SET `fiscal_year`='$fiscal_year',`session_year`='$session_year',`faculty`='$faculty',`department`='$department',`scholarship_student`='$scholarship_student' WHERE id='$scholarship_students_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                header("location: view_scholarship_student.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    }
}
?>

<?php
if (isset($_GET['scholarship_students_id'])) {
    $id = $_GET['scholarship_students_id'];

    $select_from_new_paper = "SELECT * FROM scholarship_students WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);

    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>

        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">বৃত্তিপ্রাপ্ত শিক্ষার্থীদের সম্পর্কে তথ্য সংশোধন</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="scholarship_students_id" value="<?php echo $id ?>">
                    <div class="mt-3">
                        <label for="fiscal_year">অর্থবছর</label>
                        <select name="fiscal_year" id="fiscal_year" class="form-select" required>
                            <option value="">অর্থবছর নির্বাচন করুন</option>
                            <?php
                            $select_from_new_paper = "SELECT DISTINCT fiscal_year FROM `fiscal_years` ORDER BY fiscal_year";
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
                        <label for="session_year">শিক্ষাবর্ষ</label>
                        <select name="session_year" id="session_year" class="form-control" required>
                            <option value="">শিক্ষাবর্ষ নির্বাচন করুন</option>
                            <?php
                            $select_from_new_paper = "SELECT DISTINCT session_year FROM `session_years` ORDER BY `session_year`";
                            $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                            if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                                while ($row1 = mysqli_fetch_assoc($run_select_from_new_paper)) {
                            ?>
                                    <option value="<?php echo $row1['session_year'] ?>" <?php if ($session_year == $row1['session_year']) {
                                                                                            echo "selected";
                                                                                        }
                                                                                        ?>><?php echo $row1['session_year'] ?>
                                    </option>
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
                            for ($i = 1; $i <= 20; $i++) {
                            ?>
                                <option value="<?php echo $obj->engToBn($i) ?> টি" <?php if (isset($faculty) && $faculty == $obj->engToBn($i) . " টি") {
                                                                                        echo "selected";
                                                                                    }
                                                                                    ?>><?php echo $obj->engToBn($i) ?> টি</option>
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
                            for ($i = 1; $i <= 50; $i++) {
                            ?>
                                <option value="<?php echo $obj->engToBn($i) ?> টি" <?php if (isset($department) && $department == $obj->engToBn($i) . " টি") {
                                                                                        echo "selected";
                                                                                    }
                                                                                    ?>><?php echo $obj->engToBn($i) ?> টি</option>
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
                            for ($i = 1; $i <= 50; $i++) {
                            ?>
                                <option value="<?php echo $obj->engToBn($i) ?> জন" <?php if (isset($scholarship_student) && $scholarship_student == $obj->engToBn($i) . " জন") {
                                                                                        echo "selected";
                                                                                    }
                                                                                    ?>><?php echo $obj->engToBn($i) ?> জন</option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>পূর্ববর্তী ছবি</label><br>
                        <img src="../Images/scholarship_students/<?php echo $image ?>" width="100px" alt="scholarship_students_image">
                        <input type="hidden" name="current_image" value="<?php echo $image; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="image">নতুন ছবি সংযুক্তি</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label>পূর্ববর্তী পিডিএফ ফাইল</label><br>
                        <a href="../Files/scholarship_students/pdf_file/<?php echo $pdf_file ?>"><?php echo $pdf_file ?></a>
                        <input type="hidden" name="current_pdf_file" value="<?php echo $pdf_file; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="pdf_file">নতুন পিডিএফ ফাইল সংযুক্তি</label>
                        <input type="file" name="pdf_file" id="pdf_file" class="form-control">
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_scholarship_students" value="Update" class="btn btn-primary">
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