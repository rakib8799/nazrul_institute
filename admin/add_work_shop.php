<?php include("admin_header.php") ?>
<?php include("./functions/compress_image.php") ?>

<?php
if (isset($_POST['add_work_shop'])) {
    extract($_POST);

    if (isset($_FILES['image']['name'])) {
        $workshop_image_name = $_FILES['image']['name'];
        $workshop_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($workshop_image_name, PATHINFO_EXTENSION));
        $workshop_image_name = uniqid() . ".$path_info";
        // $imageUploadPath = '../Images/workshop/' . $workshop_image_name;


        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        } else {
            $insert_sql = "INSERT INTO `work_shop`(`title`,`details`,`image`) VALUES('$title1','$long_desc1','$workshop_image_name')";
            $run_insert_qry = mysqli_query($conn, $insert_sql);
            if ($run_insert_qry) {
                move_uploaded_file($workshop_image_tmp_name, '../Images/workshop/' . $workshop_image_name);
                // $compressedImage = compressImage($workshop_image_tmp_name, $imageUploadPath, 75);

                header("location: view_work_shop.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
            }
        }
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো ছবি পাওয়া যায়নি</p>";
    }
}
?>

<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">কর্মশালা সম্পর্কে তথ্য সংযুক্তি</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="title1">শিরোনাম</label>
                <input type="text" name="title1" id="title1" class="form-control" placeholder="কর্মশালার শিরোনাম লিখুন" required>
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
                <input type="submit" name="add_work_shop" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>