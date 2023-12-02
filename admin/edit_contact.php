<?php include("admin_header.php") ?>

<?php
if (isset($_POST['edit_contact'])) {
    extract($_POST);

    $update_sql = "UPDATE `contact` SET `email`='$email',`location`='$location',`contact`='$contact' WHERE id='$contact_id'";
    $run_insert_qry = mysqli_query($conn, $update_sql);
    if ($run_insert_qry) {
        header("location: view_contact.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য সংশোধন হয়নি</p>";
    }
}
?>

<?php
if (isset($_GET['contact_id'])) {
    $id = $_GET['contact_id'];

    $select_from_new_paper = "SELECT * FROM contact WHERE id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid  mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center">ইন্সটিটিউটের সাথে যোগাযোগের তথ্য সংশোধন</h2>
                <form action="" method="post">
                    <input type="hidden" name="contact_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="email">ইমেইল</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="ইন্সটিটিউটের ইমেইল লিখুন" value="<?php echo $email ?>" required>
                    </div>
                    <div class="mt-3">
                        <label for="location">ঠিকানা</label>
                        <input type="text" name="location" id="location" class="form-control" placeholder="ইন্সটিটিউটের ঠিকানা লিখুন" value="<?php echo $location ?>" required>
                    </div>
                    <div class="mt-3">
                        <label for="contact">মোবাইল/টেলিফোন</label>
                        <input type="text" name="contact" id="contact" class="form-control" placeholder="ইন্সটিটিউটের মোবাইল/টেলিফোন নাম্বার লিখুন" value="<?php echo $contact ?>" required>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_contact" value="Update" class="btn btn-primary">
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