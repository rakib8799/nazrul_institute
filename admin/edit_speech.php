<?php include("admin_header.php") ?>
<?php include("./functions/compress_image.php") ?>

<?php
if (isset($_POST['edit_speech'])) {
    extract($_POST);

    if (!empty($_FILES['image']['name'])) {
        $speech_image_name = $_FILES['image']['name'];
        $speech_image_tmp_name = $_FILES['image']['tmp_name'];

        $path_info = strtolower(pathinfo($speech_image_name, PATHINFO_EXTENSION));

        $speech_image_name = uniqid() . ".$path_info";
        // $imageUploadPath = '../Images/speech/' . $speech_image_name;


        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        } else {
            unlink('../Images/speech/' . $current_image);
            $update_sql = "UPDATE `speech` SET `speech_name`='$speech_name',`speaker_name`='$speaker_name',`image`='$speech_image_name' WHERE id='$speech_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($speech_image_tmp_name, '../Images/speech/' . $speech_image_name);
                // $compressedImage = compressImage($speech_image_tmp_name, $imageUploadPath, 75);

                header("location: view_speech.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    } else {
        $update_sql = "UPDATE `speech` SET `speech_name`='$speech_name',`speaker_name`='$speaker_name' WHERE id='$speech_id'";
        $run_insert_qry = mysqli_query($conn, $update_sql);
        if ($run_insert_qry) {
            header("location: view_speech.php");
            ob_end_flush();
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
        }
    }
}
?>

<?php
if (isset($_GET['speech_id'])) {
    $id = $_GET['speech_id'];

    $select_from_new_paper = "SELECT * FROM speech WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">বক্তৃতামালা সম্পর্কে তথ্য সংশোধন</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="speech_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="speech_name">বক্তৃতামালা</label>
                        <input type="text" name="speech_name" id="speech_name" class="form-control" placeholder="বক্তৃতার নাম লিখুন" value="<?php echo $speech_name; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="speaker_name">বক্তা</label>
                        <input type="text" name="speaker_name" id="speaker_name" class="form-control" placeholder="বক্তার নাম লিখুন" value="<?php echo $speaker_name; ?>">
                    </div>

                    <div class="mt-3">
                        <label>পূর্ববর্তী ছবি</label><br>
                        <img src="../Images/speech/<?php echo $image ?>" width="100px" alt="speech_image">
                        <input type="hidden" name="current_image" value="<?php echo $image; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="image">নতুন ছবি সংযুক্তি</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_speech" value="Update" class="btn btn-primary">
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