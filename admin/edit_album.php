<?php include("admin_header.php") ?>
<?php include("./functions/compress_image.php") ?>

<?php
if (isset($_POST['edit_album'])) {
    extract($_POST);

    if (!empty($_FILES['image']['name'])) {
        $album_image_name = $_FILES['image']['name'];
        $album_image_tmp_name = $_FILES['image']['tmp_name'];

        $path_info = strtolower(pathinfo($album_image_name, PATHINFO_EXTENSION));

        $album_image_name = uniqid() . ".$path_info";
        // $imageUploadPath = '../Images/album/' . $album_image_name;


        $arr = array("jpg", "png", "jpeg");

        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        } else {
            unlink('../Images/album/' . $current_image);

            $update_sql = "UPDATE `album` SET `title`='$long_desc1',`advisor_name`='$advisor_name',`publisher_name`='$publisher_name',`image`='$album_image_name' WHERE id='$album_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($album_image_tmp_name, '../Images/album/' . $album_image_name);
                // $compressedImage = compressImage($album_image_tmp_name, $imageUploadPath, 75);

                header("location: view_album.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    } else {
        if (!empty($_FILES['pdf_file']['name'])) {
            // $doc_file_name = $_FILES['doc_file']['name'];
            // $doc_file_tmp_name = $_FILES['doc_file']['tmp_name'];
            $pdf_file_name = $_FILES['pdf_file']['name'];
            $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
            // $path_info4 = strtolower(pathinfo($doc_file_name, PATHINFO_EXTENSION));
            $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));
            // $doc_file_name = uniqid() . ".$path_info4";
            $pdf_file_name = uniqid() . ".$path_info3";

            $arr3 = array("pdf");
            // $arr4 = array("doc", "docx");
            if (!in_array($path_info3, $arr3)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ফাইলের ফরম্যাট (PDF) হতে হবে</p>";
            }
            // else if (!in_array($path_info4, $arr4)) {
            //     echo "<p class='text-danger text-bold text-center fs-5 mt-3'>File must be in doc or docx format</p>";
            // }
            else {
                // unlink('../Files/album/doc_file/' . $current_doc_file);
                unlink('../Files/album/pdf_file/' . $current_pdf_file);
                $update_sql = "UPDATE `album` SET `title`='$long_desc1',`advisor_name`='$advisor_name',`publisher_name`='$publisher_name',`pdf_file`='$pdf_file_name' WHERE id='$album_id'";
                $run_insert_qry = mysqli_query($conn, $update_sql);
                if ($run_insert_qry) {
                    // move_uploaded_file($doc_file_tmp_name, '../Files/album/doc_file/' . $doc_file_name);
                    move_uploaded_file($pdf_file_tmp_name, '../Files/album/pdf_file/' . $pdf_file_name);
                    header("location: view_album.php");
                    ob_end_flush();
                } else {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
                }
            }
        } else if (!empty($_FILES['image']['name'] && $_FILES['pdf_file']['name'])) {
            $album_image_name = $_FILES['image']['name'];
            $album_image_tmp_name = $_FILES['image']['tmp_name'];

            $path_info = strtolower(pathinfo($album_image_name, PATHINFO_EXTENSION));

            $album_image_name = uniqid() . ".$path_info";
            // $imageUploadPath = '../Images/album/' . $album_image_name;


            $arr = array("jpg", "png", "jpeg");

            // $doc_file_name = $_FILES['doc_file']['name'];
            // $doc_file_tmp_name = $_FILES['doc_file']['tmp_name'];
            $pdf_file_name = $_FILES['pdf_file']['name'];
            $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
            // $path_info4 = strtolower(pathinfo($doc_file_name, PATHINFO_EXTENSION));
            $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));
            // $doc_file_name = uniqid() . ".$path_info4";
            $pdf_file_name = uniqid() . ".$path_info3";

            $arr3 = array("pdf");
            // $arr4 = array("doc", "docx");

            if (!in_array($path_info, $arr)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
            } else if (!in_array($path_info3, $arr3)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ফাইলের ফরম্যাট (PDF) হতে হবে</p>";
            } else {
                unlink('../Images/album/' . $current_image);
                unlink('../Files/album/pdf_file/' . $current_pdf_file);
                $update_sql = "UPDATE `album` SET `title`='$long_desc1',`advisor_name`='$advisor_name',`publisher_name`='$publisher_name',`image`='$album_image_name',`pdf_file`='$pdf_file_name' WHERE id='$album_id'";
                $run_insert_qry = mysqli_query($conn, $update_sql);
                if ($run_insert_qry) {
                    move_uploaded_file($album_image_tmp_name, '../Images/album/' . $album_image_name);
                    // $compressedImage = compressImage($album_image_tmp_name, $imageUploadPath, 75);

                    move_uploaded_file($pdf_file_tmp_name, '../Files/album/pdf_file/' . $pdf_file_name);
                    header("location: view_album.php");
                    ob_end_flush();
                } else {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
                }
            }
        } else {
            $update_sql = "UPDATE `album` SET `title`='$long_desc1',`advisor_name`='$advisor_name',`publisher_name`='$publisher_name' WHERE id='$album_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                header("location: view_album.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    }
}




// if (isset($_POST['edit_album'])) {
//     extract($_POST);

//     if (!empty($_FILES['image']['name'])) {
//         $album_image_name = $_FILES['image']['name'];
//         $album_image_tmp_name = $_FILES['image']['tmp_name'];

//         $path_info = strtolower(pathinfo($album_image_name, PATHINFO_EXTENSION));

//         $album_image_name = uniqid() . ".$path_info";
//         // $imageUploadPath = '../Images/album/' . $album_image_name;


//         $arr = array("jpg", "png", "jpeg");

//         if (!in_array($path_info, $arr)) {
//             echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
//         } else {
//             unlink('../Images/album/' . $current_image);

//             $update_sql = "UPDATE `album` SET `title`='$long_desc1',`advisor_name`='$advisor_name',`publisher_name`='$publisher_name',`image`='$album_image_name' WHERE id='$album_id'";
//             $run_insert_qry = mysqli_query($conn, $update_sql);
//             if ($run_insert_qry) {
//                 move_uploaded_file($album_image_tmp_name, '../Images/album/' . $album_image_name);
//                 // $compressedImage = compressImage($album_image_tmp_name, $imageUploadPath, 75);

//                 header("location: view_album.php");
//                 ob_end_flush();
//             } else {
//                 echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
//             }
//         }
//     } else {
//         $update_sql = "UPDATE `album` SET `title`='$long_desc1',`advisor_name`='$advisor_name',`publisher_name`='$publisher_name' WHERE id='$album_id'";
//         $run_insert_qry = mysqli_query($conn, $update_sql);
//         if ($run_insert_qry) {
//             header("location: view_album.php");
//             ob_end_flush();
//         } else {
//             echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is updated</p>";
//         }
//     }
// }
?>

<?php
if (isset($_GET['album_id'])) {
    $id = $_GET['album_id'];

    $select_from_new_paper = "SELECT * FROM album WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">অ্যালবাম সম্পর্কে তথ্য সংশোধন</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="album_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="long_desc1">শিরোনাম</label>
                        <textarea name="long_desc1" class="long_desc" id="long_desc1"><?php echo $title; ?></textarea>
                    </div>
                    <div class="mt-3">
                        <label for="advisor_name">উপদেষ্টা</label>
                        <input type="text" name="advisor_name" id="advisor_name" class="form-control" placeholder="উপদেষ্টার নাম লিখুন" value="<?php echo $advisor_name; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="publisher_name">সম্পাদনা <small class="text-danger">(*একাধিক সম্পাদক হলে কমা দিয়ে আলাদা করুন)</small></label>
                        <input type="text" name="publisher_name" id="publisher_name" class="form-control" placeholder="সম্পাদকের নাম লিখুন" value="<?php echo $publisher_name; ?>">
                    </div>

                    <div class="mt-3">
                        <input type="hidden" name="current_image" value="<?php echo $image; ?>" />
                        <label>পূর্ববর্তী ছবি</label><br>
                        <img src="../Images/album/<?php echo $image ?>" width="100px" alt="album_image">
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
                        <input type="submit" name="edit_album" value="Update" class="btn btn-primary">
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