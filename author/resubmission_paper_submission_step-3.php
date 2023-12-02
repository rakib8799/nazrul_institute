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
            if (isset($_POST['next-step-3'])) {
                extract($_POST);

                $_SESSION['researcher_salaryExp'] = $researcher_salaryExp;
                $_SESSION['researcher_supervisorSalaryExp'] = $researcher_supervisorSalaryExp;
                $_SESSION['researcher_fieldWorkExp'] = $researcher_fieldWorkExp;
                $_SESSION['researcher_seminarExp'] = $researcher_seminarExp;
                $_SESSION['researcher_travelExp'] = $researcher_travelExp;
                $_SESSION['researcher_itemsExp'] = $researcher_itemsExp;
                $_SESSION['researcher_reportExp'] = $researcher_reportExp;
                $_SESSION['researcher_extraExp'] = $researcher_extraExp;
                $_SESSION['researcher_sixMonthTotalExp'] = $researcher_sixMonthTotalExp;
                $_SESSION['long_desc8'] = $long_desc8;
                $_SESSION['researcher_final_report_file'] = 'N/A';

                header("location: paper_resubmit.php");
                ob_end_flush();
            }
?>
            <div class="container-fluid mt-5">
                <!-- <h3 class="text-center secondaryColor fw-bold">নতুন প্রকল্প সাবমিশন করুন</h3> -->
                <div class="col">
                    <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
                        <form action="" method="POST" enctype="multipart/form-data" onsubmit="return confirmPaper()">
                            <h6><b>ইন্সটিটিউট থেকে চাহিত আর্থিক সহায়তার খাতওয়ারী বিবরণঃ ৫০০০০ টাকা (খাতওয়ারী বাজেটের বিবরণ নিম্নে দেওয়া হলো)</b><span class="text-danger"> *</span></h6>
                            <div class="mt-2 ms-5">
                                <label for="researcher_salaryExp">গবেষকের সম্মানী<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_salaryExp" id="researcher_salaryExp" placeholder="আপনার সম্মানীর পরিমাণ লিখুন" value="<?php echo $researcher_salaryExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="researcher_supervisorSalaryExp">গবেষণা তত্ত্বাবধায়কের সম্মানী (মোট টাকার ১৫%)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_supervisorSalaryExp" id="researcher_supervisorSalaryExp" placeholder="গবেষণা তত্ত্বাবধায়কের সম্মানীর পরিমাণ লিখুন" value="<?php echo $researcher_supervisorSalaryExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="researcher_fieldWorkExp">তথ্য সংগ্রহ/জরীপ/নমুনা সংগ্রহ ও বিশ্লেষণ/মাঠ পর্যায়ে গবেষণা<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_fieldWorkExp" id="researcher_fieldWorkExp" placeholder="মাঠ পর্যায়ে গবেষণার ব্যয়ের পরিমাণ লিখুন" value="<?php echo $researcher_fieldWorkExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="researcher_seminarExp">সেমিনার (প্রকল্পের চূড়ান্ত রিপোর্ট জমা দেয়ার পূর্বে অবশ্যই একটি সেমিনারের আয়োজন করতে হবে)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_seminarExp" id="researcher_seminarExp" placeholder="সেমিনার আয়োজনের জন্য ব্যয়ের পরিমাণ লিখুন" value="<?php echo $researcher_seminarExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="researcher_travelExp">ভ্রমণ ব্যয়/যাতায়াত ব্যয়<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_travelExp" id="researcher_travelExp" placeholder="ভ্রমণ ব্যয়ের পরিমাণ লিখুন" value="<?php echo $researcher_travelExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="researcher_itemsExp">মনোহারী দ্রব্যাদি ক্রয় খাতে ব্যয় (সর্বোচ্চ ২০০০ পর্যন্ত)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_itemsExp" id="researcher_itemsExp" placeholder="মনোহারী দ্রব্যাদি ক্রয় খাতের পরিমাণ লিখুন" value="<?php echo $researcher_itemsExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="researcher_reportExp">প্রতিবেদন প্রণয়ন ও বাঁধাই ব্যয় (সর্বোচ্চ ৫০০০ পর্যন্ত)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_reportExp" id="researcher_reportExp" placeholder="প্রতিবেদন প্রণয়ন ও বাঁধাই ব্যয়ের পরিমাণ লিখুন" value="<?php echo $researcher_reportExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="researcher_extraExp">বিবিধ (সর্বোচ্চ ২০০০ পর্যন্ত)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_extraExp" id="researcher_extraExp" placeholder="আরো কোনো খাতে ব্যয় হলে তার পরিমাণ লিখুন" value="<?php echo $researcher_extraExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="researcher_sixMonthTotalExp">৬ (ছয়) মাস মেয়াদী প্রকল্পের মোট ব্যয় (সর্বোচ্চ ৫০০০০ পর্যন্ত)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_sixMonthTotalExp" id="researcher_sixMonthTotalExp" placeholder="ছয় মাস মেয়াদী প্রকল্পের মোট ব্যয়ের পরিমাণ লিখুন" value="<?php echo $researcher_sixMonthTotalExp; ?>">
                                </div>
                            </div>
                            <div>
                                <label for="long_desc8">
                                    <h6 class="mt-4"><b>প্রকল্পের ফলাফল কোনো ডিগ্রী লাভের উদ্দ্যশ্যে ব্যবহৃত হলে তার বিবরণ</b><span class="text-danger"> *</span></h6>
                                </label>

                                <div class="ms-5">
                                    <textarea name="long_desc8" class="long_desc" id="long_desc8"><?php echo $researcher_projectResultForDegree; ?></textarea>
                                </div>
                            </div>

                            <div class="mt-3">
                                <input type="submit" name="next-step-3" class="form-control btn btn-primary fw-bold" value="সাবমিট" onclick="return confirmSubmission()">
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
            if (isset($_POST['next-step-3'])) {
                extract($_POST);

                $_SESSION['advisor_project_salaryExp'] = $advisor_project_salaryExp;
                $_SESSION['advisor_assisstantSalaryExp'] = $advisor_assisstantSalaryExp;
                $_SESSION['advisor_unavailable_elementsExp'] = $advisor_unavailable_elementsExp;
                $_SESSION['advisor_fieldWorkExp'] = $advisor_fieldWorkExp;
                $_SESSION['advisor_seminarExp'] = $advisor_seminarExp;
                $_SESSION['advisor_travelExp'] = $advisor_travelExp;
                $_SESSION['advisor_itemsExp'] = $advisor_itemsExp;
                $_SESSION['advisor_reportExp'] = $advisor_reportExp;
                $_SESSION['advisor_extraExp'] = $advisor_extraExp;
                $_SESSION['advisor_sixMonthTotalExp'] = $advisor_sixMonthTotalExp;
                $_SESSION['advisor_prev_economicHelp'] = $advisor_prev_economicHelp;
                $_SESSION['advisor_economicApproval'] = $advisor_economicApproval;
                $_SESSION['advisor_final_report_date'] = $advisor_final_report_date;
                $_SESSION['advisor_final_report_currentCondition'] = $advisor_final_report_currentCondition;
                $_SESSION['advisor_economicHelping_org'] = $advisor_economicHelping_org;
                $_SESSION['advisor_economicHelping_project'] = $advisor_economicHelping_project;
                $_SESSION['advisor_economicHelping_money'] = $advisor_economicHelping_money;
                $_SESSION['advisor_economicHelping_finishingDate'] = $advisor_economicHelping_finishingDate;
                $_SESSION['long_desc10'] = $long_desc10;
                $_SESSION['advisor_final_report_file'] = 'N/A';

                header("location: paper_resubmit.php");
                ob_end_flush();
            }
        ?>
            <div class="container-fluid mt-5">
                <!-- <h3 class="text-center secondaryColor fw-bold">নতুন প্রকল্প সাবমিশন করুন</h3> -->
                <div class="col">
                    <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
                        <form action="" method="POST" enctype="multipart/form-data" onsubmit="return confirmPaper()">
                            <h6><b>ইন্সটিটিউট থেকে চাহিত আর্থিক সহায়তার খাতওয়ারী বিবরণঃ ৭০০০০ টাকা (খাতওয়ারী বাজেটের বিবরণ নিম্নে দেওয়া হলো)</b><span class="text-danger"> *</span></h6>
                            <div class="mt-2 ms-5">
                                <label for="advisor_project_salaryExp">প্রকল্প পরিচালকের সম্মানী<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_project_salaryExp" id="advisor_project_salaryExp" placeholder="প্রকল্প পরিচালকের সম্মানীর পরিমাণ লিখুন" value="<?php echo $advisor_project_salaryExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_assisstantSalaryExp">গবেষণা সহকারী/শ্রমিকের মাসিক ভাতা/মজুরী (যদি থাকে)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_assisstantSalaryExp" id="advisor_assisstantSalaryExp" placeholder="গবেষণা তত্ত্বাবধায়কের সম্মানীর পরিমাণ লিখুন" value="<?php echo $advisor_assisstantSalaryExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_unavailable_elementsExp">গবেষণার উপকরণ ব্যয় (নিজ বিশ্ববিদ্যালয়/প্রতিষ্ঠান থেকে পাওয়া যাবে না এমন উপকরণাদির মূল্য তালিকা)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_unavailable_elementsExp" id="advisor_unavailable_elementsExp" placeholder="নিজ বিশ্ববিদ্যালয়/প্রতিষ্ঠান থেকে পাওয়া যাবে না এমন উপকরণের ব্যয়ের পরিমাণ লিখুন" value="<?php echo $advisor_unavailable_elementsExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_fieldWorkExp">তথ্য সংগ্রহ/জরীপ/নমুনা সংগ্রহ ও বিশ্লেষণ/মাঠ পর্যায়ে গবেষণা<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_fieldWorkExp" id="advisor_fieldWorkExp" placeholder="মাঠ পর্যায়ে গবেষণার ব্যয়ের পরিমাণ লিখুন" value="<?php echo $advisor_fieldWorkExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_seminarExp">সেমিনার (প্রকল্পের চূড়ান্ত রিপোর্ট জমা দেয়ার পূর্বে অবশ্যই একটি সেমিনারের আয়োজন করতে হবে)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_seminarExp" id="advisor_seminarExp" placeholder="সেমিনার আয়োজনের জন্য ব্যয়ের পরিমাণ লিখুন" value="<?php echo $advisor_seminarExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_travelExp">ভ্রমণ ব্যয়/যাতায়াত ব্যয়<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_travelExp" id="advisor_travelExp" placeholder="ভ্রমণ ব্যয়ের পরিমাণ লিখুন" value="<?php echo $advisor_travelExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_itemsExp">মনোহারী দ্রব্যাদি ক্রয় খাতে ব্যয় (সর্বোচ্চ ২০০০ পর্যন্ত)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_itemsExp" id="advisor_itemsExp" placeholder="মনোহারী দ্রব্যাদি ক্রয় খাতের পরিমাণ লিখুন" value="<?php echo $advisor_itemsExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_reportExp">প্রতিবেদন প্রণয়ন ও বাঁধাই ব্যয় (সর্বোচ্চ ৫০০০ পর্যন্ত)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_reportExp" id="advisor_reportExp" placeholder="প্রতিবেদন প্রণয়ন ও বাঁধাই ব্যয়ের পরিমাণ লিখুন" value="<?php echo $advisor_reportExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_extraExp">বিবিধ (সর্বোচ্চ ২০০০ পর্যন্ত)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_extraExp" id="advisor_extraExp" placeholder="আরো কোনো খাতে ব্যয় হলে তার পরিমাণ লিখুন" value="<?php echo $advisor_extraExp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_sixMonthTotalExp">৬ (ছয়) মাস মেয়াদী প্রকল্পের মোট ব্যয় (সর্বোচ্চ ৭০০০০ পর্যন্ত)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_sixMonthTotalExp" id="advisor_sixMonthTotalExp" placeholder="ছয় মাস মেয়াদী প্রকল্পের মোট ব্যয়ের পরিমাণ লিখুন" value="<?php echo $advisor_sixMonthTotalExp; ?>">
                                </div>
                            </div>
                            <h6 class="mt-4"><b>ইতিপূর্বে কোনো গবেষণা প্রকল্পের জন্য অত্র বিশ্ববিদ্যালয় অথবা বিশ্ববিদ্যালয় মঞ্জুরী কমিশন থেকে আর্থিক অনুদান নিয়ে থাকলে তার বিবরণ</b><span class="text-danger"> * (না থাকলে <b>নেই/নাই</b> লিখে দিন)</span></h6>
                            <div class="mt-2 ms-5">
                                <label for="advisor_prev_economicHelp">প্রকল্প (গুলো) অনুমোদনের সাল<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_prev_economicHelp" id="advisor_prev_economicHelp" placeholder="প্রকল্পগুলোর অনুমোদনের সাল লিখুন" value="<?php echo $advisor_prev_economicHelp; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_economicApproval">আর্থিক মঞ্জুরীর পরিমাণ (প্রকল্প ভিত্তিক)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_economicApproval" id="advisor_economicApproval" placeholder="আপনার আর্থিক মঞ্জুরীর পরিমাণ লিখুন" value="<?php echo $advisor_economicApproval; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_final_report_date">প্রকল্পের চূড়ান্ত রিপোর্ট বিশ্ববিদ্যালয়/কমিশনে জমা দেয়ার তারিখ<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_final_report_date" id="advisor_final_report_date" placeholder="প্রকল্পের চূড়ান্ত রিপোর্ট বিশ্ববিদ্যালয়/কমিশনে জমা দেয়ার তারিখ লিখুন" value="<?php echo $advisor_final_report_date; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_final_report_currentCondition">চূড়ান্ত রিপোর্ট বিশ্ববিদ্যালয়/কমিশনে জমা না হলে তার বর্তমান অবস্থার বিবরণ<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_final_report_currentCondition" id="advisor_final_report_currentCondition" placeholder="চূড়ান্ত রিপোর্ট বিশ্ববিদ্যালয়/কমিশনে জমা না হলে তার বর্তমান অবস্থার বিবরণ লিখুন" value="<?php echo $advisor_final_report_currentCondition; ?>">
                                </div>
                            </div>
                            <h6 class="mt-4"><b>অন্য কোনো সংস্থা থেকে আর্থিক সাহায্য নিয়ে বর্তমানে একই ধরণের গবেষণা প্রকল্প বাস্তবায়নাধীন থাকলে</b><span class="text-danger"> * (না থাকলে <b>নেই/নাই</b> লিখে দিন)</span></h6>
                            <div class="mt-2 ms-5">
                                <label for="advisor_economicHelping_org">সাহায্যকারী সংস্থার নাম<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_economicHelping_org" id="advisor_economicHelping_org" placeholder="আর্থিক সাহায্যকারী সংস্থার নাম লিখুন" value="<?php echo $advisor_economicHelping_org; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_economicHelping_project">প্রকল্পের নাম<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_economicHelping_project" id="advisor_economicHelping_project" placeholder="আপনার প্রকল্পের নাম লিখুন" value="<?php echo $advisor_economicHelping_project; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_economicHelping_money">আর্থিক অনুদানের পরিমাণ<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_economicHelping_money" id="advisor_economicHelping_money" placeholder="আর্থিক অনুদানের পরিমাণ লিখুন" value="<?php echo $advisor_economicHelping_money; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_economicHelping_finishingDate">সমাপ্তির তারিখ<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_economicHelping_finishingDate" id="advisor_economicHelping_finishingDate" placeholder="প্রকল্পের সমাপ্তির তারিখ লিখুন" value="<?php echo $advisor_economicHelping_finishingDate; ?>">
                                </div>
                            </div>

                            <div>
                                <label for="long_desc10">
                                    <h6 class="mt-4"><b>প্রকল্পের ফলাফল কোনো ডিগ্রী লাভের উদ্দ্যশ্যে ব্যবহৃত হলে তার বিবরণ</b><span class="text-danger"> *</span></h6>
                                </label>

                                <div class="ms-5">
                                    <textarea name="long_desc10" class="long_desc" id="long_desc10"><?php echo $advisor_projectResultForDegree; ?></textarea>
                                </div>
                            </div>

                            <div class="mt-3">
                                <input type="submit" name="next-step-3" class="form-control btn btn-primary fw-bold" value="সাবমিট" onclick="return confirmSubmission()">
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
    }
}
?>

<?php include('author_footer.php') ?>