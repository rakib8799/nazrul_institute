<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_infrastructure'])) {
    extract($_POST);

    if (!empty($_FILES['image']['name'])) {
        $infrastructure_image_name = $_FILES['image']['name'];
        $infrastructure_image_tmp_name = $_FILES['image']['tmp_name'];

        $path_info = strtolower(pathinfo($infrastructure_image_name, PATHINFO_EXTENSION));

        $infrastructure_image_name = uniqid() . ".$path_info";

        $arr = array("jpg", "png", "jpeg");

        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        } else {
            if (!empty($current_image)) unlink('../Images/infrastructure/' . $current_image);

            $update_sql = "UPDATE `infrastructure` SET `title`='$title',`details`='$long_desc1', `image`='$infrastructure_image_name' WHERE id='$infrastructure_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($infrastructure_image_tmp_name, '../Images/infrastructure/' . $infrastructure_image_name);

                header("location: view_infrastructure.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    } else {
        $update_sql = "UPDATE `infrastructure` SET `title`='$title',`details`='$long_desc1' WHERE id='$infrastructure_id'";
        $run_insert_qry = mysqli_query($conn, $update_sql);
        if ($run_insert_qry) {
            header("location: view_infrastructure.php");
            ob_end_flush();
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
        }
    }
}
?>

<?php
if (isset($_GET['infrastructure_id'])) {
    $id = $_GET['infrastructure_id'];

    $select_from_new_paper = "SELECT * FROM infrastructure WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">অবকাঠামো সম্পর্কে তথ্য সংশোধন</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="infrastructure_id" value="<?php echo $id; ?>" />
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
                        <img src="../Images/infrastructure/<?php echo $image ?>" width="100px" alt="infrastructure_image">
                        <input type="hidden" name="current_image" value="<?php echo $image; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="image">নতুন ছবি সংযুক্তি</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_infrastructure" value="Update" class="btn btn-primary">
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