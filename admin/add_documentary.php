<?php include("admin_header.php") ?>
<?php include("./functions/compress_image.php") ?>

<?php
if (isset($_POST['add_documentary'])) {
    extract($_POST);

    if (isset($_FILES['image']['name'], $_FILES['pdf_file']['name']) && $_FILES['pdf_file']['name'] !== "") {
        $documentary_image_name = $_FILES['image']['name'];
        $documentary_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($documentary_image_name, PATHINFO_EXTENSION));
        $documentary_image_name = uniqid() . ".$path_info";
        // $imageUploadPath = '../Images/documentary/' . $documentary_image_name;


        $arr = array("jpg", "png", "jpeg");

        // $doc_file_name = $_FILES['doc_file']['name'];
        // $doc_file_tmp_name = $_FILES['doc_file']['tmp_name'];
        $pdf_file_name = $_FILES['pdf_file']['name'];
        $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
        // $path_info4 = strtolower(pathinfo($doc_file_name, PATHINFO_EXTENSION));
        $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));
        // $doc_file_name = uniqid() . ".$path_info4";
        $pdf_file_name = uniqid() . ".$path_info3";

        // $arr4 = array("doc", "docx");
        $arr3 = array("pdf");

        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        }
        if (in_array($path_info, $arr) && !in_array($path_info3, $arr3)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ফাইলের ফরম্যাট (PDF) হতে হবে</p>";
        } else {
            $insert_sql = "INSERT INTO `documentary`(`title`,`screenplay_name`,`image`,`pdf_file`) VALUES('$long_desc1','$screenplay_name','$documentary_image_name','$pdf_file_name')";

            $run_insert_qry = mysqli_query($conn, $insert_sql);
            if ($run_insert_qry) {
                move_uploaded_file($documentary_image_tmp_name, '../Images/documentary/' . $documentary_image_name);
                // $compressedImage = compressImage($documentary_image_tmp_name, $imageUploadPath, 75);

                move_uploaded_file($pdf_file_tmp_name, '../Files/documentary/pdf_file/' . $pdf_file_name);

                header("location: view_documentary.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
            }
        }
    } else  if (isset($_FILES['pdf_file']['name']) && $_FILES['pdf_file']['name'] === "") {
        $documentary_image_name = $_FILES['image']['name'];
        $documentary_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($documentary_image_name, PATHINFO_EXTENSION));
        $documentary_image_name = uniqid() . ".$path_info";
        // $imageUploadPath = '../Images/documentary/' . $documentary_image_name;


        $arr = array("jpg", "png", "jpeg");

        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        } else {
            $insert_sql = "INSERT INTO `documentary`(`title`,`screenplay_name`,`image`) VALUES('$long_desc1','$screenplay_name','$documentary_image_name')";

            $run_insert_qry = mysqli_query($conn, $insert_sql);
            if ($run_insert_qry) {
                move_uploaded_file($documentary_image_tmp_name, '../Images/documentary/' . $documentary_image_name);
                // $compressedImage = compressImage($documentary_image_tmp_name, $imageUploadPath, 75);

                header("location: view_documentary.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো নতুন তথ্য ইনসার্ট হয়নি</p>";
            }
        }
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো ফাইল পাওয়া যায়নি</p>";
    }



    // if (isset($_FILES['image']['name'])) {
    //     $documentary_image_name = $_FILES['image']['name'];
    //     $documentary_image_tmp_name = $_FILES['image']['tmp_name'];
    //     $path_info = strtolower(pathinfo($documentary_image_name, PATHINFO_EXTENSION));
    //     $documentary_image_name = uniqid() . ".$path_info";
    //     // $imageUploadPath = '../Images/documentary/' . $documentary_image_name;


    //     $arr = array("jpg", "png", "jpeg");

    //     if (!in_array($path_info, $arr)) {
    //         echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Image must be jpg, jpeg or png format</p>";
    //     } else {
    //         $insert_sql = "INSERT INTO `documentary`(`title`,`screenplay_name`,`image`) VALUES('$long_desc1','$screenplay_name','$documentary_image_name')";

    //         $run_insert_qry = mysqli_query($conn, $insert_sql);
    //         if ($run_insert_qry) {
    //             move_uploaded_file($documentary_image_tmp_name, '../Images/documentary/' . $documentary_image_name);
    //             // $compressedImage = compressImage($documentary_image_tmp_name, $imageUploadPath, 75);



    //             header("location: view_documentary.php");
    //             ob_end_flush();
    //         } else {
    //             echo "<p class='text-danger text-bold text-center fs-5 mt-3'>No data is inserted</p>";
    //         }
    //     }
    // } else {
    //     echo "<p class='text-danger text-bold text-center fs-5 mt-3'>File is not found</p>";
    // }
}
?>
<div class="container-fluid  mt-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <h2 class="text-capitalize text-center">প্রামাণ্যচিত্র সম্পর্কে তথ্য সংযুক্তি</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="long_desc1">শিরোনাম</label>
                <textarea name="long_desc1" class="long_desc" id="long_desc1" required></textarea>
            </div>
            <div class="mt-3">
                <label for="screenplay_name">চিত্রনাট্য ও পরিচালনা</label>
                <input type="text" name="screenplay_name" id="screenplay_name" class="form-control" placeholder="চিত্রনাট্য ও পরিচালনার নাম লিখুন" required>
            </div>
            <div class="mt-3">
                <label for="image">ছবি</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
            <div class="mt-3">
                <label for="pdf_file">পিডিএফ ফাইল সংযুক্তি</label>
                <input type="file" name="pdf_file" id="pdf_file" class="form-control">
            </div>
            <div class="mt-3">
                <input type="submit" name="add_documentary" value="Add" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>

<?php include("admin_footer.php") ?>