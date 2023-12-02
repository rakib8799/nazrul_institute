<?php include("admin_header.php") ?>
<?php
if (isset($_POST['add_report'])) {
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
            $insert_sql = "INSERT INTO `reports`(`title`,`pdf_file`) VALUES('$title1','$pdf_file_name')";
            $run_insert_qry = mysqli_query($conn, $insert_sql);
            if ($run_insert_qry) {
                // move_uploaded_file($doc_file_tmp_name, '../Files/reports/doc_file/' . $doc_file_name);
                move_uploaded_file($pdf_file_tmp_name, '../Files/reports/pdf_file/' . $pdf_file_name);
                header("location: view_reports.php");
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
        <h2 class="text-capitalize text-center">বার্ষিক প্রতিবেদনের তথ্য সংযুক্তি</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="title1">শিরোনাম</label>
                <input type="text" name="title1" id="title1" class="form-control" placeholder="বার্ষিক প্রতিবেদনের শিরোনাম লিখুন" required>
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
                <input type="submit" name="add_report" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>