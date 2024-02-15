<?php include("admin_header.php") ?>

<?php
if (isset($_POST['add_infrastructure'])) {
    extract($_POST);

    $t = time();
    $current_time = date("Y-m-d H:i:s", $t);


    if (isset($_FILES['image']['name'])) {
        $infrastructure_image_name = $_FILES['image']['name'];
        $notice_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($infrastructure_image_name, PATHINFO_EXTENSION));
        $infrastructure_image_name = uniqid() . ".$path_info";

        $arr = array("jpg", "png", "jpeg");

        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        } else {
            $insert_sql = "INSERT INTO `infrastructure`(`title`,`details`,`image`,`created_at`) VALUES('$title','$long_desc1','$infrastructure_image_name','$current_time')";

            $run_insert_qry = mysqli_query($conn, $insert_sql);
            if ($run_insert_qry) {
                move_uploaded_file($notice_image_tmp_name, '../Images/infrastructure/' . $infrastructure_image_name);

                header("location: view_infrastructure.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
            }
        }
    } else {
        $insert_sql = "INSERT INTO `infrastructure`(`title`,`details`,`created_at`) VALUES('$title','$long_desc1','$current_time')";

        $run_insert_qry = mysqli_query($conn, $insert_sql);
        if ($run_insert_qry) {

            header("location: view_infrastructure.php");
            ob_end_flush();
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
        }
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">অবকাঠামো সম্পর্কে তথ্য সংযুক্তি</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="title">শিরোনাম</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="শিরোনাম লিখুন" required>
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
                <input type="submit" name="add_infrastructure" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>