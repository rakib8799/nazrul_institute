<?php require_once('database/connection.php') ?>
<?php include_once('linker.php') ?>
<?php include_once('mail_sending.php') ?>
<a href="index.php" class="btn btn-primary m-auto d-flex justify-content-center text-center">Return to Home</a>


<?php
if (isset($_POST['submit_password'])) {
    extract($_POST);
    if ($password === $confirm_password) {
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        if (isset($_SESSION['author_password']) && $encrypted_password !== $_SESSION['author_password']) {
            $update = "UPDATE author_information SET author_password='$encrypted_password' WHERE author_email='$email'";
            $update_qry = mysqli_query($conn, $update);

            echo "<p class='text-success fw-bold text-center fs-5 mt-3'>Your password has been updated successfully</p>";
?>
            <section>
                <div class="container my-5 d-flex justify-content-center align-items-center">
                    <div class="col-md-5 col-12">
                        <div class="card rounded m-auto py-4 px-5 shadow">
                            <h3 class="text-center">You can login now</h3>
                            <div class="mt-3">
                                <a href='login.php' class='btn btn-primary'>Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php
            // header("location: login.php");
            // ob_end_flush();
        } else {
            echo "<p class='text-danger fw-bold text-center fs-5 mt-3'>Old password is not allowed</p>";
        }
    } else {
        echo "<p class='text-danger fw-bold text-center fs-5 mt-3'>Both passwords are not Matched.</p>";
    }
}
?>


<?php
if (isset($_GET['key'], $_GET['reset'])) {
    $email = $_GET['key'];
    $password = $_GET['reset'];
    $_SESSION['author_password'] = $password;
    $sql = "SELECT author_email,author_password FROM author_information WHERE author_email='$email' AND author_password='$password'";
    $select = mysqli_query($conn, $sql);
    if (mysqli_num_rows($select) == 1) {
?>
        <section>
            <div class="container my-5 d-flex justify-content-center align-items-center">
                <div class="col-md-5 col-12">
                    <div class="card rounded m-auto py-4 px-5 shadow">
                        <h3 class="text-center">Update Password</h3>
                        <form method="post" action="">
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                            <div class="mb-3">
                                <label for="password">New password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter New password" required />
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password">Confirm New password</label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Please confirm your password" required />
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn-primary" name="submit_password">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
<?php
    }
}
?>
<?php include_once('footer.php') ?>