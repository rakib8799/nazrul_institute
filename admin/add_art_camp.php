<?php include("admin_header.php") ?>

<?php
if (isset($_POST['add_art_camp'])) {
    extract($_POST);

    $t = time();
    $current_time = date("Y-m-d H:i:s", $t);

    if (isset($_FILES['files']['name'])) {
        $insertValuesSQL = '';

        foreach ($_FILES['files']['name'] as $key => $val) {
            $art_camp_image_name = $_FILES['files']['name'][$key];
            $art_camp_image_tmp_name = $_FILES['files']['tmp_name'][$key];
            $path_info = strtolower(pathinfo($art_camp_image_name, PATHINFO_EXTENSION));
            $art_camp_image_name = uniqid() . ".$path_info";

            $arr = array("jpg", "png", "jpeg");
            if (!in_array($path_info, $arr)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
            } else {
                if (!file_exists("../Images/art_camp/" . $art_camp_image_name)) {
                    move_uploaded_file($art_camp_image_tmp_name, "../Images/art_camp/" . $art_camp_image_name);
                    $insertValuesSQL .= $art_camp_image_name . ',';
                }
            }
        }
        $insertValuesSQL = trim($insertValuesSQL, ',');

        $insert_sql = "INSERT INTO `art_camp`(`title`,`details`,`image`,`created_at`) VALUES('$title','$long_desc1','$insertValuesSQL','$current_time')";

        $run_insert_qry = mysqli_query($conn, $insert_sql);
        if ($run_insert_qry) {
            header("location: view_art_camp.php");
            ob_end_flush();
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
        }
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো ছবি পাওয়া যায়নি</p>";
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">আর্ট ক্যাম্প সম্পর্কে তথ্য সংযুক্তি</h2>
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
                <label for="images">ছবি সংযুক্তি</label>
                <input type="file" name="files[]" multiple id="images" class="form-control" required>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_art_camp" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>