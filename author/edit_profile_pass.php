<?php include("author_header.php") ?>
<?php include_once("../validate_server_side.php") ?>

<?php
if (isset($_POST['edit_profile_pass'])) {
    $data = $_POST;

    $loginArr = validateAdminLoginPassData($conn, $data);
    extract($loginArr);

    if (isset($_POST["profile_pass_id"])) {
        $profile_pass_id = $_POST["profile_pass_id"];

        $sql = "SELECT * FROM author_information where author_id = $profile_pass_id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $password = $row['author_password'];
                if (password_verify($previous_password, $password)) {
                    if ($new_password === $retype_new_password) {
                        $enc_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                        $sql1 = "UPDATE author_information SET author_password = '$enc_new_password' WHERE author_id = $profile_pass_id";
                        $result1 = mysqli_query($conn, $sql1);
                        if ($result1) {
                            echo "<p class='text-success text-center fs-5 mt-3'>পাসওয়ার্ড সফলভাবে সংশোধন হয়েছে। আপনি এখন থেকে নতুন পাসওয়ার্ড দিয়ে লগইন করতে পারবেন।</p>";
                        } else {
                            echo "<p class='text-danger fw-bold text-center fs-5 mt-3'>পাসওয়ার্ড সংশোধন হয়নি।</p>";
                        }
                    } else {
                        echo "<p class='text-danger fw-bold text-center fs-5 mt-3'>নতুন পাসওয়ার্ড ও পুনরায় টাইপ করা পাসওয়ার্ড মিলেনি</p>";
                    }
                } else {
                    echo "<p class='text-danger fw-bold text-center fs-5 mt-3'>বর্তমান পাসওয়ার্ড সঠিক নয়। আবার চেষ্টা করুন।</p>";
                }
            }
        }
    }
}
?>

<?php
if (isset($_GET['profile_pass_id'])) {
    $id = $_GET['profile_pass_id'];

    $select_from_new_paper = "SELECT * FROM author_information WHERE author_id=$id";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper);
        extract($row);
?>
        <div class="container-fluid mt-5 d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <h2 class="text-capitalize text-center mt-5">পাসওয়ার্ড পরিবর্তন করুন</h2>
                <form action="" method="post">
                    <input type="hidden" name="profile_pass_id" value="<?php echo $id; ?>" />
                    <div class="mt-3">
                        <label for="previous_password">বর্তমান পাসওয়ার্ড</label>
                        <input type="password" name="previous_password" id="previous_password" class="form-control" placeholder="আপনার বর্তমান পাসওয়ার্ড লিখুন" required>
                        <span id="previous_password_err" class="text-danger"></span>
                    </div>
                    <div class="mt-3">
                        <label for="new_password">নতুন পাসওয়ার্ড</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="নতুন পাসওয়ার্ড সেট করুন" required>
                        <span id="new_password_err" class="text-danger"></span>
                    </div>
                    <div class="mt-3">
                        <label for="retype_new_password">পুনরায় নতুন পাসওয়ার্ড লিখুন</label>
                        <input type="password" name="retype_new_password" id="retype_new_password" class="form-control" placeholder="নতুন পাসওয়ার্ড আবার লিখুন" required>
                        <span id="retype_new_password_err" class="text-danger"></span>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="edit_profile_pass" value="Update" class="btn btn-primary">
                    </div>
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