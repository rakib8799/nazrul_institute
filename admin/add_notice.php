<?php include("admin_header.php") ?>
<?php
if (isset($_POST['add_notice'])) {
    extract($_POST);

    if (isset($_FILES['pdf_file'])) {
        // $doc_file_name = $_FILES['doc_file']['name'];
        // $doc_file_tmp_name = $_FILES['doc_file']['tmp_name'];
        $pdf_file_name = $_FILES['pdf_file']['name'];
        $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
        // $path_info4 = strtolower(pathinfo($doc_file_name, PATHINFO_EXTENSION));
        $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));
        // $doc_file_name = uniqid() . ".$path_info4";
        $pdf_file_name = uniqid() . ".$path_info3";

        // $arr4 = array("doc", "docx");
        $arr3 = array("pdf");
        if (!in_array($path_info3, $arr3)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ফাইলের ফরম্যাট (PDF) হতে হবে</p>";
        } else {
            $submission_date_format = date("Y-m-d", strtotime($submission_date));
            // $submission_date_bd = $obj->engToBn($submission_date_format);
            $insert_sql = "INSERT INTO `notices`(`title`,`pdf_file`,`submission_date`) VALUES('$long_desc1','$pdf_file_name','$submission_date_format')";
            $run_insert_qry = mysqli_query($conn, $insert_sql);
            if ($run_insert_qry) {
                // move_uploaded_file($doc_file_tmp_name, '../Files/notices/doc_file/' . $doc_file_name);
                move_uploaded_file($pdf_file_tmp_name, '../Files/notices/pdf_file/' . $pdf_file_name);
                header("location: view_notices.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
            }
        }
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো ফাইল পাওয়া যায়নি</p>";
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">নোটিশের তথ্য সংযুক্তি</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="long_desc1">শিরোনাম</label>
                <textarea name="long_desc1" class="long_desc" id="long_desc1" required></textarea>
            </div>
            <!-- <div class="mt-3">
                <label for="doc_file">ডক ফাইল সংযুক্তি</label>
                <input type="file" name="doc_file" id="doc_file" class="form-control" required>
            </div> -->
            <div class="mt-3">
                <label for="pdf_file">পিডিএফ ফাইল সংযুক্তি</label>
                <input type="file" name="pdf_file" id="pdf_file" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="submission_date">জমাদানের শেষ সময়</label>
                <input type="date" name="submission_date" id="submission_date" class="form-control" placeholder="জমাদানের শেষ সময় লিখুন" required>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_notice" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>