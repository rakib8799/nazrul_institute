<?php include('author_header.php') ?>

<?php
if (isset($_SESSION['author_role']) && $_SESSION['author_role'] === 'Student' && isset($_GET["notice_id"])) {
    if (isset($_POST['next-step-1'])) {
        extract($_POST);

        $_SESSION['researcher_notice_id'] = $_GET["notice_id"];
        $_SESSION['researcher_name_bd'] = $researcher_name_bd;
        $_SESSION['researcher_name_en'] = $researcher_name_en;
        $_SESSION['researcher_roll'] = $researcher_roll;
        $_SESSION['researcher_session'] = $researcher_session;
        $_SESSION['researcher_department'] = $researcher_department;
        $_SESSION['researcher_supervisor_name'] = $researcher_supervisor_name;
        $_SESSION['researcher_supervisor_designation'] = $researcher_supervisor_designation;
        $_SESSION['researcher_supervisor_department'] = $researcher_supervisor_department;
        $_SESSION['researcher_organization'] = $researcher_organization;

        header("location: new_paper_submission_step-2.php");
        ob_end_flush();
    }
?>
    <div class="container-fluid mt-5">
        <h3 class="text-center secondaryColor fw-bold">শিক্ষার্থীদের গবেষণা প্রকল্প/প্রস্তাব দাখিল করার আবেদনপত্রের ফরম</h3>
        <div class="col">
            <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
                <form action="" method="POST">
                    <h6><b>গবেষকের নাম</b><span class="text-danger"> *</span></h6>
                    <div class="mt-2 ms-5">
                        <label for="researcher_name_bd">বাংলায়<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="researcher_name_bd" id="researcher_name_bd" placeholder="আপনার নাম বাংলায় লিখুন" required>
                        </div>
                    </div>
                    <div class="mt-2 ms-5">
                        <label for="researcher_name_en">ইংরেজিতে (ব্লক লেটারে)<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="researcher_name_en" id="researcher_name_en" placeholder="আপনার নাম ইংরেজিতে লিখুন" required>
                        </div>
                    </div>

                    <h6 class="mt-4"><b>গবেষকের রোল, শিক্ষাবর্ষ ও বিভাগ</b><span class="text-danger"> *</span></h6>
                    <div class="mt-2 ms-5">
                        <label for="researcher_roll">রোল নাম্বার<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="researcher_roll" id="researcher_roll" placeholder="আপনার রোল নাম্বার লিখুন" required>
                        </div>
                    </div>
                    <div class="mt-2 ms-5">
                        <label for="researcher_session">শিক্ষাবর্ষ<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="researcher_session" id="researcher_session" placeholder="আপনার শিক্ষাবর্ষ লিখুন" required>
                        </div>
                    </div>
                    <div class="mt-2 ms-5">
                        <label for="researcher_department">বিভাগের নাম<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="researcher_department" id="researcher_department" placeholder="আপনার বিভাগের নাম লিখুন" required>
                        </div>
                    </div>

                    <h6 class="mt-4"><b>গবেষণা তত্ত্বাবধায়কের নাম, পদবী ও বিভাগ</b><span class="text-danger"> *</span></h6>
                    <div class="mt-2 ms-5">
                        <label for="researcher_supervisor_name">নাম<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="researcher_supervisor_name" id="researcher_supervisor_name" placeholder="গবেষণা তত্ত্বাবধায়কের নাম লিখুন" required>
                        </div>
                    </div>
                    <div class="mt-2 ms-5">
                        <label for="researcher_supervisor_designation">পদবী<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="researcher_supervisor_designation" id="researcher_supervisor_designation" placeholder="গবেষণা তত্ত্বাবধায়কের পদবী লিখুন" required>
                        </div>
                    </div>
                    <div class="mt-2 ms-5">
                        <label for="researcher_supervisor_department">বিভাগ<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="researcher_supervisor_department" id="researcher_supervisor_department" placeholder="গবেষণা তত্ত্বাবধায়কের বিভাগ লিখুন" required>
                        </div>
                    </div>

                    <div>
                        <label for="researcher_organization">
                            <h6 class="mt-4"><b>বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম</b><span class="text-danger"> *</span></h6>
                        </label>
                        <!-- <label for="researcher_organization">
                        <h6><b>বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম</b><span class="text-danger"> *</span></h6>
                    </label> -->
                        <div class="ms-5">
                            <div class="input-group">
                                <input type="text" class="form-control" name="researcher_organization" id="researcher_organization" placeholder="আপনার বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম লিখুন" required>
                            </div>
                        </div>
                    </div>



                    <div class="mt-3">
                        <input type="submit" name="next-step-1" class="form-control btn btn-primary fw-bold" value="পরবর্তী ধাপ">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
} else if (isset($_SESSION['author_role']) && $_SESSION['author_role'] === 'Teacher' && isset($_GET["notice_id"])) {
    if (isset($_POST['next-step-1'])) {
        extract($_POST);

        $_SESSION['advisor_notice_id'] = $_GET["notice_id"];
        $_SESSION['advisor_name_designation_bd'] = $advisor_name_designation_bd;
        $_SESSION['advisor_name_designation_en'] = $advisor_name_designation_en;
        $_SESSION['advisor_assistant_name_designation_bd'] = $advisor_assistant_name_designation_bd;
        $_SESSION['advisor_assistant_name_designation_en'] = $advisor_assistant_name_designation_en;
        $_SESSION['advisor_department'] = $advisor_department;
        $_SESSION['advisor_organization'] = $advisor_organization;
        $_SESSION['advisor_project_title_bd'] = $advisor_project_title_bd;
        $_SESSION['advisor_project_title_en'] = $advisor_project_title_en;
        $_SESSION['advisor_project_relatedTopic'] = $advisor_project_relatedTopic;
        $_SESSION['advisor_research_workPlace_university'] = $advisor_research_workPlace_university;
        $_SESSION['advisor_research_workPlace_department'] = $advisor_research_workPlace_department;

        header("location: new_paper_submission_step-2.php");
        ob_end_flush();
    }
?>
    <div class="container-fluid mt-5">
        <h3 class="text-center secondaryColor fw-bold">শিক্ষকদের গবেষণা প্রকল্প/প্রস্তাব দাখিল করার আবেদনপত্রের ফরম</h3>
        <div class="col">
            <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
                <form action="" method="POST">
                    <h6><b>প্রকল্প পরিচালকের নাম ও পদবি</b><span class="text-danger"> *</span></h6>
                    <div class="mt-2 ms-5">
                        <label for="advisor_name_designation_bd">বাংলায়<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="advisor_name_designation_bd" id="advisor_name_designation_bd" placeholder="প্রকল্প পরিচালকের নাম ও পদবি বাংলায় লিখুন" required>
                        </div>
                    </div>
                    <div class="mt-2 ms-5">
                        <label for="advisor_name_designation_en">ইংরেজিতে (ব্লক লেটারে)<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="advisor_name_designation_en" id="advisor_name_designation_en" placeholder="প্রকল্প পরিচালকের নাম ও পদবি ইংরেজিতে লিখুন" required>
                        </div>
                    </div>

                    <h6 class="mt-4"><b>সহ প্রকল্প পরিচালকের নাম ও পদবি (যদি থাকে)</b><span class="text-danger"> * (না থাকলে <b>নেই/নাই</b> লিখে দিন)</span></h6>
                    <div class="mt-2 ms-5">
                        <label for="advisor_assistant_name_designation_bd">বাংলায়<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="advisor_assistant_name_designation_bd" id="advisor_assistant_name_designation_bd" placeholder="সহ প্রকল্প পরিচালকের নাম ও পদবি থাকলে তা বাংলায় লিখুন" required>
                        </div>
                    </div>
                    <div class="mt-2 ms-5">
                        <label for="advisor_assistant_name_designation_en">ইংরেজিতে (ব্লক লেটারে)<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="advisor_assistant_name_designation_en" id="advisor_assistant_name_designation_en" placeholder="সহ প্রকল্প পরিচালকের নাম ও পদবি থাকলে তা ইংরেজিতে লিখুন" required>
                        </div>
                    </div>

                    <div>
                        <label for="advisor_department">
                            <h6 class="mt-4"><b>বিভাগের নাম</b><span class="text-danger"> *</span></h6>
                        </label>
                        <!-- <label for="advisor_department">
                        <h6><b>বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম</b><span class="text-danger"> *</span></h6>
                    </label> -->
                        <div class="ms-5">
                            <div class="input-group">
                                <input type="text" class="form-control" name="advisor_department" id="advisor_department" placeholder="আপনার বিভাগের নাম লিখুন" required>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="advisor_organization">
                            <h6 class="mt-4"><b>বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম</b><span class="text-danger"> *</span></h6>
                        </label>
                        <!-- <label for="advisor_organization">
                        <h6><b>বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম</b><span class="text-danger"> *</span></h6>
                    </label> -->
                        <div class="ms-5">
                            <div class="input-group">
                                <input type="text" class="form-control" name="advisor_organization" id="advisor_organization" placeholder="আপনার বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম লিখুন" required>
                            </div>
                        </div>
                    </div>

                    <h6 class="mt-4"><b>প্রকল্পের শিরোনাম</b><span class="text-danger"> *</span></h6>
                    <div class="mt-2 ms-5">
                        <label for="advisor_project_title_bd">বাংলায়<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="advisor_project_title_bd" id="advisor_project_title_bd" placeholder="আপনার প্রকল্পের শিরোনাম বাংলায় লিখুন" required>
                        </div>
                    </div>
                    <div class="mt-2 ms-5">
                        <label for="advisor_project_title_en">ইংরেজিতে (ব্লক লেটারে)<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="advisor_project_title_en" id="advisor_project_title_en" placeholder="আপনার প্রকল্পের শিরোনাম ইংরেজিতে লিখুন" required>
                        </div>
                    </div>

                    <div>
                        <label for="advisor_project_relatedTopic">
                            <h6 class="mt-4"><b>প্রকল্পের শাখা</b><span class="text-danger"> *</span></h6>
                        </label>
                        <!-- <label for="advisor_project_relatedTopic">
                        <h6><b>বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম</b><span class="text-danger"> *</span></h6>
                    </label> -->
                        <div class="ms-5">
                            <div class="input-group">
                                <!-- <input type="text" class="form-control" name="advisor_project_relatedTopic" id="advisor_project_relatedTopic" placeholder="আপনার বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম লিখুন" required> -->
                                <select name="advisor_project_relatedTopic" id="advisor_project_relatedTopic" class="form-select" required>
                                    <option value="">যেকোনো একটি শাখা বাছাই করুন</option>
                                    <option value="জীবনী">জীবনী</option>
                                    <option value="কবিতা">কবিতা</option>
                                    <option value="ছোটগল্প">ছোটগল্প</option>
                                    <option value="উপন্যাস">উপন্যাস</option>
                                    <option value="নাটক">নাটক</option>
                                    <option value="প্রবন্ধ">প্রবন্ধ</option>
                                    <option value="পত্রাবলি">পত্রাবলি</option>
                                    <option value="সংগীত">সংগীত</option>
                                    <option value="অন্যান্য">জীবন ও কর্ম সম্পর্কিত অন্যান্য বিষয়ক গবেষণা</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h6 class="mt-4"><b>গবেষণা কাজ পরিচালনার স্থান</b><span class="text-danger"> *</span></h6>
                    <div class="mt-2 ms-5">
                        <label for="advisor_research_workPlace_university">বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="advisor_research_workPlace_university" id="advisor_research_workPlace_university" placeholder="গবেষণা কাজ পরিচালনার বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম লিখুন" required>
                        </div>
                    </div>
                    <div class="mt-2 ms-5">
                        <label for="advisor_research_workPlace_department">বিভাগের নাম<span class="text-danger"> *</span></label>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" name="advisor_research_workPlace_department" id="advisor_research_workPlace_department" placeholder="গবেষণা কাজ পরিচালনার বিভাগের নাম লিখুন" required>
                        </div>
                    </div>



                    <div class="mt-3">
                        <input type="submit" name="next-step-1" class="form-control btn btn-primary fw-bold" value="পরবর্তী ধাপ">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>

<?php include('author_footer.php') ?>