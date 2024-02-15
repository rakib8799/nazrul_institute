<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_conference'])) {
    extract($_POST);

    if (!empty($_FILES['image']['name']) && empty($_FILES['pdf_file']['name'])) {
        $conference_image_name = $_FILES['image']['name'];
        $conference_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($conference_image_name, PATHINFO_EXTENSION));
        $conference_image_name = uniqid() . ".$path_info";

        $arr = array("jpg", "png", "jpeg");

        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        } else {
            unlink('../Images/conference/' . $current_image);

            $update_sql = "UPDATE `conference` SET `title`='$title', `details`='$long_desc1', `image`='$conference_image_name' WHERE id='$conference_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($conference_image_tmp_name, '../Images/conference/' . $conference_image_name);

                header("location: view_conference.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    } else {
        if (!empty($_FILES['pdf_file']['name']) && empty($_FILES['image']['name'])) {
            $pdf_file_name = $_FILES['pdf_file']['name'];
            $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
            $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));
            $pdf_file_name = uniqid() . ".$path_info3";

            $arr3 = array("pdf");
            if (!in_array($path_info3, $arr3)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ফাইলের ফরম্যাট (PDF) হতে হবে</p>";
            } else {
                unlink('../Files/conference/pdf_file/' . $current_pdf_file);

                $update_sql = "UPDATE `conference` SET `title`='$title', `details`='$long_desc1', `pdf_file`='$pdf_file_name' WHERE id='$conference_id'";
                $run_insert_qry = mysqli_query($conn, $update_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($pdf_file_tmp_name, '../Files/conference/pdf_file/' . $pdf_file_name);
                    header("location: view_conference.php");
                    ob_end_flush();
                } else {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
                }
            }
        } else if (!empty($_FILES['image']['name'] && $_FILES['pdf_file']['name'])) {
            $conference_image_name = $_FILES['image']['name'];
            $conference_image_tmp_name = $_FILES['image']['tmp_name'];

            $path_info = strtolower(pathinfo($conference_image_name, PATHINFO_EXTENSION));

            $conference_image_name = uniqid() . ".$path_info";

            $arr = array("jpg", "png", "jpeg");

            $pdf_file_name = $_FILES['pdf_file']['name'];
            $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
            $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));
            $pdf_file_name = uniqid() . ".$path_info3";

            $arr3 = array("pdf");

            if (!in_array($path_info, $arr)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
            } else if (!in_array($path_info3, $arr3)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ফাইলের ফরম্যাট (PDF) হতে হবে</p>";
            } else {
                unlink('../Images/conference/' . $current_image);
                unlink('../Files/conference/pdf_file/' . $current_pdf_file);

                $update_sql = "UPDATE `conference` SET `title`='$title', `details`='$long_desc1', `image`='$conference_image_name', `pdf_file`='$pdf_file_name' WHERE id='$conference_id'";
                $run_insert_qry = mysqli_query($conn, $update_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($conference_image_tmp_name, '../Images/conference/' . $conference_image_name);
                    move_uploaded_file($pdf_file_tmp_name, '../Files/conference/pdf_file/' . $pdf_file_name);
                    header("location: view_conference.php");
                    ob_end_flush();
                } else {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
                }
            }
        } else {
            $update_sql = "UPDATE `conference` SET `title`='$title', `details`='$long_desc1' WHERE id='$conference_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                header("location: view_conference.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    }
}
?>

<?php
if (isset($_GET['conference_id'])) {
    $id = $_GET['conference_id'];

    $select_from_new_paper = "SELECT * FROM conference WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">কনফারেন্স সম্পর্কে তথ্য সংশোধন</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="conference_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="title">শিরোনাম</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="কনফারেন্সের শিরোনাম লিখুন" value="<?php echo $title; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="long_desc1">বিস্তারিত</label>
                        <textarea name="long_desc1" class="long_desc" id="long_desc1"><?php echo $details ?></textarea>
                    </div>
                    <div class="mt-3">
                        <label>পূর্ববর্তী ছবি</label><br>
                        <img src="../Images/conference/<?php echo $image ?>" width="100px" alt="conference_image">
                        <input type="hidden" name="current_image" value="<?php echo $image; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="image">নতুন ছবি সংযুক্তি</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label>পূর্ববর্তী পিডিএফ ফাইল</label><br>
                        <a href="../Files/conference/pdf_file/<?php echo $pdf_file ?>"><?php echo $pdf_file ?></a>
                        <input type="hidden" name="current_pdf_file" value="<?php echo $pdf_file; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="pdf_file">নতুন পিডিএফ ফাইল সংযুক্তি</label>
                        <input type="file" name="pdf_file" id="pdf_file" class="form-control">
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_conference" value="Update" class="btn btn-primary">
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