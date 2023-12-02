<?php include("admin_header.php") ?>
<?php include("./functions/compress_image.php") ?>

<?php
if (isset($_POST['add_staff'])) {
    extract($_POST);

    if (isset($_FILES['image']['name'])) {
        $staff_image_name = $_FILES['image']['name'];
        $staff_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($staff_image_name, PATHINFO_EXTENSION));
        $staff_image_name = uniqid() . ".$path_info";
        // $imageUploadPath = '../Images/staff/' . $staff_image_name;


        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        } else {
            $insert_sql = "INSERT INTO `staffs`(`name`,`designation`,`image`) VALUES('$name','$designation','$staff_image_name')";

            $run_insert_qry = mysqli_query($conn, $insert_sql);
            if ($run_insert_qry) {
                move_uploaded_file($staff_image_tmp_name, '../Images/staff/' . $staff_image_name);
                // $compressedImage = compressImage($staff_image_tmp_name, $imageUploadPath, 75);


                header("location: view_staffs.php");
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
        <h2 class="text-capitalize text-center">কর্মরত কর্মচারীবৃন্দের তথ্য সংযুক্তি</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="name">নাম</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="কর্মচারীর নাম লিখুন" required>
            </div>
            <div class="mt-3">
                <label for="designation">পদবি</label>
                <select name="designation" id="designation" class="form-control" required>
                    <option value="">পদবি নির্বাচন করুন</option>
                    <?php
                    $select_from_new_paper = "SELECT DISTINCT designation FROM `designations`";
                    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                        while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                            extract($row);
                    ?>
                            <option value="<?php echo $designation ?>"><?php echo $designation ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mt-3">
                <label for="image">ছবি সংযুক্তি</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="mt-3">
                <input type="submit" name="add_staff" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>