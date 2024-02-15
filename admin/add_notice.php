<?php include("admin_header.php") ?>

<?php
if (isset($_POST['add_notice'])) {
    extract($_POST);

    $t = time();
    $current_time = date("Y-m-d H:i:s", $t);

    $submission_date_format = date("Y-m-d", strtotime($submission_date));

    if (isset($_FILES['image']['name'])) {
        $notices_image_name = $_FILES['image']['name'];
        $notices_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($notices_image_name, PATHINFO_EXTENSION));
        $notices_image_name = uniqid() . ".$path_info";

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
                $insert_sql = "INSERT INTO `notices`(`title`,`details`,`image`,`pdf_file`,`submission_date`,`created_at`) VALUES('$title','$long_desc1','$notices_image_name','$pdf_file_name','$submission_date_format','$current_time')";

                $run_insert_qry = mysqli_query($conn, $insert_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($notices_image_tmp_name, '../Images/notices/' . $notices_image_name);
                    move_uploaded_file($pdf_file_tmp_name, '../Files/notices/pdf_file/' . $pdf_file_name);

                    header("location: view_notices.php");
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
                $insert_sql = "INSERT INTO `notices`(`title`,`details`,`image`,`submission_date`,`created_at`) VALUES('$title','$long_desc1','$notices_image_name','$submission_date_format','$current_time')";

                $run_insert_qry = mysqli_query($conn, $insert_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($notices_image_tmp_name, '../Images/notices/' . $notices_image_name);

                    header("location: view_notices.php");
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
        <h2 class="text-capitalize text-center">নোটিশের তথ্য সংযুক্তি</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="title">শিরোনাম</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="শিরোনাম লিখুন" required>
            </div>
            <div class="mt-3">
                <label for="long_desc1">বিস্তারিত</label>
                <textarea name="long_desc1" class="long_desc" id="long_desc1" required></textarea>
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