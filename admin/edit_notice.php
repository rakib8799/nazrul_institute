<?php include("admin_header.php") ?>
<?php include("./functions/compress_image.php") ?>

<?php
if (isset($_POST['edit_notice'])) {
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
            // unlink('../Files/notices/doc_file/' . $current_doc_file);
            unlink('../Files/notices/pdf_file/' . $current_pdf_file);
            $update_sql = "UPDATE `notices` SET `title`='$long_desc1', `pdf_file`='$pdf_file_name',`submission_date`='$submission_date' WHERE id='$notice_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                // move_uploaded_file($doc_file_tmp_name, '../Files/notices/doc_file/' . $doc_file_name);
                move_uploaded_file($pdf_file_tmp_name, '../Files/notices/pdf_file/' . $pdf_file_name);
                header("location: view_notices.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    }
    // else if (!empty($_FILES['doc_file'])) {
    //     unlink('../Files/notices/doc_file/' . $current_doc_file);
    //     $update_sql = "UPDATE `notices` SET `title`='$long_desc1',`doc_file`='$doc_file_name' WHERE id='$notice_id'";
    //     $run_insert_qry = mysqli_query($conn, $update_sql);
    //     if ($run_insert_qry) {
    //         move_uploaded_file($doc_file_tmp_name, '../Files/notices/doc_file/' . $doc_file_name);
    //         header("location: view_notices.php");
    //         ob_end_flush();
    //     } else {
    //         echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
    //     }
    // } else if (!empty($_FILES['pdf_file'])) {
    //     unlink('../Files/notices/pdf_file/' . $current_pdf_file);
    //     $update_sql = "UPDATE `notices` SET `title`='$long_desc1',`pdf_file`='$pdf_file_name' WHERE id='$notice_id'";
    //     $run_insert_qry = mysqli_query($conn, $update_sql);
    //     if ($run_insert_qry) {
    //         move_uploaded_file($pdf_file_tmp_name, '../Files/notices/pdf_file/' . $pdf_file_name);
    //         header("location: view_notices.php");
    //         ob_end_flush();
    //     } else {
    //         echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
    //     }
    // } 
    else {
        $update_sql = "UPDATE `notices` SET `title`='$long_desc1',`submission_date`='$submission_date' WHERE id='$notice_id'";
        $run_insert_qry = mysqli_query($conn, $update_sql);
        if ($run_insert_qry) {
            header("location: view_notices.php");
            ob_end_flush();
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
        }
    }
}
?>

<?php
if (isset($_GET['notice_id'])) {
    $id = $_GET['notice_id'];

    $select_from_new_paper = "SELECT * FROM notices WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">নোটিশের তথ্য সংশোধন</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="notice_id" value="<?php echo $id; ?>" />

                    <div class="mt-3">
                        <label for="long_desc1">শিরোনাম</label>
                        <textarea name="long_desc1" class="long_desc" id="long_desc1"><?php echo $title ?></textarea>
                    </div>
                    <!-- <div class="mt-3">
                        <label>পূর্ববর্তী ডক ফাইল</label><br>
                        <a href="../Files/notice/<?php echo $doc_file ?>"><?php echo $doc_file ?></a>
                        <input type="hidden" name="current_doc_file" value="<?php echo $doc_file; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="doc_file">নতুন ডক ফাইল সংযুক্তি</label>
                        <input type="file" name="doc_file" id="doc_file" class="form-control">
                    </div> -->
                    <div class="mt-3">
                        <label>পূর্ববর্তী পিডিএফ ফাইল</label><br>
                        <a href="../Files/notices/pdf_file/<?php echo $pdf_file ?>"><?php echo $pdf_file ?></a>
                        <input type="hidden" name="current_pdf_file" value="<?php echo $pdf_file; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="pdf_file">নতুন পিডিএফ ফাইল সংযুক্তি</label>
                        <input type="file" name="pdf_file" id="pdf_file" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="submission_date">জমাদানের শেষ সময়</label>
                        <input type="text" name="submission_date" id="submission_date" class="form-control" placeholder="জমাদানের শেষ সময় লিখুন" value="<?php echo $submission_date; ?>">
                    </div>

                    <div class="mt-3">
                        <input type="submit" name="edit_notice" value="Update" class="btn btn-primary">
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