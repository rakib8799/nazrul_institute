<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_art_camp'])) {
    extract($_POST);

    if (!empty($_FILES['files']['name'])) {
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

        $imgIndex = 0;

        if (isset($current_image) && !empty($current_image)) {
            while ($imgIndex < count($current_image)) {
                unlink('../Images/art_camp/' . $current_image[$imgIndex]);

                $imgIndex++;
            }
        }

        $insertValuesSQL = trim($insertValuesSQL, ',');


        $update_sql = "UPDATE `art_camp` SET `title`='$title',`details`='$long_desc1',`image`='$insertValuesSQL' WHERE id='$art_camp_id'";
        $run_insert_qry = mysqli_query($conn, $update_sql);
        if ($run_insert_qry) {

            header("location: view_art_camp.php");
            ob_end_flush();
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
        }
    } else {
        $update_sql = "UPDATE `art_camp` SET `title`='$title',`details`='$long_desc1' WHERE id='$art_camp_id'";
        $run_insert_qry = mysqli_query($conn, $update_sql);
        if ($run_insert_qry) {
            header("location: view_art_camp.php");
            ob_end_flush();
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
        }
    }
}
?>

<?php
if (isset($_GET['art_camp_id'])) {
    $id = $_GET['art_camp_id'];

    $select_from_new_paper = "SELECT * FROM art_camp WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
        $imgIndex = 0;
        $images = explode(",", $image);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">আর্ট ক্যাম্প সম্পর্কে তথ্য সংশোধন</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="art_camp_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="title">শিরোনাম</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $title ?>" placeholder="শিরোনাম লিখুন">
                    </div>
                    <div class="mt-3">
                        <label for="long_desc1">বিস্তারিত</label>
                        <textarea name="long_desc1" class="long_desc" id="long_desc1"><?php echo $details ?></textarea>
                    </div>
                    <div class="mt-3">
                        <label>পূর্ববর্তী ছবি</label><br>
                        <?php
                        if (count($images) > 1) {
                            while ($imgIndex < count($images)) {
                        ?>
                                <input type="hidden" name="current_image[]" value="<?php echo $images[$imgIndex]; ?>" />
                                <img src="../Images/art_camp/<?php echo $images[$imgIndex] ?>" width="100px" alt="art_camp_image">
                                <!-- <img src="../Images/art_camp/<?php echo $images[$imgIndex] ?>" width='50px' height='50px'> -->
                            <?php
                                $imgIndex++;
                            }
                        } else {
                            ?>
                            <input type="hidden" name="current_image" value="<?php echo $image; ?>" />
                            <img src="../Images/art_camp/<?php echo $image ?>" width='100px'>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- <div class="mt-3">
                        <input type="hidden" name="current_image" value="<?php echo $image; ?>" />
                        <label>পূর্ববর্তী ছবি</label><br>
                        <img src="../Images/art_camp/<?php echo $image ?>" width="100px" alt="art_camp_image">
                    </div> -->
                    <div class="mt-3">
                        <label for="image">নতুন ছবি সংযুক্তি</label>
                        <input type="file" name="files[]" id="image" class="form-control" multiple>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_art_camp" value="Update" class="btn btn-primary">
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