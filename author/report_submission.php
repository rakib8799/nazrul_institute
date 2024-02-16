<?php include('author_header.php') ?>
<?php include('../mail_sending.php') ?>

<?php
if (isset($_SESSION['author_role'], $_SESSION['author_id'], $_SESSION['author_email']) && $_SESSION['author_role'] === 'Student') {
    $researcher_author_id = $_SESSION['author_id'];
    $author_email = $_SESSION['author_email'];
    if (isset($_POST['submit'])) {
        // if (isset($_SESSION['researcher_final_report_file']) && $_SESSION['researcher_final_report_file'] == 'N/A') {
        extract($_POST);

        if (isset($_FILES['pdf_file']['name'])) {
            $pdf_file_name = $_FILES['pdf_file']['name'];
            $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
            $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));

            $pdf_file_name = uniqid() . ".$path_info3";


            $arr3 = array("pdf");
            if (!in_array($path_info3, $arr3)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ফাইলের ফরম্যাট (PDF) হতে হবে</p>";
            } else {
                $select_from_new_paper = "SELECT * FROM `project_submission_student` WHERE researcher_author_id='$researcher_author_id' AND researcher_email='$author_email' AND paper_status=1";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                    $row = mysqli_fetch_assoc($run_select_from_new_paper);
                    extract($row);

                    // $_SESSION['researcher_notice_id'] = $researcher_notice_id;

                    if ($researcher_final_report_file !== 'N/A') {
                        echo "<p style='height: 80vh;' class='text-danger text-bold text-center fs-3 mt-3 d-flex justify-content-center align-items-center'>আপনি ইতিমধ্যে প্রকল্পের চূড়ান্ত প্রতিবেদন জমা দিয়েছেন। তাই আপাতত আর কোনো প্রতিবেদন জমা দিতে পারবেন না।</p>";
                    } else {
                        $update_sql = "UPDATE `project_submission_student` SET `researcher_final_report_file`='$pdf_file_name' WHERE researcher_author_id='$researcher_author_id' AND researcher_email='$author_email' AND  researcher_final_report_file='N/A' AND paper_status=1";
                        $run_insert_qry = mysqli_query($conn, $update_sql);
                        if ($run_insert_qry) {
                            // move_uploaded_file($doc_file_tmp_name, '../Files/notices/doc_file/' . $doc_file_name);
                            move_uploaded_file($pdf_file_tmp_name, '../Files/project_submission_student/pdf_file/report/' . $pdf_file_name);

                            // $_SESSION['researcher_final_report_file'] = $researcher_final_report_file;

                            $receiver = $_SESSION['author_email'];
                            $subject = "Confirmation of Project Final Report Submission";
                            $body = '<p>Dear Researcher(ID-' . $researcher_author_id . '),<br/>Thank you very much for uploading the final report of your project.<br/><br/>

                    Best Regards,<br/>
                    Director of the Institute of Nazrul Studies,<br/>
                    Jatiya Kabi Kazi Nazrul Islam University,
                    Trishal, Mymensingh-2224, Bangladesh <br/>
                    E-Mail: <a href="ins.jkkniu@gmail.com">ins.jkkniu@gmail.com</a>
                    </p>';
                            $send_mail = send_mail($receiver, $subject, $body);
?>
                            <script>
                                // let text = "Do you really want to submit the paper?";
                                // if (confirm(text) == true) {
                                window.alert("আপনার প্রকল্পের চূড়ান্ত প্রতিবেদনটি সফলভাবে সাবমিট হয়েছে। আপনাকে একটি কনফার্মেশন ইমেইল পাঠানো হয়েছে।");
                                window.location = "new_papers.php";
                                // }
                                // else{
                                //     window.location = "new_paper_submission.php";
                                // }
                            </script>
    <?php
                            // header("location: new_papers.php");
                            // ob_end_flush();
                        } else {
                            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য ইনসার্ট হয়নি</p>";
                        }
                    }
                } else {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>আপনি এখনো পর্যন্ত প্রকল্পের প্রস্তাবনা জমা দেননি। তাই আগে প্রস্তাবনা জমা দিয়ে তারপর প্রতিবেদন জমা দিন ।</p>";
                }
            }
        }
    }
    ?>
    <div class="container-fluid mt-5">
        <!-- <h3 class="text-center secondaryColor fw-bold">নতুন প্রকল্প সাবমিশন করুন</h3> -->
        <div class="col">
            <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return confirmPaper()">
                    <!-- <?php
                            $select_from_new_paper1 = "SELECT * FROM `notices` WHERE id='$_SESSION[researcher_notice_id]'";
                            $run_select_from_new_paper1 = mysqli_query($conn, $select_from_new_paper1);
                            if (mysqli_num_rows($run_select_from_new_paper1) > 0) {
                                $row1 = mysqli_fetch_assoc($run_select_from_new_paper1);
                                extract($row1);
                            ?>
                        <div class="mt-2">
                            <h3 class="text-primary fw-bold text-center">উক্ত নোটিশের সাপেক্ষে চূড়ান্ত প্রতিবেদন জমা</h3>
                            <p class="fs-5 fw-bold"><?php echo $title; ?></p>
                            <p><?php echo $details; ?></p>
                        </div>
                    <?php
                            } ?> -->
                    <div class="ms-md-5">
                        <label for="pdf_file">প্রকল্পটির চূড়ান্ত প্রতিবেদনের পিডিএফ ফাইল সংযুক্তি<span class="text-danger"> *</span></label>
                        <input type="file" name="pdf_file" class="form-control" id="pdf_file" required>
                    </div>


                    <div class="mt-3">
                        <input type="submit" name="submit" class="form-control btn btn-primary fw-bold" value="সাবমিশন" onclick="return confirmSubmission()">
                    </div>
                </form>
                <script>
                    function confirmSubmission() {
                        return confirm("আপনি কি নিশ্চিত হয়ে প্রকল্প সাবমিশন করতে চাচ্ছেন?");
                    }
                </script>
            </div>
        </div>
    </div>
    <?php
} else if (isset($_SESSION['author_role'], $_SESSION['author_id'], $_SESSION['author_email']) && $_SESSION['author_role'] === 'Teacher') {
    $advisor_author_id = $_SESSION['author_id'];
    $author_email = $_SESSION['author_email'];
    if (isset($_POST['submit'])) {
        extract($_POST);

        if (isset($_FILES['pdf_file']['name'])) {
            $pdf_file_name = $_FILES['pdf_file']['name'];
            $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
            $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));

            $pdf_file_name = uniqid() . ".$path_info3";


            $arr3 = array("pdf");
            if (!in_array($path_info3, $arr3)) {
                echo "<p class='text-danger text-bold text-center fs-5 mt-3'>অবশ্যই ফাইলের ফরম্যাট (PDF) হতে হবে</p>";
            } else {
                $select_from_new_paper = "SELECT * FROM `project_submission_teacher` WHERE advisor_author_id='$advisor_author_id' AND advisor_email='$author_email' AND paper_status=1";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                    $row = mysqli_fetch_assoc($run_select_from_new_paper);
                    extract($row);

                    // $_SESSION['advisor_notice_id'] = $advisor_notice_id;

                    if ($advisor_final_report_file !== 'N/A') {
                        echo "<p style='height: 80vh;' class='text-danger text-bold text-center fs-3 mt-3 d-flex justify-content-center align-items-center'>আপনি ইতিমধ্যে প্রকল্পের চূড়ান্ত প্রতিবেদন জমা দিয়েছেন। তাই আপাতত আর কোনো প্রতিবেদন জমা দিতে পারবেন না।</p>";
                    } else {
                        $update_sql = "UPDATE `project_submission_teacher` SET `advisor_final_report_file`='$pdf_file_name' WHERE advisor_author_id='$advisor_author_id' AND advisor_email='$author_email' AND  advisor_final_report_file='N/A' AND paper_status=1";

                        $run_insert_qry = mysqli_query($conn, $update_sql);
                        if ($run_insert_qry) {
                            // move_uploaded_file($doc_file_tmp_name, '../Files/notices/doc_file/' . $doc_file_name);
                            move_uploaded_file($pdf_file_tmp_name, '../Files/project_submission_teacher/pdf_file/report/' . $pdf_file_name);

                            $_SESSION['advisor_final_report_file'] = $advisor_final_report_file;

                            $receiver = $_SESSION['author_email'];
                            $subject = "Confirmation of Project Final Report Submission";
                            $body = '<p>Dear Advisor(ID-' . $advisor_author_id . '),<br/>Thank you very much for uploading the final report of your project.<br/><br/>

                    Best Regards,<br/>
                    Director of the Institute of Nazrul Studies,<br/>
                    Jatiya Kabi Kazi Nazrul Islam University,
                    Trishal, Mymensingh-2224, Bangladesh <br/>
                    E-Mail: <a href="ins.jkkniu@gmail.com">ins.jkkniu@gmail.com</a>
                    </p>';
                            $send_mail = send_mail($receiver, $subject, $body);
    ?>
                            <script>
                                // let text = "Do you really want to submit the paper?";
                                // if (confirm(text) == true) {
                                window.alert("আপনার প্রকল্পের চূড়ান্ত প্রতিবেদনটি সফলভাবে সাবমিট হয়েছে। আপনাকে একটি কনফার্মেশন ইমেইল পাঠানো হয়েছে।");
                                window.location = "new_papers.php";
                                // }
                                // else{
                                //     window.location = "new_paper_submission.php";
                                // }
                            </script>
    <?php
                            // header("location: new_papers.php");
                            // ob_end_flush();
                        } else {
                            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য ইনসার্ট হয়নি</p>";
                        }
                    }
                } else {
                    echo "<p class='text-danger text-bold text-center fs-5 mt-3'>আপনি এখনো পর্যন্ত প্রকল্পের প্রস্তাবনা জমা দেননি। তাই আগে প্রস্তাবনা জমা দিয়ে তারপর প্রতিবেদন জমা দিন ।</p>";
                }
            }
        }
    }
    // else {
    //     echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Data is not found</p>";
    // }
    ?>
    <div class="container-fluid mt-5">
        <!-- <h3 class="text-center secondaryColor fw-bold">নতুন প্রকল্প সাবমিশন করুন</h3> -->
        <div class="col">
            <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
                <form action="" method="POST" enctype="multipart/form-data" onsubmit="return confirmPaper()">
                    <!-- <?php
                            $select_from_new_paper1 = "SELECT * FROM `notices` WHERE id='$_SESSION[advisor_notice_id]'";
                            $run_select_from_new_paper1 = mysqli_query($conn, $select_from_new_paper1);
                            if (mysqli_num_rows($run_select_from_new_paper1) > 0) {
                                $row1 = mysqli_fetch_assoc($run_select_from_new_paper1);
                                extract($row1);
                            ?>
                        <div class="mt-2">
                            <h3 class="text-primary fw-bold text-center">উক্ত নোটিশের সাপেক্ষে চূড়ান্ত প্রতিবেদন জমা</h3>
                            <p><?php echo $title; ?></p>
                        </div>
                    <?php
                            } ?> -->
                    <div class="ms-md-5">
                        <label for="pdf_file">প্রকল্পটির চূড়ান্ত প্রতিবেদনের পিডিএফ ফাইল সংযুক্তি<span class="text-danger"> *</span></label>
                        <input type="file" name="pdf_file" class="form-control" id="pdf_file" required>
                    </div>


                    <div class="mt-3">
                        <input type="submit" name="submit" class="form-control btn btn-primary fw-bold" value="সাবমিশন" onclick="return confirmSubmission()">
                    </div>
                </form>
                <script>
                    function confirmSubmission() {
                        return confirm("আপনি কি নিশ্চিত হয়ে প্রকল্প সাবমিশন করতে চাচ্ছেন?");
                    }
                </script>
            </div>
        </div>
    </div>
<?php
}
// else if (!isset($_SESSION['author_email']) || !isset($_SESSION['author_email'])) {
//     echo "<p style='height: 80vh;' class='text-danger text-bold text-center fs-3 mt-3 d-flex justify-content-center align-items-center'>আপনি আপাতত পরবর্তী নোটিশের আগ পর্যন্ত কোনো চূড়ান্ত প্রতিবেদন জমা দিতে পারবেন না।</p>";
// } 
// else {
//     echo "<p style='height: 80vh;' class='text-danger text-bold text-center fs-3 mt-3 d-flex justify-content-center align-items-center'>আপনি এখনো প্রকল্পের প্রস্তাবনা জমা দেননি। তাই আগে প্রস্তাবনা জমা দিয়ে তারপর এখানে পুনরায় এসে চূড়ান্ত প্রতিবেদন জমা দিতে পারবেন।</p>";
// }
?>

<?php include('author_footer.php') ?>