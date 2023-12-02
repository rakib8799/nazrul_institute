<?php include('admin_header.php') ?>
<?php include('../mail_sending.php') ?>
<?php include("numberToWord/BanglaNumberToWord.php") ?>

<?php
$obj = new BanglaNumberToWord();
// echo $obj->engToBn(5207.56);
?>

<?php
if (isset($_POST['update'])) {
    extract($_POST);
    $sql = "SELECT * FROM `project_submission_teacher` WHERE id='$status_id'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = mysqli_fetch_assoc($result);

        $update_sql = "UPDATE `project_submission_teacher` SET `paper_status`='$paper_status' WHERE id='$status_id'";
        $run_update_qry = mysqli_query($conn, $update_sql);
        if ($run_update_qry) {
            if ($paper_status == "0") {
                echo '<script>
                    alert("টিচার প্যানেলে একটি ইমেইল পাঠানো হয়েছে");
                </script>';
                $receiver = $row["advisor_email"];
                $subject = "Project Proposal Re-Submission Needed";
                $body = '<p>Your Project Proposal needs to be updated. You are requested to do so...Thanks...</p>';
                $send_mail = send_mail($receiver, $subject, $body);
                if ($send_mail) {
                    echo '<script>
                    window.location.href="view_teacher_project_submission.php";
                </script>';
                }
            } else {
                echo '<script>
                    window.location.href="view_teacher_project_submission.php";
              </script>';
            }
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>ডাটা সংশোধন হয়নি</p>";
        }
    }
}
?>

<div class="container-fluid mt-5">
    <h3 class="text-center secondaryColor fw-bold">প্রকল্পগুলোর সম্পর্কে বিস্তারিত দেখুন</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th class="text-center">ক্র.ন.</th>
                            <th class="text-center">প্রকল্প পরিচালকের নাম ও পদবি</th>
                            <th class="text-center">প্রকল্প পরিচালকের বিভাগ ও প্রতিষ্ঠানের নাম</th>
                            <th class="text-center">প্রকল্পের সংক্ষিপ্ত বিবরণ</th>
                            <th class="text-center">গবেষণার ছয় মাসের কর্মসূচীর বিবরণ</th>
                            <th class="text-center">ইন্সটিটিউট থেকে চাহিত আর্থিক সহায়তা</th>
                            <th class="text-center">ডিগ্রী লাভের উদ্দ্যশ্যে প্রকল্পের বিবরণ</th>
                            <th class="text-center">প্রস্তাবনার পিডিএফ</th>
                            <th class="text-center">চূড়ান্ত প্রতিবেদনের পিডিএফ</th>
                            <th class="text-center">আপলোডের সময়</th>
                            <th class="text-center">সাবমিশন</th>
                            <th class="text-center" style="width: 5vw">মুছুন</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_from_new_paper = "SELECT * FROM project_submission_teacher";
                        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                        $serial_no = 1;
                        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                extract($row);
                        ?>
                                <tr>
                                    <td><?php echo $obj->engToBn($serial_no) ?></td>
                                    <td>বাংলায়ঃ <?php echo $advisor_name_designation_bd; ?>, ইংরেজিতেঃ <?php echo $advisor_name_designation_en; ?></td>
                                    <td>বিভাগঃ <?php echo $advisor_department; ?>, প্রতিষ্ঠানঃ <?php echo $advisor_organization; ?></td>

                                    <td>নাম (বাংলায়): <?php echo $advisor_project_title_bd; ?>, নাম (ইংরেজিতে): <?php echo $advisor_project_title_en; ?></td>
                                    <td><?php echo $advisor_project_sixMonthWorkSchedule; ?></td>
                                    <td><?php echo $advisor_project_salaryExp; ?></td>
                                    <td><?php echo $advisor_projectResultForDegree; ?></td>
                                    <td>
                                        <!-- <a href="../Files/project_submission_teacher/doc_file/<?php echo $doc_file ?>"><?php echo $doc_file ?></a> -->
                                        <a href="../Files/project_submission_teacher/pdf_file/<?php echo $advisor_project_proposal_file ?>"><?php echo $advisor_project_proposal_file ?></a>
                                    </td>
                                    <td>
                                        <!-- <a href="../Files/project_submission_teacher/doc_file/<?php echo $doc_file ?>"><?php echo $doc_file ?></a> -->
                                        <a href="../Files/project_submission_teacher/pdf_file/<?php echo $advisor_final_report_file ?>"><?php echo $advisor_final_report_file ?></a>
                                    </td>
                                    <td><?php echo $created_at; ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="status_id" value="<?php echo $id ?>">
                                            <select name="paper_status" id="paper_status" class="form-select" required>
                                                <option value="">সাবমিশন স্ট্যাটাস</option>
                                                <option value="1" <?php if (isset($paper_status) && $paper_status === "1") {
                                                                        echo "selected";
                                                                    } ?>>ফরমের সংশোধন প্রয়োজন নেই</option>
                                                <option value="0" <?php if (isset($paper_status) && $paper_status === "0") {
                                                                        echo "selected";
                                                                    } ?>>ফরমের সংশোধন প্রয়োজন আছে
                                                </option>
                                            </select>
                                            <input type="submit" value="Update" name="update" class="btn btn-outline-primary mt-2">
                                        </form>
                                    </td>
                                    <td>
                                        <!-- <a href="edit_notice.php?notice_id=<?php echo $id ?>" class="fs-3"><i class="fa-solid fa-pen-to-square"></i></a> -->
                                        <a href="delete_teacher_project_submission.php?id=<?php echo $id ?>&&pdf_file1=<?php echo $advisor_project_proposal_file; ?>&&pdf_file2=<?php if (isset($advisor_final_report_file) && $advisor_final_report_file != 'N/A') {
                                                                                                                                                                                    echo $advisor_final_report_file;
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo ("");
                                                                                                                                                                                } ?>" class="ms-md-3 ms-2 fs-3" onclick="return confirmSubmission()"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                                $serial_no++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <script>
                function confirmSubmission() {
                    return confirm(" আপনি কি নিশ্চিতভাবে ডাটা ডিলিট করতে চাচ্ছেন?");
                }
            </script>
        </div>
    </div>
</div>

<?php include('admin_footer.php') ?>