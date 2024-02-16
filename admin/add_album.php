<?php include("admin_header.php") ?>

<?php
if (isset($_POST['add_album'])) {
    extract($_POST);

    $t = time();
    $current_time = date("Y-m-d H:i:s", $t);

    if (isset($_FILES['image']['name'])) {
        $album_image_name = $_FILES['image']['name'];
        $notice_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($album_image_name, PATHINFO_EXTENSION));
        $album_image_name = uniqid() . ".$path_info";

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
                $insert_sql = "INSERT INTO `album`(`title`,`advisor_name`,`publisher_name`,`image`,`pdf_file`,`created_at`) VALUES('$title','$advisor_name','$publisher_name','$album_image_name','$pdf_file_name','$current_time')";

                $run_insert_qry = mysqli_query($conn, $insert_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($notice_image_tmp_name, '../Images/album/' . $album_image_name);
                    move_uploaded_file($pdf_file_tmp_name, '../Files/album/pdf_file/' . $pdf_file_name);

                    header("location: view_album.php");
                    ob_end_flush();
                } else {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
                }
            }
        } else {
            if (!in_array($path_info, $arr)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
            } else {
                $insert_sql = "INSERT INTO `album`(`title`,`advisor_name`,`publisher_name`,`image`,`pdf_file`,`created_at`) VALUES('$title','$advisor_name','$publisher_name','$album_image_name','','$current_time')";

                $run_insert_qry = mysqli_query($conn, $insert_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($notice_image_tmp_name, '../Images/album/' . $album_image_name);

                    header("location: view_album.php");
                    ob_end_flush();
                } else {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
                }
            }
        }
    }
}
?>

<?php
if (isset($_POST['add_album'])) {
    extract($_POST);

    if (isset($_FILES['image']['name'])) {
        $album_image_name = $_FILES['image']['name'];
        $notice_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($album_image_name, PATHINFO_EXTENSION));
        $album_image_name = uniqid() . ".$path_info";

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
                $insert_sql = "INSERT INTO `album`(`title`,`advisor_name`,`publisher_name`,`image`,`pdf_file`) VALUES('$title','$advisor_name','$publisher_name','$album_image_name','$pdf_file_name')";

                $run_insert_qry = mysqli_query($conn, $insert_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($notice_image_tmp_name, '../Images/album/' . $album_image_name);
                    move_uploaded_file($pdf_file_tmp_name, '../Files/album/pdf_file/' . $pdf_file_name);

                    header("location: view_album.php");
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
                $insert_sql = "INSERT INTO `album`(`title`,`advisor_name`,`publisher_name`,`image`) VALUES('$title','$advisor_name','$publisher_name','$album_image_name')";

                $run_insert_qry = mysqli_query($conn, $insert_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($notice_image_tmp_name, '../Images/album/' . $album_image_name);

                    header("location: view_album.php");
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
        <h2 class="text-capitalize text-center">অ্যালবাম সম্পর্কে তথ্য সংযুক্তি</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="title">শিরোনাম</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="শিরোনাম লিখুন" required>
            </div>
            <div class="mt-3">
                <label for="advisor_name">উপদেষ্টা</label>
                <input type="text" name="advisor_name" id="advisor_name" class="form-control" placeholder="উপদেষ্টার নাম লিখুন" required>
            </div>
            <div class="mt-3">
                <label for="publisher_name">সম্পাদনা <small class="text-danger">(*একাধিক সম্পাদক হলে কমা দিয়ে আলাদা করুন)</small></label>
                <input type="text" name="publisher_name" id="publisher_name" class="form-control" placeholder="সম্পাদকের নাম লিখুন" required>
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
                <input type="submit" name="add_album" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>