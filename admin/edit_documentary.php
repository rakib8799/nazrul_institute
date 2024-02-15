<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_documentary'])) {
    extract($_POST);

    if (!empty($_FILES['image']['name'])) {
        $documentary_image_name = $_FILES['image']['name'];
        $documentary_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($documentary_image_name, PATHINFO_EXTENSION));
        $documentary_image_name = uniqid() . ".$path_info";

        $arr = array("jpg", "png", "jpeg");

        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        } else {
            unlink('../Images/documentary/' . $current_image);

            $update_sql = "UPDATE `documentary` SET `title`='$title',`screenplay_name`='$screenplay_name',`image`='$documentary_image_name' WHERE id='$documentary_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($documentary_image_tmp_name, '../Images/documentary/' . $documentary_image_name);

                header("location: view_documentary.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    } else {
        if (!empty($_FILES['pdf_file']['name'])) {
            $pdf_file_name = $_FILES['pdf_file']['name'];
            $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
            $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));
            $pdf_file_name = uniqid() . ".$path_info3";

            $arr3 = array("pdf");
            if (!in_array($path_info3, $arr3)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ফাইলের ফরম্যাট (PDF) হতে হবে</p>";
            } else {
                unlink('../Files/documentary/pdf_file/' . $current_pdf_file);
                $update_sql = "UPDATE `documentary` SET `title`='$title',`screenplay_name`='$screenplay_name',`pdf_file`='$pdf_file_name' WHERE id='$documentary_id'";
                $run_insert_qry = mysqli_query($conn, $update_sql);
                if ($run_insert_qry) {;
                    move_uploaded_file($pdf_file_tmp_name, '../Files/documentary/pdf_file/' . $pdf_file_name);
                    header("location: view_documentary.php");
                    ob_end_flush();
                } else {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
                }
            }
        } else if (!empty($_FILES['image']['name'] && $_FILES['pdf_file']['name'])) {
            $documentary_image_name = $_FILES['image']['name'];
            $documentary_image_tmp_name = $_FILES['image']['tmp_name'];

            $path_info = strtolower(pathinfo($documentary_image_name, PATHINFO_EXTENSION));

            $documentary_image_name = uniqid() . ".$path_info";

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
                unlink('../Images/documentary/' . $current_image);
                unlink('../Files/documentary/pdf_file/' . $current_pdf_file);

                $update_sql = "UPDATE `documentary` SET `title`='$title',`screenplay_name`='$screenplay_name',`image`='$documentary_image_name',`pdf_file`='$pdf_file_name' WHERE id='$documentary_id'";
                $run_insert_qry = mysqli_query($conn, $update_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($documentary_image_tmp_name, '../Images/documentary/' . $documentary_image_name);
                    move_uploaded_file($pdf_file_tmp_name, '../Files/documentary/pdf_file/' . $pdf_file_name);
                    header("location: view_documentary.php");
                    ob_end_flush();
                } else {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
                }
            }
        } else {
            $update_sql = "UPDATE `documentary` SET `title`='$title',`screenplay_name`='$screenplay_name' WHERE id='$documentary_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                header("location: view_documentary.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    }
}
?>

<?php
if (isset($_GET['documentary_id'])) {
    $id = $_GET['documentary_id'];

    $select_from_new_paper = "SELECT * FROM documentary WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">প্রামাণ্যচিত্র সম্পর্কে তথ্য সংশোধন</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="documentary_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="title">শিরোনাম</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $title; ?>" placeholder="শিরোনাম লিখুন">
                    </div>
                    <div class="mt-3">
                        <label for="screenplay_name">চিত্রনাট্য ও পরিচালনা</label>
                        <input type="text" name="screenplay_name" id="screenplay_name" class="form-control" placeholder="চিত্রনাট্য ও পরিচালনার নাম লিখুন" value="<?php echo $screenplay_name; ?>">
                    </div>

                    <div class="mt-3">
                        <label>পূর্ববর্তী ছবি</label><br>
                        <img src="../Images/documentary/<?php echo $image ?>" width="100px" alt="documentary_image">
                        <input type="hidden" name="current_image" value="<?php echo $image; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="image">নতুন ছবি সংযুক্তি</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label>পূর্ববর্তী পিডিএফ ফাইল</label><br>
                        <a href="../Files/journal/pdf_file/<?php echo $pdf_file ?>"><?php echo $pdf_file ?></a>
                        <input type="hidden" name="current_pdf_file" value="<?php echo $pdf_file; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="pdf_file">নতুন পিডিএফ ফাইল সংযুক্তি</label>
                        <input type="file" name="pdf_file" id="pdf_file" class="form-control">
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_documentary" value="Update" class="btn btn-primary">
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