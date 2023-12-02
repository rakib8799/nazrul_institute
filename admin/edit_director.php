<?php include("admin_header.php") ?>
<?php include("./functions/compress_image.php") ?>

<?php
if (isset($_POST['edit_director'])) {
    extract($_POST);

    if (!empty($_FILES['image']['name'])) {
        $director_image_name = $_FILES['image']['name'];
        $director_image_tmp_name = $_FILES['image']['tmp_name'];

        $path_info = strtolower(pathinfo($director_image_name, PATHINFO_EXTENSION));

        $director_image_name = uniqid() . ".$path_info";
        // $imageUploadPath = '../Images/director/' . $director_image_name;


        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        } else {
            unlink('../Images/director/' . $current_image);
            $update_sql = "UPDATE `director` SET `name`='$name',`designation`='$designation',`duration`='$duration',`image`='$director_image_name' WHERE id='$director_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($director_image_tmp_name, '../Images/director/' . $director_image_name);
                // $compressedImage = compressImage($director_image_tmp_name, $imageUploadPath, 75);

                header("location: view_directors.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    } else {
        $update_sql = "UPDATE `director` SET `name`='$name',`designation`='$designation',`duration`='$duration' WHERE id='$director_id'";
        $run_insert_qry = mysqli_query($conn, $update_sql);
        if ($run_insert_qry) {
            header("location: view_directors.php");
            ob_end_flush();
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
        }
    }
}
?>

<?php
if (isset($_GET['director_id'])) {
    $id = $_GET['director_id'];

    $select_from_new_paper = "SELECT * FROM director WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">পরিচালকবৃন্দের সম্পর্কে তথ্য সংশোধন</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="director_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="name">নাম</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="পরিচালকের নাম লিখুন" value="<?php echo $name; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="designation">পদবি</label>
                        <select name="designation" id="designation" class="form-control" required>
                            <option value="">পদবি নির্বাচন করুন</option>
                            <?php
                            $select_from_new_paper = "SELECT DISTINCT designation FROM `designations`";
                            $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                            if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                                while ($row1 = mysqli_fetch_assoc($run_select_from_new_paper)) {
                            ?>
                                    <option value="<?php echo $row1['designation'] ?>" <?php if ($designation == $row1['designation']) {
                                                                                            echo "selected";
                                                                                        }
                                                                                        ?>><?php echo $row1['designation'] ?>
                                    </option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <!-- <div class="mt-3">
                        <label for="designation">পদবি</label>
                        <select name="designation" id="designation" class="form-control">
                            <option value="">পদবি নির্বাচন করুন</option>
                            <option value="পরিচালক (দায়িত্বপ্রাপ্ত)" <?php if (isset($designation) && $designation == "পরিচালক (দায়িত্বপ্রাপ্ত)") echo "selected" ?>><?php echo $designation; ?></option>
                        </select>
                    </div> -->
                    <div class="mt-3">
                        <label for="duration">মেয়াদকাল</label>
                        <input type="text" name="duration" id="duration" class="form-control" placeholder="পরিচালকের মেয়াদকাল লিখুন" value="<?php echo $duration; ?>">
                    </div>

                    <div class="mt-3">
                        <input type="hidden" name="current_image" value="<?php echo $image; ?>" />
                        <label>পূর্ববর্তী ছবি</label><br>
                        <img src="../Images/director/<?php echo $image ?>" width="100px" alt="director_image">
                    </div>
                    <div class="mt-3">
                        <label for="image">নতুন ছবি সংযুক্তি</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_director" value="Update" class="btn btn-primary">
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