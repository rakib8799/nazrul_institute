<?php include("admin_header.php") ?>
<?php include("./functions/compress_image.php") ?>

<?php
if (isset($_POST['add_speech'])) {
    extract($_POST);

    if (isset($_FILES['image']['name'])) {
        $speech_image_name = $_FILES['image']['name'];
        $speech_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($speech_image_name, PATHINFO_EXTENSION));
        $speech_image_name = uniqid() . ".$path_info";
        // $imageUploadPath = '../Images/speech/' . $speech_image_name;


        $count_error = 0;
        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            $count_error++;
        }

        if ($count_error > 0) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        } else {
            $insert_sql = "INSERT INTO `speech`(`speech_name`,`speaker_name`,`image`) VALUES('$speech_name','$speaker_name','$speech_image_name')";
            $run_insert_qry = mysqli_query($conn, $insert_sql);
            if ($run_insert_qry) {
                move_uploaded_file($speech_image_tmp_name, '../Images/speech/' . $speech_image_name);
                // $compressedImage = compressImage($speech_image_tmp_name, $imageUploadPath, 75);

                header("location: view_speech.php");
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
        <h2 class="text-capitalize text-center">বক্তৃতামালা সম্পর্কে তথ্য সংযুক্তি</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="speech_name">বক্তৃতামালা</label>
                <input type="text" name="speech_name" id="speech_name" class="form-control" placeholder="বক্তৃতার নাম লিখুন" required>
            </div>
            <div class="mt-3">
                <label for="speaker_name">বক্তা</label>
                <input type="text" name="speaker_name" id="speaker_name" class="form-control" placeholder="বক্তার নাম লিখুন" required>
            </div>
            <div class="mt-3">
                <label for="image">ছবি</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_speech" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>