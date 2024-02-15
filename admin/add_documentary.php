<?php include("admin_header.php") ?>

<?php
if (isset($_POST['add_documentary'])) {
    extract($_POST);

    $t = time();
    $current_time = date("Y-m-d H:i:s", $t);

    if (isset($_FILES['image']['name'])) {
        $documentary_image_name = $_FILES['image']['name'];
        $notice_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($documentary_image_name, PATHINFO_EXTENSION));
        $documentary_image_name = uniqid() . ".$path_info";

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
                $insert_sql = "INSERT INTO `documentary`(`title`,`screenplay_name`,`image`,`pdf_file`,`created_at`) VALUES('$title','$screenplay_name','$documentary_image_name','$pdf_file_name','$current_time')";

                $run_insert_qry = mysqli_query($conn, $insert_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($notice_image_tmp_name, '../Images/documentary/' . $documentary_image_name);
                    move_uploaded_file($pdf_file_tmp_name, '../Files/documentary/pdf_file/' . $pdf_file_name);

                    header("location: view_documentary.php");
                    ob_end_flush();
                } else {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
                }
            }
        } else {
            if (!in_array($path_info, $arr)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
            } else {
                $insert_sql = "INSERT INTO `documentary`(`title`,`screenplay_name`,`image`,`created_at`) VALUES('$title','$screenplay_name','$documentary_image_name','$current_time')";

                $run_insert_qry = mysqli_query($conn, $insert_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($notice_image_tmp_name, '../Images/documentary/' . $documentary_image_name);

                    header("location: view_documentary.php");
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
        <h2 class="text-capitalize text-center">প্রামাণ্যচিত্র সম্পর্কে তথ্য সংযুক্তি</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="title">শিরোনাম</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="শিরোনাম লিখুন" required>
            </div>
            <div class="mt-3">
                <label for="screenplay_name">চিত্রনাট্য ও পরিচালনা</label>
                <input type="text" name="screenplay_name" id="screenplay_name" class="form-control" placeholder="চিত্রনাট্য ও পরিচালনার নাম লিখুন" required>
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
                <input type="submit" name="add_documentary" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>