<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_news'])) {
    extract($_POST);

    if (!empty($_FILES['image']['name'])) {
        $news_image_name = $_FILES['image']['name'];
        $news_image_tmp_name = $_FILES['image']['tmp_name'];
        $path_info = strtolower(pathinfo($news_image_name, PATHINFO_EXTENSION));
        $news_image_name = uniqid() . ".$path_info";

        $arr = array("jpg", "png", "jpeg");
        if (!in_array($path_info, $arr)) {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ছবির ফরম্যাট (JPG or JPEG or PNG) হতে হবে</p>";
        } else {
            unlink('../Images/news/' . $current_image);
            $update_sql = "UPDATE `news` SET `title`='$title', `details`='$long_desc1',`image`='$news_image_name' WHERE id='$news_id'";
            $run_insert_qry = mysqli_query($conn, $update_sql);
            if ($run_insert_qry) {
                move_uploaded_file($news_image_tmp_name, '../Images/news/' . $news_image_name);

                header("location: view_news.php");
                ob_end_flush();
            } else {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
            }
        }
    } else {
        $update_sql = "UPDATE `news` SET `title`='$title', `details`='$long_desc1' WHERE id='$news_id'";
        $run_insert_qry = mysqli_query($conn, $update_sql);
        if ($run_insert_qry) {
            header("location: view_news.php");
            ob_end_flush();
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
        }
    }
}
?>


<?php
if (isset($_GET['news_id'])) {
    $id = $_GET['news_id'];

    $select_from_new_paper = "SELECT * FROM news WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">সংবাদের তথ্য সংশোধন</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="news_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="title">শিরোনাম</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="সংবাদের শিরোনাম লিখুন" value="<?php echo $title; ?>" required>
                    </div>
                    <div class="mt-3">
                        <label for="long_desc1">বিস্তারিত</label>
                        <textarea name="long_desc1" class="long_desc" id="long_desc1" placeholder="সংবাদ নিয়ে বিস্তারিত" required>
                            <?php echo $details; ?>
                        </textarea>
                    </div>
                    <div class="mt-3">
                        <input type="hidden" name="current_image" value="<?php echo $image; ?>" />
                        <label>পূর্ববর্তী ছবি</label><br>
                        <img src="../Images/news/<?php echo $image ?>" width="100px" alt="news_image">
                    </div>
                    <div class="mt-3">
                        <label for="image">নতুন ছবি সংযুক্তি</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_news" value="Update" class="btn btn-primary">
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