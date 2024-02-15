<?php include('author_header.php') ?>
<?php include("../admin/numberToWord/BanglaNumberToWord.php") ?>
<link rel="stylesheet" href="../style.css">

<?php
$obj = new BanglaNumberToWord();
// echo $obj->engToBn(5207.56);
?>
<?php
if (isset($_SESSION['author_role']) && $_SESSION['author_role'] === 'Student') {
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
                                <th class="text-center">নোটিশের শিরোনাম</th>
                                <th class="text-center">গবেষকের নাম</th>
                                <th class="text-center">গবেষকের রোল, শিক্ষাবর্ষ ও বিভাগ</th>
                                <th class="text-center">গবেষণা তত্ত্বাবধায়কের নাম, পদবী ও বিভাগ</th>
                                <th class="text-center">বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম </th>
                                <th class="text-center">প্রকল্পের সংক্ষিপ্ত বিবরণ</th>
                                <th class="text-center">গবেষণার ছয় মাসের কর্মসূচীর বিবরণ</th>
                                <th class="text-center">ইন্সটিটিউট থেকে চাহিত আর্থিক সহায়তা</th>
                                <th class="text-center">ডিগ্রী লাভের উদ্দ্যশ্যে প্রকল্পের বিবরণ</th>
                                <th class="text-center">প্রস্তাবনার পিডিএফ</th>
                                <th class="text-center">চূড়ান্ত প্রতিবেদনের পিডিএফ</th>
                                <th class="text-center">আপলোডের সময়</th>
                                <th class="text-center" style="width: 5vw">সংশোধন</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $researcher_author_id = $_SESSION["author_id"];
                            $select_from_new_paper = "SELECT * FROM project_submission_student WHERE `researcher_author_id` = '$researcher_author_id' AND `paper_status`='0'";
                            $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                            $serial_no = 1;
                            if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                                while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                    extract($row);
                            ?>
                                    <tr>
                                        <td><?php echo $obj->engToBn($serial_no) ?></td>
                                        <?php
                                        // $select_from_new_paper1 = "SELECT * FROM `notices` WHERE id='$researcher_notice_id'";
                                        // $run_select_from_new_paper1 = mysqli_query($conn, $select_from_new_paper1);
                                        // if (mysqli_num_rows($run_select_from_new_paper1) > 0) {
                                        //     $row1 = mysqli_fetch_assoc($run_select_from_new_paper1);
                                        //     extract($row1);
                                        ?>
                                        <!-- <td><?php
                                                    // echo $title; 
                                                    ?></td> -->
                                        <?php
                                        // } 
                                        ?>
                                        <td>বাংলায়ঃ <?php echo $researcher_project_title_bd; ?>, ইংরেজিতেঃ <?php echo $researcher_project_title_en; ?></td>
                                        <td>বাংলায়ঃ <?php echo $researcher_name_bd; ?>, ইংরেজিতেঃ <?php echo $researcher_name_en; ?></td>
                                        <td>রোলঃ <?php echo $researcher_roll; ?>, শিক্ষাবর্ষঃ <?php echo $researcher_session; ?>, বিভাগঃ <?php echo $researcher_department; ?></td>
                                        <td>নামঃ <?php echo $researcher_supervisor_name; ?>, পদবীঃ <?php echo $researcher_supervisor_designation; ?>, বিভাগঃ <?php echo $researcher_supervisor_department; ?></td>
                                        <td><?php echo $researcher_organization; ?></td>
                                        <td>নাম (বাংলায়): <?php echo $researcher_project_title_bd; ?>, নাম (ইংরেজিতে): <?php echo $researcher_project_title_en; ?></td>
                                        <td><?php echo $researcher_project_sixMonthWorkSchedule; ?></td>
                                        <td><?php echo $researcher_salaryExp; ?></td>
                                        <td><?php echo $researcher_projectResultForDegree; ?></td>
                                        <td>
                                            <!-- <a href="../Files/project_submission_student/doc_file/<?php echo $doc_file ?>"><?php echo $doc_file ?></a> -->
                                            <a href="../Files/project_submission_student/pdf_file/proposal/<?php echo $researcher_project_reportPdf ?>"><?php echo $researcher_project_reportPdf ?></a>
                                        </td>
                                        <td>
                                            <!-- <a href="../Files/project_submission_student/doc_file/<?php echo $doc_file ?>"><?php echo $doc_file ?></a> -->
                                            <a href="../Files/project_submission_student/pdf_file/report/<?php echo $researcher_final_report_file ?>"><?php echo $researcher_final_report_file ?></a>
                                        </td>
                                        <td><?php echo $created_at; ?></td>
                                        <td>
                                            <a href="resubmission_paper_submission_step-1.php?resubmission_paper_id=<?php echo $id ?>" class="fs-3"><i class="fa-solid fa-pen-to-square"></i></a>
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
                <!-- <script>
                function confirmSubmission() {
                    return confirm(" Are you sure you want to confirm your submission?");
                }
            </script> -->
            </div>
        </div>
    </div>
<?php
} else {
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
                                <th class="text-center">নোটিশের শিরোনাম</th>
                                <th class="text-center">প্রকল্প পরিচালকের নাম ও পদবি</th>
                                <th class="text-center">প্রকল্প পরিচালকের বিভাগ ও প্রতিষ্ঠানের নাম</th>
                                <!-- <th class="text-center">গবেষণা তত্ত্বাবধায়কের নাম, পদবী ও বিভাগ</th> -->
                                <!-- <th class="text-center">বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম </th> -->
                                <th class="text-center">প্রকল্পের সংক্ষিপ্ত বিবরণ</th>
                                <th class="text-center">গবেষণার ছয় মাসের কর্মসূচীর বিবরণ</th>
                                <th class="text-center">ইন্সটিটিউট থেকে চাহিত আর্থিক সহায়তা</th>
                                <th class="text-center">ডিগ্রী লাভের উদ্দ্যশ্যে প্রকল্পের বিবরণ</th>
                                <th class="text-center">প্রস্তাবনার পিডিএফ</th>
                                <th class="text-center">চূড়ান্ত প্রতিবেদনের পিডিএফ</th>
                                <th class="text-center">আপলোডের সময়</th>
                                <th class="text-center" style="width: 5vw">সংশোধন</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $advisor_author_id = $_SESSION["author_id"];
                            $select_from_new_paper = "SELECT * FROM project_submission_teacher WHERE advisor_author_id='$advisor_author_id' AND `paper_status`='0'";
                            $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                            $serial_no = 1;
                            if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                                while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                    extract($row);
                            ?>
                                    <tr>
                                        <td><?php echo $obj->engToBn($serial_no) ?></td>
                                        <?php
                                        // $select_from_new_paper1 = "SELECT * FROM `notices` WHERE id='$advisor_notice_id'";
                                        // $run_select_from_new_paper1 = mysqli_query($conn, $select_from_new_paper1);
                                        // if (mysqli_num_rows($run_select_from_new_paper1) > 0) {
                                        //     $row1 = mysqli_fetch_assoc($run_select_from_new_paper1);
                                        //     extract($row1);
                                        ?>
                                        <!-- <td><?php
                                                    // echo $title; 
                                                    ?></td> -->
                                        <?php
                                        // } 
                                        ?>
                                        <td>বাংলায়ঃ <?php echo $advisor_project_title_bd; ?>, ইংরেজিতেঃ <?php echo $advisor_project_title_en; ?></td>
                                        <td>বাংলায়ঃ <?php echo $advisor_name_designation_bd; ?>, ইংরেজিতেঃ <?php echo $advisor_name_designation_en; ?></td>
                                        <td>বিভাগঃ <?php echo $advisor_department; ?>, প্রতিষ্ঠানঃ <?php echo $advisor_organization; ?></td>
                                        <!-- <td>নামঃ <?php echo $researcher_supervisor_name; ?>, পদবীঃ <?php echo $researcher_supervisor_designation; ?>, বিভাগঃ <?php echo $researcher_supervisor_department; ?></td> -->
                                        <!-- <td><?php echo $researcher_organization; ?></td> -->
                                        <td>নাম (বাংলায়): <?php echo $advisor_project_title_bd; ?>, নাম (ইংরেজিতে): <?php echo $advisor_project_title_en; ?></td>
                                        <td><?php echo $advisor_project_sixMonthWorkSchedule; ?></td>
                                        <td><?php echo $advisor_project_salaryExp; ?></td>
                                        <td><?php echo $advisor_projectResultForDegree; ?></td>
                                        <td>
                                            <!-- <a href="../Files/project_submission_teacher/doc_file/<?php echo $doc_file ?>"><?php echo $doc_file ?></a> -->
                                            <a href="../Files/project_submission_teacher/pdf_file/proposal/<?php echo $advisor_project_proposal_file ?>"><?php echo $advisor_project_proposal_file ?></a>
                                        </td>
                                        <td>
                                            <!-- <a href="../Files/project_submission_teacher/doc_file/<?php echo $doc_file ?>"><?php echo $doc_file ?></a> -->
                                            <a href="../Files/project_submission_teacher/pdf_file/report/<?php echo $advisor_final_report_file ?>"><?php echo $advisor_final_report_file ?></a>
                                        </td>
                                        <td><?php echo $created_at; ?></td>
                                        <td>
                                            <a href="resubmission_paper_submission_step-1.php?resubmission_paper_id=<?php echo $id ?>" class="fs-3"><i class="fa-solid fa-pen-to-square"></i></a>
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
                <!-- <script>
                function confirmSubmission() {
                    return confirm(" Are you sure you want to confirm your submission?");
                }
            </script> -->
            </div>
        </div>
    </div>
<?php
}
?>

<?php include('author_footer.php') ?>