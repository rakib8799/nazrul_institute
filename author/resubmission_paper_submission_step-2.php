<?php include('author_header.php') ?>
<link rel="stylesheet" href="../style.css">

<?php
if (isset($_SESSION['author_role'], $_SESSION['author_id'], $_SESSION["resubmission_paper_id"]) && $_SESSION['author_role'] === 'Student') {
    $resubmission_paper_id = $_SESSION["resubmission_paper_id"];
    $select_from_new_paper3 = "SELECT researcher_notice_id FROM project_submission_student WHERE id='$resubmission_paper_id'";
    $run_select_from_new_paper3 = mysqli_query($conn, $select_from_new_paper3);
    if (mysqli_num_rows($run_select_from_new_paper3) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper3);
        $researcher_notice = $row['researcher_notice_id'];

        $researcher_author_id = $_SESSION["author_id"];
        $select_from_new_paper = "SELECT * FROM project_submission_student WHERE researcher_notice_id='$researcher_notice' AND researcher_author_id='$researcher_author_id'";
        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
            $row = mysqli_fetch_assoc($run_select_from_new_paper);
            extract($row);
            if (isset($_POST['next-step-2'])) {
                extract($_POST);

                if (!empty($_FILES['pdf_file']['name'])) {
                    $pdf_file_name = $_FILES['pdf_file']['name'];
                    $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
                    $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));

                    $pdf_file_name = uniqid() . ".$path_info3";


                    $arr3 = array("pdf");
                    if (!in_array($path_info3, $arr3)) {
                        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>File must be in pdf format</p>";
                    } else {
                        $_SESSION['researcher_project_title_bd'] = $researcher_project_title_bd;
                        $_SESSION['researcher_project_title_en'] = $researcher_project_title_en;
                        $_SESSION['long_desc1'] = $long_desc1;
                        $_SESSION['long_desc2'] = $long_desc2;
                        $_SESSION['long_desc3'] = $long_desc3;
                        $_SESSION['long_desc4'] = $long_desc4;
                        $_SESSION['long_desc5'] = $long_desc5;
                        $_SESSION['long_desc6'] = $long_desc6;
                        $_SESSION['pdf_file'] = $pdf_file_name;
                        $_SESSION['pdf_file_tmp_name'] = $pdf_file_tmp_name;
                        $_SESSION['current_pdf_file'] = $current_pdf_file;
                        $_SESSION['long_desc7'] = $long_desc7;
                    }

                    header("location: resubmission_paper_submission_step-3.php");
                    ob_end_flush();
                } else {
                    $_SESSION['researcher_project_title_bd'] = $researcher_project_title_bd;
                    $_SESSION['researcher_project_title_en'] = $researcher_project_title_en;
                    $_SESSION['long_desc1'] = $long_desc1;
                    $_SESSION['long_desc2'] = $long_desc2;
                    $_SESSION['long_desc3'] = $long_desc3;
                    $_SESSION['long_desc4'] = $long_desc4;
                    $_SESSION['long_desc5'] = $long_desc5;
                    $_SESSION['long_desc6'] = $long_desc6;
                    $_SESSION['long_desc7'] = $long_desc7;

                    header("location: resubmission_paper_submission_step-3.php");
                    ob_end_flush();
                }
            }
?>
            <div class="container-fluid mt-5">
                <!-- <h3 class="text-center secondaryColor fw-bold">নতুন প্রকল্প সাবমিশন করুন</h3> -->
                <div class="col">
                    <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
                        <form action="" method="POST" enctype="multipart/form-data" onsubmit="return confirmPaper()">
                            <h6><b>প্রকল্পের সংক্ষিপ্ত বিবরণ</b><span class="text-danger"> *</span></h6>
                            <div class="mt-2 ms-5">
                                <label for="researcher_project_title_bd">প্রকল্পের শিরোনাম (বাংলায়)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_project_title_bd" id="researcher_project_title_bd" placeholder="আপনার প্রকল্পের শিরোনাম বাংলায় লিখুন" value="<?php echo $researcher_project_title_bd; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="researcher_project_title_en">প্রকল্পের শিরোনাম (ইংরেজিতে (ব্লক লেটারে))<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_project_title_en" id="researcher_project_title_en" placeholder="আপনার প্রকল্পের শিরোনাম ইংরেজিতে লিখুন" value="<?php echo $researcher_project_title_en; ?>">
                                </div>
                            </div>

                            <div class="mt-2 ms-5">
                                <label for="long_desc1">প্রকল্পের উদ্দেশ্য ও লক্ষ্য (১০০ শব্দের মধ্যে)<span class="text-danger"> *</span></label>
                                <textarea name="long_desc1" class="long_desc" id="long_desc1"><?php echo $advisor_basic_facilities_unavailable; ?></textarea>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="long_desc2">প্রকল্পের বিষয়-বস্তুর উপর পর্যালোচনা এবং বর্তমান উদ্যোগের যৌক্তিকতা (২০০ শব্দের মধ্যে)<span class="text-danger"> *</span></label>
                                <textarea name="long_desc2" class="long_desc" id="long_desc2"><?php echo $researcher_project_details; ?></textarea>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="long_desc3">প্রত্যাশিত ফলাফল<span class="text-danger"> *</span></label>
                                <textarea name="long_desc3" class="long_desc" id="long_desc3"><?php echo $researcher_project_desiredOutput; ?></textarea>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="long_desc4">জাতীয় উন্নয়নের সাথে প্রকল্পের সংশ্লিষ্টতা<span class="text-danger"> *</span></label>
                                <textarea name="long_desc4" class="long_desc" id="long_desc4"><?php echo $researcher_project_relToNationalDev; ?></textarea>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="long_desc5">গবেষণার অনুসৃতব্য কৌশল/পদ্ধতি (যতদূর সম্ভব বিস্তারিত বিবরণ দিন)<span class="text-danger"> *</span></label>
                                <div class="mt-2 ms-5">
                                    <label for="long_desc5">তথ্য সংগ্রহ<span class="text-danger"> *</span></label>
                                    <textarea name="long_desc5" class="long_desc" id="long_desc5"><?php echo $researcher_project_collectInfo; ?></textarea>
                                </div>
                                <div class="mt-2 ms-5">
                                    <label for="long_desc6">গবেষণামূলক পরীক্ষা পরিচালনা<span class="text-danger"> *</span></label>
                                    <textarea name="long_desc6" class="long_desc" id="long_desc6"><?php echo $researcher_project_examDirector; ?></textarea>
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label>প্রকল্পটির প্রস্তাবনার পূর্ববর্তী পিডিএফ ফাইল<span class="text-danger"> *</span></label><br>
                                <a href="../Files/project_submission_student/pdf_file/<?php echo $researcher_project_reportPdf ?>"><?php echo $researcher_project_reportPdf ?></a>
                                <input type="hidden" name="current_pdf_file" value="<?php echo $researcher_project_reportPdf; ?>" />
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="pdf_file">প্রকল্পটির প্রস্তাবনার নতুন পিডিএফ ফাইল সংযুক্তি</label>
                                <input type="file" name="pdf_file" id="pdf_file" class="form-control">
                            </div>

                            <!-- <div class="mt-2 ms-5">
                            <label>প্রকল্পটির চূড়ান্ত প্রতিবেদনের পূর্ববর্তী পিডিএফ ফাইল<span class="text-danger"> *</span></label><br>
                            <a href="../Files/project_submission_student/pdf_file/<?php echo $researcher_final_report_file ?>"><?php echo $researcher_final_report_file ?></a>
                            <input type="hidden" name="current_pdf_file2" value="<?php echo $researcher_final_report_file; ?>" />
                        </div>
                        <div class="mt-2 ms-5">
                            <label for="pdf_file2">প্রকল্পটির চূড়ান্ত প্রতিবেদনের নতুন পিডিএফ ফাইল সংযুক্তি<span class="text-danger"> *</span></label>
                            <input type="file" name="pdf_file2" class="form-control" id="pdf_file2">
                        </div> -->
                            <div>
                                <label for="long_desc7">
                                    <h6 class="mt-4"><b>গবেষণার ছয় মাসের কর্মসূচীর বিবরণ</b><span class="text-danger"> *</span></h6>
                                </label>
                                <div class="ms-5">
                                    <textarea name="long_desc7" class="long_desc" id="long_desc7"><?php echo $researcher_project_sixMonthWorkSchedule; ?></textarea>
                                </div>
                            </div>


                            <div class="mt-3">
                                <input type="submit" name="next-step-2" class="form-control btn btn-primary fw-bold" value="পরবর্তী ধাপ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        }
    }
} else if (isset($_SESSION['author_role'], $_SESSION['author_id'], $_SESSION["resubmission_paper_id"]) && $_SESSION['author_role'] === 'Teacher') {
    $resubmission_paper_id = $_SESSION["resubmission_paper_id"];
    $select_from_new_paper3 = "SELECT advisor_notice_id FROM project_submission_teacher WHERE id='$resubmission_paper_id'";
    $run_select_from_new_paper3 = mysqli_query($conn, $select_from_new_paper3);
    if (mysqli_num_rows($run_select_from_new_paper3) > 0) {
        $row = mysqli_fetch_assoc($run_select_from_new_paper3);
        $advisor_notice = $row['advisor_notice_id'];

        $advisor_author_id = $_SESSION["author_id"];
        $select_from_new_paper = "SELECT * FROM project_submission_teacher WHERE advisor_notice_id='$advisor_notice' AND advisor_author_id='$advisor_author_id'";
        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
            $row = mysqli_fetch_assoc($run_select_from_new_paper);
            extract($row);
            if (isset($_POST['next-step-2'])) {
                extract($_POST);

                if (!empty($_FILES['pdf_file']['name'])) {
                    $pdf_file_name = $_FILES['pdf_file']['name'];
                    $pdf_file_tmp_name = $_FILES['pdf_file']['tmp_name'];
                    $path_info3 = strtolower(pathinfo($pdf_file_name, PATHINFO_EXTENSION));

                    $pdf_file_name = uniqid() . ".$path_info3";


                    $arr3 = array("pdf");
                    if (!in_array($path_info3, $arr3)) {
                        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>File must be in pdf format</p>";
                    } else {
                        $_SESSION['long_desc1'] = $long_desc1;
                        $_SESSION['long_desc2'] = $long_desc2;
                        $_SESSION['long_desc3'] = $long_desc3;
                        $_SESSION['long_desc4'] = $long_desc4;
                        $_SESSION['long_desc5'] = $long_desc5;
                        $_SESSION['long_desc6'] = $long_desc6;
                        $_SESSION['pdf_file'] = $pdf_file_name;
                        $_SESSION['pdf_file_tmp_name'] = $pdf_file_tmp_name;
                        $_SESSION['current_pdf_file'] = $current_pdf_file;
                        $_SESSION['long_desc7'] = $long_desc7;
                        $_SESSION['long_desc8'] = $long_desc8;
                        $_SESSION['long_desc9'] = $long_desc9;
                        $_SESSION['advisor_applicant_appointment_period'] = $advisor_applicant_appointment_period;
                        $_SESSION['advisor_performance_indicators'] = $advisor_performance_indicators;
                        $_SESSION['advisor_assessment_expertName'] = $advisor_assessment_expertName;
                    }

                    header("location: resubmission_paper_submission_step-3.php");
                    ob_end_flush();
                } else {
                    $_SESSION['long_desc1'] = $long_desc1;
                    $_SESSION['long_desc2'] = $long_desc2;
                    $_SESSION['long_desc3'] = $long_desc3;
                    $_SESSION['long_desc4'] = $long_desc4;
                    $_SESSION['long_desc5'] = $long_desc5;
                    $_SESSION['long_desc6'] = $long_desc6;
                    $_SESSION['long_desc7'] = $long_desc7;
                    $_SESSION['long_desc8'] = $long_desc8;
                    $_SESSION['long_desc9'] = $long_desc9;
                    $_SESSION['advisor_applicant_appointment_period'] = $advisor_applicant_appointment_period;
                    $_SESSION['advisor_performance_indicators'] = $advisor_performance_indicators;
                    $_SESSION['advisor_assessment_expertName'] = $advisor_assessment_expertName;

                    header("location: resubmission_paper_submission_step-3.php");
                    ob_end_flush();
                }
            }
        ?>
            <div class="container-fluid mt-5">
                <!-- <h3 class="text-center secondaryColor fw-bold">নতুন প্রকল্প সাবমিশন করুন</h3> -->
                <div class="col">
                    <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
                        <form action="" method="POST" enctype="multipart/form-data" onsubmit="return confirmPaper()">
                            <h6><b>প্রকল্পের সংক্ষিপ্ত বিবরণ</b><span class="text-danger"> *</span></h6>
                            <div class="mt-2 ms-5">
                                <label for="long_desc1">প্রকল্পের উদ্দেশ্য ও লক্ষ্য (১০০ শব্দের মধ্যে)<span class="text-danger"> *</span></label>
                                <textarea name="long_desc1" class="long_desc" id="long_desc1"><?php echo $advisor_project_objective; ?></textarea>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="long_desc2">প্রকল্পের বিষয়-বস্তুর উপর পর্যালোচনা এবং বর্তমান উদ্যোগের যৌক্তিকতা (২০০ শব্দের মধ্যে)<span class="text-danger"> *</span></label>
                                <textarea name="long_desc2" class="long_desc" id="long_desc2"><?php echo $advisor_project_details; ?></textarea>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="long_desc3">প্রত্যাশিত ফলাফল<span class="text-danger"> *</span></label>
                                <textarea name="long_desc3" class="long_desc" id="long_desc3"><?php echo $advisor_project_desiredOutput; ?></textarea>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="long_desc4">জাতীয় উন্নয়নের সাথে প্রকল্পের সংশ্লিষ্টতা<span class="text-danger"> *</span></label>
                                <textarea name="long_desc4" class="long_desc" id="long_desc4"><?php echo $advisor_project_relToNationalDev; ?></textarea>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="long_desc5">গবেষণার অনুসৃতব্য কৌশল/পদ্ধতি (যতদূর সম্ভব বিস্তারিত বিবরণ দিন)<span class="text-danger"> *</span></label>
                                <div class="mt-2 ms-5">
                                    <label for="long_desc5">তথ্য সংগ্রহ<span class="text-danger"> *</span></label>
                                    <textarea name="long_desc5" class="long_desc" id="long_desc5"><?php echo $advisor_project_collectInfo; ?></textarea>
                                </div>
                                <div class="mt-2 ms-5">
                                    <label for="long_desc6">গবেষণামূলক পরীক্ষা পরিচালনা<span class="text-danger"> *</span></label>
                                    <textarea name="long_desc6" class="long_desc" id="long_desc6"><?php echo $advisor_project_examDirector; ?></textarea>
                                </div>
                            </div>

                            <div class="mt-2 ms-5">
                                <label>প্রকল্পটির প্রস্তাবনার পূর্ববর্তী পিডিএফ ফাইল<span class="text-danger"> *</span></label><br>
                                <a href="../Files/project_submission_teacher/pdf_file/<?php echo $advisor_project_proposal_file ?>"><?php echo $advisor_project_proposal_file ?></a>
                                <input type="hidden" name="current_pdf_file" value="<?php echo $advisor_project_proposal_file; ?>" />
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="pdf_file">প্রকল্পটির প্রস্তাবনার নতুন পিডিএফ ফাইল সংযুক্তি</label>
                                <input type="file" name="pdf_file" id="pdf_file" class="form-control">
                            </div>

                            <!-- <div class="mt-2 ms-5">
                            <label>প্রকল্পটির চূড়ান্ত প্রতিবেদনের পূর্ববর্তী পিডিএফ ফাইল<span class="text-danger"> *</span></label><br>
                            <a href="../Files/project_submission_teacher/pdf_file/<?php echo $advisor_final_report_file ?>"><?php echo $advisor_final_report_file ?></a>
                            <input type="hidden" name="current_pdf_file2" value="<?php echo $advisor_final_report_file; ?>" />
                        </div>
                        <div class="mt-2 ms-5">
                            <label for="pdf_file2">প্রকল্পটির চূড়ান্ত প্রতিবেদনের নতুন পিডিএফ ফাইল সংযুক্তি<span class="text-danger"> *</span></label>
                            <input type="file" name="pdf_file2" class="form-control" id="pdf_file2">
                        </div> -->
                            <div>
                                <label for="long_desc7">
                                    <h6 class="mt-4"><b>গবেষণার ছয় মাসের কর্মসূচীর বিবরণ</b><span class="text-danger"> *</span></h6>
                                </label>
                                <div class="ms-5">
                                    <textarea name="long_desc7" class="long_desc" id="long_desc7"><?php echo $advisor_project_sixMonthWorkSchedule; ?></textarea>
                                </div>
                            </div>
                            <div>
                                <label for="long_desc8">
                                    <h6 class="mt-4"><b>প্রস্তাবিত গবেষণার জন্য আপনার প্রতিষ্ঠানে বিদ্যমান মৌলিক সুবিধাদির বিবরণ</b><span class="text-danger"> *</span></h6>
                                </label>
                                <div class="ms-5">
                                    <textarea name="long_desc8" class="long_desc" id="long_desc8"><?php echo $advisor_basic_facilities_forProject; ?></textarea>
                                </div>
                            </div>
                            <div>
                                <label for="long_desc9">
                                    <h6 class="mt-4"><b>গবেষণার জন্য প্রয়োজনীয় মৌলিক সুবিধাদি নিজ প্রতিষ্ঠানে না থাকলে অন্য কোনো বিশ্ববিদ্যালয়/প্রতিষ্ঠানের সুবিধা নেওয়া হলে প্রতিষ্ঠানের নামসহ সুবিধাদির বিবরণ (এক্ষেত্রে সংশ্লিষ্ট গবেষণা প্রতিষ্ঠানের অনুমতিপত্র সংযুক্ত করতে হবে)</b><span class="text-danger"> *</span></h6>
                                </label>
                                <div class="ms-5">
                                    <textarea name="long_desc9" class="long_desc" id="long_desc9"><?php echo $advisor_basic_facilities_unavailable; ?></textarea>
                                </div>
                            </div>

                            <div>
                                <label for="advisor_applicant_appointment_period">
                                    <h6 class="mt-4"><b>গবেষণা সহকারী/শ্রমিক নিয়োগের জন্য প্রয়োজনীয় মেয়াদকাল (যদি থাকে)</b><span class="text-danger"> * (না থাকলে <b>নেই/নাই</b> লিখে দিন)</span></h6>
                                </label>
                                <!-- <label for="advisor_applicant_appointment_period">
                        <h6><b>বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম</b><span class="text-danger"> *</span></h6>
                    </label> -->
                                <div class="ms-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="advisor_applicant_appointment_period" id="advisor_applicant_appointment_period" placeholder="গবেষণা সহকারী/শ্রমিক নিয়োগ হয়ে থাকলে প্রয়োজনীয় মেয়াদকাল লিখুন" value="<?php echo $advisor_applicant_appointment_period; ?>">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="advisor_performance_indicators">
                                    <h6 class="mt-4"><b>প্রকল্পের performance মূল্যায়নের জন্য key indicators গুলো উল্লেখ করুন (একাধিক হলে কমা ব্যবহার করুন)</b><span class="text-danger"> *</span></h6>
                                </label>
                                <!-- <label for="advisor_performance_indicators">
                        <h6><b>বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম</b><span class="text-danger"> *</span></h6>
                    </label> -->
                                <div class="ms-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="advisor_performance_indicators" id="advisor_performance_indicators" placeholder="আপনার প্রকল্পের performance মূল্যায়নের জন্য key indicators গুলো লিখুন" value="<?php echo $advisor_performance_indicators; ?>">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="advisor_assessment_expertName">
                                    <h6 class="mt-4"><b>প্রকল্প মূল্যায়নের জন্য ১-২ জন বিশেষজ্ঞের (expert/reviewer) নাম উল্লেখ করুন (একাধিক হলে কমা ব্যবহার করুন)</b><span class="text-danger"> *</span></h6>
                                </label>
                                <!-- <label for="advisor_assessment_expertName">
                        <h6><b>বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম</b><span class="text-danger"> *</span></h6>
                    </label> -->
                                <div class="ms-5">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="advisor_assessment_expertName" id="advisor_assessment_expertName" placeholder="আপনার প্রকল্প মূল্যায়নের জন্য ১-২ জন বিশেষজ্ঞের (expert/reviewer) নাম লিখুন" value="<?php echo $advisor_assessment_expertName; ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="mt-3">
                                <input type="submit" name="next-step-2" class="form-control btn btn-primary fw-bold" value="পরবর্তী ধাপ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php
        }
    }
}
?>

<?php include('author_footer.php') ?>