<?php include('author_header.php') ?>
<?php include('../mail_sending.php') ?>

<?php
if (isset($_SESSION['author_role'], $_SESSION['researcher_notice_id']) && $_SESSION['author_role'] === 'Student') {
    if (isset($_SESSION['researcher_notice_id'], $_SESSION['researcher_name_bd'], $_SESSION['researcher_name_en'], $_SESSION['researcher_roll'], $_SESSION['researcher_session'], $_SESSION['researcher_department'], $_SESSION['researcher_supervisor_name'], $_SESSION['researcher_supervisor_designation'], $_SESSION['researcher_supervisor_department'], $_SESSION['researcher_organization'], $_SESSION['researcher_project_title_bd'], $_SESSION['researcher_project_title_en'], $_SESSION['long_desc1'], $_SESSION['long_desc2'], $_SESSION['long_desc3'], $_SESSION['long_desc4'], $_SESSION['long_desc5'], $_SESSION['long_desc6'], $_SESSION['pdf_file'], $_SESSION['pdf_file_tmp_name'], $_SESSION['long_desc7'], $_SESSION['researcher_salaryExp'], $_SESSION['researcher_supervisorSalaryExp'], $_SESSION['researcher_fieldWorkExp'], $_SESSION['researcher_seminarExp'], $_SESSION['researcher_travelExp'], $_SESSION['researcher_itemsExp'], $_SESSION['researcher_reportExp'], $_SESSION['researcher_extraExp'], $_SESSION['researcher_sixMonthTotalExp'], $_SESSION['long_desc8'])) {

        $t = time();
        $_SESSION['current_time'] = date("Y-m-d H:i:s", $t);

        $researcher_notice_id = $_SESSION['researcher_notice_id'];
        $researcher_name_bd = $_SESSION['researcher_name_bd'];
        $researcher_name_en = $_SESSION['researcher_name_en'];
        $researcher_roll = $_SESSION['researcher_roll'];
        $researcher_session = $_SESSION['researcher_session'];
        $researcher_department = $_SESSION['researcher_department'];
        $researcher_supervisor_name = $_SESSION['researcher_supervisor_name'];
        $researcher_supervisor_designation = $_SESSION['researcher_supervisor_designation'];
        $researcher_supervisor_department = $_SESSION['researcher_supervisor_department'];
        $researcher_organization = $_SESSION['researcher_organization'];
        $researcher_project_title_bd = $_SESSION['researcher_project_title_bd'];
        $researcher_project_title_en = $_SESSION['researcher_project_title_en'];
        $long_desc1 = $_SESSION['long_desc1'];
        $long_desc2 = $_SESSION['long_desc2'];
        $long_desc3 = $_SESSION['long_desc3'];
        $long_desc4 = $_SESSION['long_desc4'];
        $long_desc5 = $_SESSION['long_desc5'];
        $long_desc6 = $_SESSION['long_desc6'];
        $long_desc7 = $_SESSION['long_desc7'];
        $researcher_salaryExp = $_SESSION['researcher_salaryExp'];
        $researcher_supervisorSalaryExp = $_SESSION['researcher_supervisorSalaryExp'];
        $researcher_fieldWorkExp = $_SESSION['researcher_fieldWorkExp'];
        $researcher_seminarExp = $_SESSION['researcher_seminarExp'];
        $researcher_travelExp = $_SESSION['researcher_travelExp'];
        $researcher_itemsExp = $_SESSION['researcher_itemsExp'];
        $researcher_reportExp = $_SESSION['researcher_reportExp'];
        $researcher_extraExp = $_SESSION['researcher_extraExp'];
        $researcher_sixMonthTotalExp = $_SESSION['researcher_sixMonthTotalExp'];
        $long_desc8 = $_SESSION['long_desc8'];
        $researcher_final_report_file = 'N/A';

        $current_time = new DateTime();
        $current_year = $current_time->format("Y");

        $researcher_author_id = $_SESSION['author_id'];

        $select_from_new_paper = "SELECT * FROM `project_submission_student` WHERE `researcher_author_id` = '$researcher_author_id' AND `researcher_notice_id`='$researcher_notice_id'";
        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
            $row = mysqli_fetch_assoc($run_select_from_new_paper);
            extract($row);
            // $arr = explode(",", $authors_email);
            // $bool = in_array($_SESSION['author_email'], $arr);
            // echo $bool;
            if ($row) {
                echo "<p style='height: 80vh;' class='text-danger text-bold text-center fs-4 mt-3 d-flex justify-content-center align-items-center'>আপনি ইতিমধ্যে প্রকল্পের প্রস্তাবনা জমা দিয়েছেন। তাই পরবর্তী নোটিশের আগ পর্যন্ত আর কোনো প্রতিবেদন জমা দিতে পারবেন না।</p>";
            }
        } else {
            $researcher_notice_id = $_SESSION['researcher_notice_id'];
            $select_from_new_paper1 = "SELECT * FROM `notices` WHERE id='$researcher_notice_id'";
            $run_select_from_new_paper1 = mysqli_query($conn, $select_from_new_paper1);
            if (mysqli_num_rows($run_select_from_new_paper1) > 0) {
                $row1 = mysqli_fetch_assoc($run_select_from_new_paper1);
                extract($row1);
                $new_date = date('Y-m-d');
                $diff = strtotime($submission_date) - strtotime($new_date);
                $date_diff = round($diff / 86400);
                echo $date_diff, "  ";
                if ($date_diff < 0) {
                    echo "<p style='height: 80vh;' class='text-danger text-bold text-center fs-4 mt-3 d-flex justify-content-center align-items-center'>আপনার প্রকল্পের প্রস্তাবনা জমা দেওয়ার সময় শেষ। অনুরোধ করে পরবর্তী নোটিশের আগ পর্যন্ত অপেক্ষা করুন।</p>";
                } else {
                    $insert_sql = "INSERT INTO `project_submission_student`(`researcher_author_id`,`researcher_notice_id`,`researcher_name_bd`,`researcher_name_en`,`researcher_roll`,`researcher_session`,`researcher_department`,`researcher_supervisor_name`,`researcher_supervisor_designation`,`researcher_supervisor_department`,`researcher_organization`,`researcher_project_title_bd`,`researcher_project_title_en`,`researcher_project_objective`,`researcher_project_details`,`researcher_project_desiredOutput`,`researcher_project_relToNationalDev`,`researcher_project_collectInfo`,`researcher_project_examDirector`,`researcher_project_reportPdf`,`researcher_project_sixMonthWorkSchedule`,`researcher_salaryExp`,`researcher_supervisorSalaryExp`,`researcher_fieldWorkExp`,`researcher_seminarExp`,`researcher_travelExp`,`researcher_itemsExp`,`researcher_reportExp`,`researcher_extraExp`,`researcher_sixMonthTotalExp`,`researcher_projectResultForDegree`,`researcher_final_report_file`,`paper_status`,`count`,`researcher_email`,`created_at`) VALUES('$researcher_author_id','$researcher_notice_id','$researcher_name_bd','$researcher_name_en','$researcher_roll','$researcher_session','$researcher_department','$researcher_supervisor_name','$researcher_supervisor_designation','$researcher_supervisor_department','$researcher_organization','$researcher_project_title_bd','$researcher_project_title_en','$long_desc1','$long_desc2','$long_desc3','$long_desc4','$long_desc5','$long_desc6','$_SESSION[pdf_file]','$long_desc7','$researcher_salaryExp','$researcher_supervisorSalaryExp','$researcher_fieldWorkExp','$researcher_seminarExp','$researcher_travelExp','$researcher_itemsExp','$researcher_reportExp','$researcher_extraExp','$researcher_sixMonthTotalExp','$long_desc8','$researcher_final_report_file','1','1','$_SESSION[author_email]','$_SESSION[current_time]')";
                    $run_insert_qry = mysqli_query($conn, $insert_sql);
                    if ($run_insert_qry) {

                        $receiver = $_SESSION['author_email'];
                        $subject = "Confirmation of Project Proposal Submission";
                        $body = '<p>Dear Researcher(ID-' . $researcher_author_id . '),<br/>Thank you very much for uploading the project proposal to the INS-' . $current_year . ' submission system. We shall be in touch with you when the review of the project will be completed.<br/><br/>

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
                            window.alert("আপনার প্রকল্পটির প্রস্তাবনা সফলভাবে সাবমিট হয়েছে। আপনাকে একটি কনফার্মেশন ইমেইল পাঠানো হয়েছে।");
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
            }
        }
    }
    // else {
    //     echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Data is not found</p>";
    // }
} else if (isset($_SESSION['author_role'], $_SESSION['advisor_notice_id']) && $_SESSION['author_role'] === 'Teacher') {
    if (isset($_SESSION['advisor_notice_id'], $_SESSION['advisor_name_designation_bd'], $_SESSION['advisor_name_designation_en'], $_SESSION['advisor_assistant_name_designation_bd'], $_SESSION['advisor_assistant_name_designation_en'], $_SESSION['advisor_department'], $_SESSION['advisor_organization'], $_SESSION['advisor_project_title_bd'], $_SESSION['advisor_project_title_en'], $_SESSION['advisor_project_relatedTopic'], $_SESSION['advisor_research_workPlace_university'], $_SESSION['advisor_research_workPlace_department'], $_SESSION['long_desc1'], $_SESSION['long_desc2'], $_SESSION['long_desc3'], $_SESSION['long_desc4'], $_SESSION['long_desc5'], $_SESSION['long_desc6'], $_SESSION['pdf_file'], $_SESSION['pdf_file_tmp_name'], $_SESSION['long_desc7'], $_SESSION['long_desc8'], $_SESSION['long_desc9'], $_SESSION['advisor_applicant_appointment_period'], $_SESSION['advisor_performance_indicators'], $_SESSION['advisor_assessment_expertName'], $_SESSION['advisor_project_salaryExp'], $_SESSION['advisor_assisstantSalaryExp'], $_SESSION['advisor_unavailable_elementsExp'], $_SESSION['advisor_fieldWorkExp'], $_SESSION['advisor_seminarExp'], $_SESSION['advisor_travelExp'], $_SESSION['advisor_itemsExp'], $_SESSION['advisor_reportExp'], $_SESSION['advisor_extraExp'], $_SESSION['advisor_sixMonthTotalExp'], $_SESSION['advisor_prev_economicHelp'], $_SESSION['advisor_economicApproval'], $_SESSION['advisor_final_report_date'], $_SESSION['advisor_final_report_currentCondition'], $_SESSION['advisor_economicHelping_org'], $_SESSION['advisor_economicHelping_project'], $_SESSION['advisor_economicHelping_money'], $_SESSION['advisor_economicHelping_finishingDate'], $_SESSION['long_desc10'])) {

        $t = time();
        $_SESSION['current_time'] = date("Y-m-d H:i:s", $t);

        $advisor_notice_id = $_SESSION['advisor_notice_id'];
        $advisor_name_designation_bd = $_SESSION['advisor_name_designation_bd'];
        $advisor_name_designation_en = $_SESSION['advisor_name_designation_en'];
        $advisor_assistant_name_designation_bd = $_SESSION['advisor_assistant_name_designation_bd'];
        $advisor_assistant_name_designation_en = $_SESSION['advisor_assistant_name_designation_en'];
        $advisor_department = $_SESSION['advisor_department'];
        $advisor_organization = $_SESSION['advisor_organization'];
        $advisor_project_title_bd = $_SESSION['advisor_project_title_bd'];
        $advisor_project_title_en = $_SESSION['advisor_project_title_en'];
        $advisor_project_relatedTopic = $_SESSION['advisor_project_relatedTopic'];
        $advisor_research_workPlace_university = $_SESSION['advisor_research_workPlace_university'];
        $advisor_research_workPlace_department = $_SESSION['advisor_research_workPlace_department'];
        $long_desc1 = $_SESSION['long_desc1'];
        $long_desc2 = $_SESSION['long_desc2'];
        $long_desc3 = $_SESSION['long_desc3'];
        $long_desc4 = $_SESSION['long_desc4'];
        $long_desc5 = $_SESSION['long_desc5'];
        $long_desc6 = $_SESSION['long_desc6'];

        $long_desc7 = $_SESSION['long_desc7'];
        $long_desc8 = $_SESSION['long_desc8'];
        $long_desc9 = $_SESSION['long_desc9'];
        $advisor_applicant_appointment_period = $_SESSION['advisor_applicant_appointment_period'];
        $advisor_performance_indicators = $_SESSION['advisor_performance_indicators'];
        $advisor_assessment_expertName = $_SESSION['advisor_assessment_expertName'];
        $advisor_project_salaryExp = $_SESSION['advisor_project_salaryExp'];
        $advisor_assisstantSalaryExp = $_SESSION['advisor_assisstantSalaryExp'];
        $advisor_unavailable_elementsExp = $_SESSION['advisor_unavailable_elementsExp'];
        $advisor_fieldWorkExp = $_SESSION['advisor_fieldWorkExp'];
        $advisor_seminarExp = $_SESSION['advisor_seminarExp'];
        $advisor_travelExp = $_SESSION['advisor_travelExp'];
        $advisor_itemsExp = $_SESSION['advisor_itemsExp'];
        $advisor_reportExp = $_SESSION['advisor_reportExp'];
        $advisor_extraExp = $_SESSION['advisor_extraExp'];
        $advisor_sixMonthTotalExp = $_SESSION['advisor_sixMonthTotalExp'];
        $advisor_prev_economicHelp = $_SESSION['advisor_prev_economicHelp'];
        $advisor_economicApproval = $_SESSION['advisor_economicApproval'];
        $advisor_final_report_date = $_SESSION['advisor_final_report_date'];
        $advisor_final_report_currentCondition = $_SESSION['advisor_final_report_currentCondition'];
        $advisor_economicHelping_org = $_SESSION['advisor_economicHelping_org'];
        $advisor_economicHelping_project = $_SESSION['advisor_economicHelping_project'];
        $advisor_economicHelping_money = $_SESSION['advisor_economicHelping_money'];
        $advisor_economicHelping_finishingDate = $_SESSION['advisor_economicHelping_finishingDate'];
        $long_desc10 = $_SESSION['long_desc10'];
        $advisor_final_report_file = 'N/A';

        $current_time = new DateTime();
        $current_year = $current_time->format("Y");

        $advisor_author_id = $_SESSION['author_id'];

        $select_from_new_paper = "SELECT * FROM `project_submission_teacher` WHERE advisor_author_id='$advisor_author_id' AND `advisor_notice_id`='$advisor_notice_id'";
        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
            $row = mysqli_fetch_assoc($run_select_from_new_paper);
            extract($row);
            // $arr = explode(",", $authors_email);
            // $bool = in_array($_SESSION['author_email'], $arr);
            // echo $bool;
            if ($row) {
                echo "<p style='height: 80vh;' class='text-danger text-bold text-center fs-3 mt-3 d-flex justify-content-center align-items-center'>আপনি ইতিমধ্যে প্রকল্পের প্রস্তাবনা জমা দিয়েছেন। তাই আপাতত আর কোনো প্রতিবেদন জমা দিতে পারবেন না।</p>";
            }
        } else {
            $advisor_notice_id = $_SESSION['advisor_notice_id'];
            $select_from_new_paper1 = "SELECT * FROM `notices` WHERE id='$advisor_notice_id'";
            $run_select_from_new_paper1 = mysqli_query($conn, $select_from_new_paper1);
            if (mysqli_num_rows($run_select_from_new_paper1) > 0) {
                $row1 = mysqli_fetch_assoc($run_select_from_new_paper1);
                extract($row1);
                $new_date = date('Y-m-d');
                $diff = strtotime($submission_date) - strtotime($new_date);
                $date_diff = round($diff / 86400);
                echo $date_diff, "  ";
                if ($row1 && $date_diff < 0) {
                    echo "<p style='height: 80vh;' class='text-danger text-bold text-center fs-3 mt-3 d-flex justify-content-center align-items-center'>আপনার প্রকল্পের প্রস্তাবনা জমা দেওয়ার সময় শেষ। অনুরোধ করে পরবর্তী নোটিশের আগ পর্যন্ত অপেক্ষা করুন।</p>";
                } else {
                    $insert_sql = "INSERT INTO `project_submission_teacher`(`advisor_author_id`,`advisor_notice_id`,`advisor_name_designation_bd`,`advisor_name_designation_en`,`advisor_assistant_name_designation_bd`,`advisor_assistant_name_designation_en`,`advisor_department`,`advisor_organization`,`advisor_project_title_bd`,`advisor_project_title_en`,`advisor_project_relatedTopic`,`advisor_research_workPlace_university`,`advisor_research_workPlace_department`,`advisor_project_objective`,`advisor_project_details`,`advisor_project_desiredOutput`,`advisor_project_relToNationalDev`,`advisor_project_collectInfo`,`advisor_project_examDirector`,`advisor_project_proposal_file`,`advisor_project_sixMonthWorkSchedule`,`advisor_basic_facilities_forProject`,`advisor_basic_facilities_unavailable`,`advisor_applicant_appointment_period`,`advisor_performance_indicators`,`advisor_assessment_expertName`,`advisor_project_salaryExp`,`advisor_assisstantSalaryExp`,`advisor_unavailable_elementsExp`,`advisor_fieldWorkExp`,`advisor_seminarExp`,`advisor_travelExp`,`advisor_itemsExp`,`advisor_reportExp`,`advisor_extraExp`,`advisor_sixMonthTotalExp`,`advisor_prev_economicHelp`,`advisor_economicApproval`,`advisor_final_report_date`,`advisor_final_report_currentCondition`,`advisor_economicHelping_org`,`advisor_economicHelping_project`,`advisor_economicHelping_money`,`advisor_economicHelping_finishingDate`,`advisor_projectResultForDegree`,`advisor_final_report_file`,`paper_status`,`count`,`advisor_email`,`created_at`) VALUES('$advisor_author_id','$advisor_notice_id','$advisor_name_designation_bd','$advisor_name_designation_en','$advisor_assistant_name_designation_bd','$advisor_assistant_name_designation_en','$advisor_department','$advisor_organization','$advisor_project_title_bd','$advisor_project_title_en','$advisor_project_relatedTopic','$advisor_research_workPlace_university','$advisor_research_workPlace_department','$long_desc1','$long_desc2','$long_desc3','$long_desc4','$long_desc5','$long_desc6','$_SESSION[pdf_file]','$long_desc7','$long_desc8','$long_desc9','$advisor_applicant_appointment_period','$advisor_performance_indicators','$advisor_assessment_expertName','$advisor_project_salaryExp','$advisor_assisstantSalaryExp','$advisor_unavailable_elementsExp','$advisor_fieldWorkExp','$advisor_seminarExp','$advisor_travelExp','$advisor_itemsExp','$advisor_reportExp','$advisor_extraExp','$advisor_sixMonthTotalExp','$advisor_prev_economicHelp','$advisor_economicApproval','$advisor_final_report_date','$advisor_final_report_currentCondition','$advisor_economicHelping_org','$advisor_economicHelping_project','$advisor_economicHelping_money','$advisor_economicHelping_finishingDate','$long_desc10','$advisor_final_report_file','1','1','$_SESSION[author_email]','$_SESSION[current_time]')";
                    $run_insert_qry = mysqli_query($conn, $insert_sql);
                    if ($run_insert_qry) {

                        $receiver = $_SESSION['author_email'];
                        $subject = "Confirmation of Project Proposal Submission";
                        $body = '<p>Dear Advisor(ID-' . $advisor_author_id . '),<br/>Thank you very much for uploading the project proposal to the INS-' . $current_year . ' submission system. We shall be in touch with you when the review of the project will be completed.<br/><br/>

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
                            window.alert("আপনার প্রকল্পটির প্রস্তাবনা সফলভাবে সাবমিট হয়েছে। আপনাকে একটি কনফার্মেশন ইমেইল পাঠানো হয়েছে।");
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
            }
        }
    }
}
