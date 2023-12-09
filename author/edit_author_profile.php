<?php include("author_header.php") ?>
<?php include_once("../validate_server_side.php") ?>

<?php
if (isset($_POST['edit_profile'])) {
    $data = $_POST;

    $loginArr = validateAdminLoginData($conn, $data);
    extract($loginArr);
    // if (isset($_POST["profile_id"])) {
    //     $profile_id = $_POST["profile_id"];

    $current_image = $_POST['current_image'];
    $author_role = $_POST['author_role'];
    $profile_id = $_POST['profile_id'];

    if (!empty($_FILES['image']['name'])) {
        $author_image_name = $_FILES['image']['name'];
        $author_image_tmp_name = $_FILES['image']['tmp_name'];

        $path_info = strtolower(pathinfo($author_image_name, PATHINFO_EXTENSION));

        $author_image_name = uniqid() . ".$path_info";
        // $imageUploadPath = '../Images/author/' . $author_image_name;


        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        } else {
            if (isset($current_image, $author_role) && $current_image !== "" && $author_role === "Teacher") {
                unlink('../Images/author/teacher/' . $current_image);
            } else if (isset($current_image, $author_role) && $current_image !== "" && $author_role === "Student") {
                unlink('../Images/author/student/' . $current_image);
            }
            $update_sql = "UPDATE `author_information` SET `author_name`='$name',`author_email`='$email',`image`='$author_image_name' WHERE author_id='$profile_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                if (isset($author_role) && $author_role === "Teacher") {
                    move_uploaded_file($author_image_tmp_name, '../Images/author/teacher/' . $author_image_name);
                } else if (isset($author_role) && $author_role === "Student") {
                    move_uploaded_file($author_image_tmp_name, '../Images/author/student/' . $author_image_name);
                }
                // $compressedImage = compressImage($author_image_tmp_name, $imageUploadPath, 75);
                echo "<p class='text-success text-bold text-center fs-5 mt-3'>আপনার প্রোফাইলের তথ্য সফলভাবে সংশোধন হয়েছে</p>";
?>
                <script>
                    location.href = location.href;
                </script>
            <?php
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    } else {
        $update_sql = "UPDATE `author_information` SET `author_name`='$name',`author_email`='$email' WHERE author_id='$profile_id'";
        $run_insert_qry = mysqli_query($conn, $update_sql);
        if ($run_insert_qry) {
            // header("location: view_admin_profile.php");
            // ob_end_flush();
            echo "<p class='text-success text-bold text-center fs-5 mt-3'>আপনার প্রোফাইলের তথ্য সফলভাবে সংশোধন হয়েছে</p>";
            ?>
            <script>
                location.href = location.href;
            </script>
<?php
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
        }
    }
}
?>

<?php
if (isset($_GET['profile_id'])) {
    $id = $_GET['profile_id'];

    $select_from_new_paper = "SELECT * FROM author_information WHERE author_id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">আপনার প্রোফাইলের তথ্য সংশোধন</h2>
                <form action="" method="post" enctype="multipart/form-data" onsubmit="return adminFormData()">
                    <input type="hidden" name="profile_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="name">নাম</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="আপনার নাম লিখুন" value="<?php echo $author_name; ?>" onkeyup="validateName()">
                        <span id="name_err" class="text-danger"></span>
                    </div>
                    <div class="mt-3">
                        <label for="email">ইমেইল</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="আপনার ইমেইল লিখুন" value="<?php echo $author_email; ?>" onkeyup="validateEmail()">
                        <span id="email_err" class="text-danger"></span>
                    </div>
                    <div class="mt-3">
                        <label>পূর্ববর্তী ছবি</label><br>
                        <?php
                        if ($author_role === "Teacher") {
                        ?>
                            <img src="../Images/author/teacher/<?php echo $image ?>" width="100px" alt="author_image">
                        <?php
                        } else if ($author_role === "Student") {
                        ?>
                            <img src="../Images/author/student/<?php echo $image ?>" width="100px" alt="author_image">
                        <?php
                        }
                        ?>
                        <input type="hidden" name="current_image" value="<?php echo $image; ?>" />
                        <input type="hidden" name="author_role" value="<?php echo $author_role; ?>" />
                    </div>
                    <div class="mt-3">
                        <label for="image">নতুন ছবি সংযুক্তি</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_profile" value="Update" class="btn btn-primary">
                    </div>
                    <p class="change-password text-right mt-3">
                        পাসওয়ার্ড কি পরিবর্তন করতে চান?
                        <a href="edit_profile_pass.php?profile_pass_id=<?php echo $id; ?>">Change Password</a>
                    </p>
                </form>
                <script src="../validate_client_side.js"></script>
            </div>
        </div>
<?php
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য পাওয়া যায়নি</p>";
    }
}
?>
<?php include_once("author_footer.php") ?>