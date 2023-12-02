<?php require_once('database/connection.php') ?>
<?php include_once('linker.php') ?>
<a href="index.php" class="btn btn-primary m-auto d-flex justify-content-center text-center">Return to Home</a>
<?php
if (isset($_POST["verify_email"])) {
    $email = $_POST["email"];
    $verification_code = $_POST["verification_code"];

    // mark email as verified
    $sql = "UPDATE author_information SET email_verified_at = NOW() WHERE author_email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
    $result  = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) == 0) {
?>
        <section>
            <div class="container my-5 d-flex justify-content-center align-items-center">
                <div class="col-md-5 col-12">
                    <div class="card rounded m-auto py-4 px-5 shadow">
                        <h3 class="text-danger fw-bold text-center fs-5">Verification code is failed.</h3>
                        <div class="mt-3">
                            <a href='email-verification.php?email=<?php echo $email; ?>' class='btn btn-primary'>Try again</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
        include 'footer.php';
        exit();
    } else {
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
        include 'footer.php';
        exit();
    }
}

?>
<section>
    <div class="container my-5 d-flex justify-content-center align-items-center">
        <div class="col-md-5 col-12">
            <p class='text-success fw-bold text-center fs-5 mt-3'>Email verification code has sent to your email address</p>
            <div class="card rounded m-auto py-4 px-5 shadow">
                <form action="" method="post">
                    <h3 class="text-center">Email Confirmation</h3>
                    <div>

                        <input type="hidden" name="email" value="<?php if (isset($_GET['email'])) echo $_GET['email']; ?>">
                        <!-- <label class="my-2" for="verification_code">Email Verification Code</label> -->
                        <input type="number" name="verification_code" class="form-control mt-4" placeholder="Enter verification code" required />
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="verify_email" value="Verify Email" class="btn btn-primary">

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include_once('footer.php') ?>