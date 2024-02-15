<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_staff'])) {
    extract($_POST);

    if (!empty($_FILES['image']['name'])) {
        $staff_image_name = $_FILES['image']['name'];
        $staff_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($staff_image_name, PATHINFO_EXTENSION));
        $staff_image_name = uniqid() . ".$path_info";

        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        } else {
            unlink('../Images/staff/' . $current_image);
            $update_sql = "UPDATE `staffs` SET `name`='$name',`designation`='$designation',`image`='$staff_image_name' WHERE id='$staff_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($staff_image_tmp_name, '../Images/staff/' . $staff_image_name);

                header("location: view_staffs.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    } else {
        $update_sql = "UPDATE `staffs` SET `name`='$name',`designation`='$designation' WHERE id='$staff_id'";
        $run_insert_qry = mysqli_query($conn, $update_sql);
        if ($run_insert_qry) {
            header("location: view_staffs.php");
            ob_end_flush();
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
        }
    }
}
?>

<?php
if (isset($_GET['staff_id'])) {
    $id = $_GET['staff_id'];

    $select_from_new_paper = "SELECT * FROM staffs WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">কর্মরত কর্মচারীবৃন্দের তথ্য সংশোধন</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mt-3">
                        <input type="hidden" name="staff_id" value="<?php echo $id; ?>" />

                        <label for="name">নাম</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
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
                    <div class="mt-3">
                        <label>পূর্ববর্তী ছবি</label><br>
                        <img src="../Images/staff/<?php echo $image ?>" width="100px" alt="staff_image">
                        <input type="hidden" name="current_image" value="<?php echo $image; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="image">নতুন ছবি সংযুক্তি</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_staff" value="Update" class="btn btn-primary">
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