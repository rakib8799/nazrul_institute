<?php include("admin_header.php") ?>
<?php include("./functions/compress_image.php") ?>

<?php
if (isset($_POST['edit_report'])) {
    extract($_POST);

    if (!empty($_FILES['pdf_file']['name'])) {
        // $doc_file_name = $_FILES['doc_file']['name'];
        // $doc_file_tmp_name = $_FILES['doc_file']['tmp_name'];
        $pdf_file_name = $_FILES['pdf_file']['name'];
        $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
        // $path_info4 = strtolower(pathinfo($doc_file_name, PATHINFO_EXTENSION));
        $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));
        // $doc_file_name = uniqid() . ".$path_info4";
        $pdf_file_name = uniqid() . ".$path_info3";

        $arr3 = array("pdf");
        // $arr4 = array("doc", "docx");
        if (!in_array($path_info3, $arr3)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ফাইলের ফরম্যাট (PDF) হতে হবে</p>";
        }
        // else if (!in_array($path_info4, $arr4)) {
        //     echo "<p class='text-danger text-bold text-center fs-5 mt-3'>File must be in doc or docx format</p>";
        // }
        else {
            // unlink('../Files/reports/doc_file/' . $current_doc_file);
            unlink('../Files/reports/pdf_file/' . $current_pdf_file);
            $update_sql = "UPDATE `reports` SET `title`='$title1', `pdf_file`='$pdf_file_name' WHERE id='$report_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                // move_uploaded_file($doc_file_tmp_name, '../Files/reports/doc_file/' . $doc_file_name);
                move_uploaded_file($pdf_file_tmp_name, '../Files/reports/pdf_file/' . $pdf_file_name);
                header("location: view_reports.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    }
    // else if (!empty($_FILES['doc_file'])) {
    //     unlink('../Files/reports/doc_file/' . $current_doc_file);
    //     $update_sql = "UPDATE `reports` SET `title`='$title1',`doc_file`='$doc_file_name' WHERE id='$report_id'";
    //     $run_insert_qry = mysqli_query($conn, $update_sql);
    //     if ($run_insert_qry) {
    //         move_uploaded_file($doc_file_tmp_name, '../Files/reports/doc_file/' . $doc_file_name);
    //         header("location: view_reports.php");
    //         ob_end_flush();
    //     } else {
    //         echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
    //     }
    // } else if (!empty($_FILES['pdf_file'])) {
    //     unlink('../Files/reports/pdf_file/' . $current_pdf_file);
    //     $update_sql = "UPDATE `reports` SET `title`='$title1',`pdf_file`='$pdf_file_name' WHERE id='$report_id'";
    //     $run_insert_qry = mysqli_query($conn, $update_sql);
    //     if ($run_insert_qry) {
    //         move_uploaded_file($pdf_file_tmp_name, '../Files/reports/pdf_file/' . $pdf_file_name);
    //         header("location: view_reports.php");
    //         ob_end_flush();
    //     } else {
    //         echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
    //     }
    // } 
    else {
        $update_sql = "UPDATE `reports` SET `title`='$title1' WHERE id='$report_id'";
        $run_insert_qry = mysqli_query($conn, $update_sql);
        if ($run_insert_qry) {
            header("location: view_reports.php");
            ob_end_flush();
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
        }
    }
}
?>

<?php
if (isset($_GET['report_id'])) {
    $id = $_GET['report_id'];

    $select_from_new_paper = "SELECT * FROM reports WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">নোটিশের তথ্য সংশোধন</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="report_id" value="<?php echo $id; ?>" />

                    <div class="mt-3">
                        <label for="title1">শিরোনাম</label>
                        <input type="text" name="title1" id="title1" class="form-control" placeholder="নোটিশের শিরোনাম লিখুন" value="<?php echo $title ?>" required>
                    </div>
                    <!-- <div class="mt-3">
                        <label>পূর্ববর্তী ডক ফাইল</label><br>
                        <a href="../Files/report/<?php echo $doc_file ?>"><?php echo $doc_file ?></a>
                        <input type="hidden" name="current_doc_file" value="<?php echo $doc_file; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="doc_file">নতুন ডক ফাইল সংযুক্তি</label>
                        <input type="file" name="doc_file" id="doc_file" class="form-control">
                    </div> -->
                    <div class="mt-3">
                        <label>পূর্ববর্তী পিডিএফ ফাইল</label><br>
                        <a href="../Files/reports/pdf_file/<?php echo $pdf_file ?>"><?php echo $pdf_file ?></a>
                        <input type="hidden" name="current_pdf_file" value="<?php echo $pdf_file; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="pdf_file">নতুন পিডিএফ ফাইল সংযুক্তি</label>
                        <input type="file" name="pdf_file" id="pdf_file" class="form-control">
                    </div>

                    <div class="mt-3">
                        <input type="submit" name="edit_report" value="Update" class="btn btn-primary">
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