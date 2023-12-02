<?php include('author_header.php') ?>
<link rel="stylesheet" href="../style.css">

<?php
if (isset($_SESSION['author_role'], $_SESSION['author_id'], $_GET["resubmission_paper_id"]) && $_SESSION['author_role'] === 'Student') {
    $resubmission_paper_id = $_GET["resubmission_paper_id"];
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
            if (isset($_POST['next-step-1'])) {
                extract($_POST);

                $_SESSION['resubmission_paper_id'] = $_GET["resubmission_paper_id"];
                $_SESSION['researcher_resubmission_paper_id'] = $_GET["resubmission_paper_id"];
                $_SESSION['researcher_name_bd'] = $researcher_name_bd;
                $_SESSION['researcher_name_en'] = $researcher_name_en;
                $_SESSION['researcher_roll'] = $researcher_roll;
                $_SESSION['researcher_session'] = $researcher_session;
                $_SESSION['researcher_department'] = $researcher_department;
                $_SESSION['researcher_supervisor_name'] = $researcher_supervisor_name;
                $_SESSION['researcher_supervisor_designation'] = $researcher_supervisor_designation;
                $_SESSION['researcher_supervisor_department'] = $researcher_supervisor_department;
                $_SESSION['researcher_organization'] = $researcher_organization;

                header("location: resubmission_paper_submission_step-2.php");
                ob_end_flush();
            }
?>
            <div class="container-fluid mt-5">
                <h3 class="text-center secondaryColor fw-bold">শিক্ষার্থীদের গবেষণা প্রকল্প/প্রস্তাব দাখিল করার আবেদনপত্রের ফরম</h3>
                <div class="col">
                    <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
                        <form action="" method="POST" enctype="multipart/form-data" onsubmit="return confirmPaper()">
                            <h6><b>গবেষকের নাম</b><span class="text-danger"> *</span></h6>
                            <div class="mt-2 ms-5">
                                <label for="researcher_name_bd">বাংলায়<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_name_bd" id="researcher_name_bd" placeholder="আপনার নাম বাংলায় লিখুন" value="<?php echo $researcher_name_bd; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="researcher_name_en">ইংরেজিতে (ব্লক লেটারে)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_name_en" id="researcher_name_en" placeholder="আপনার নাম ইংরেজিতে লিখুন" value="<?php echo $researcher_name_en; ?>">
                                </div>
                            </div>

                            <h6 class="mt-4"><b>গবেষকের রোল, শিক্ষাবর্ষ ও বিভাগ</b><span class="text-danger"> *</span></h6>
                            <div class="mt-2 ms-5">
                                <label for="researcher_roll">রোল নাম্বার<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_roll" id="researcher_roll" placeholder="আপনার রোল নাম্বার লিখুন" value="<?php echo $researcher_roll; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="researcher_session">শিক্ষাবর্ষ<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_session" id="researcher_session" placeholder="আপনার শিক্ষাবর্ষ লিখুন" value="<?php echo $researcher_session; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="researcher_department">বিভাগের নাম<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_department" id="researcher_department" placeholder="আপনার বিভাগের নাম লিখুন" value="<?php echo $researcher_department; ?>">
                                </div>
                            </div>

                            <h6 class="mt-4"><b>গবেষণা তত্ত্বাবধায়কের নাম, পদবী ও বিভাগ</b><span class="text-danger"> *</span></h6>
                            <div class="mt-2 ms-5">
                                <label for="researcher_supervisor_name">নাম<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_supervisor_name" id="researcher_supervisor_name" placeholder="গবেষণা তত্ত্বাবধায়কের নাম লিখুন" value="<?php echo $researcher_supervisor_name; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="researcher_supervisor_designation">পদবী<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_supervisor_designation" id="researcher_supervisor_designation" placeholder="গবেষণা তত্ত্বাবধায়কের পদবী লিখুন" value="<?php echo $researcher_supervisor_designation; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="researcher_supervisor_department">বিভাগ<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="researcher_supervisor_department" id="researcher_supervisor_department" placeholder="গবেষণা তত্ত্বাবধায়কের বিভাগ লিখুন" value="<?php echo $researcher_supervisor_department; ?>">
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
                                        <input type="text" class="form-control" name="researcher_organization" id="researcher_organization" placeholder="আপনার বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম লিখুন" value="<?php echo $researcher_organization; ?>">
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
        }
    }
} else if (isset($_SESSION['author_role'], $_SESSION['author_id'], $_GET["resubmission_paper_id"]) && $_SESSION['author_role'] === 'Teacher') {
    $resubmission_paper_id = $_GET["resubmission_paper_id"];
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
            if (isset($_POST['next-step-1'])) {
                extract($_POST);

                $_SESSION['resubmission_paper_id'] = $_GET["resubmission_paper_id"];
                $_SESSION['advisor_resubmission_paper_id'] = $_GET["resubmission_paper_id"];
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

                header("location: resubmission_paper_submission_step-2.php");
                ob_end_flush();
            }
        ?>
            <div class="container-fluid mt-5">
                <h3 class="text-center secondaryColor fw-bold">শিক্ষকদের গবেষণা প্রকল্প/প্রস্তাব দাখিল করার আবেদনপত্রের ফরম</h3>
                <div class="col">
                    <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
                        <form action="" method="POST" enctype="multipart/form-data" onsubmit="return confirmPaper()">
                            <h6><b>প্রকল্প পরিচালকের নাম ও পদবি</b><span class="text-danger"> *</span></h6>
                            <div class="mt-2 ms-5">
                                <label for="advisor_name_designation_bd">বাংলায়<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_name_designation_bd" id="advisor_name_designation_bd" placeholder="প্রকল্প পরিচালকের নাম ও পদবি বাংলায় লিখুন" value="<?php echo $advisor_name_designation_bd; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_name_designation_en">ইংরেজিতে (ব্লক লেটারে)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_name_designation_en" id="advisor_name_designation_en" placeholder="প্রকল্প পরিচালকের নাম ও পদবি ইংরেজিতে লিখুন" value="<?php echo $advisor_name_designation_en; ?>">
                                </div>
                            </div>

                            <h6 class="mt-4"><b>সহ প্রকল্প পরিচালকের নাম ও পদবি (যদি থাকে)</b><span class="text-danger"> * (না থাকলে <b>নেই/নাই</b> লিখে দিন)</span></h6>
                            <div class="mt-2 ms-5">
                                <label for="advisor_assistant_name_designation_bd">বাংলায়<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_assistant_name_designation_bd" id="advisor_assistant_name_designation_bd" placeholder="সহ প্রকল্প পরিচালকের নাম ও পদবি থাকলে তা বাংলায় লিখুন" value="<?php echo $advisor_assistant_name_designation_bd; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_assistant_name_designation_en">ইংরেজিতে (ব্লক লেটারে)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_assistant_name_designation_en" id="advisor_assistant_name_designation_en" placeholder="সহ প্রকল্প পরিচালকের নাম ও পদবি থাকলে তা ইংরেজিতে লিখুন" value="<?php echo $advisor_assistant_name_designation_en; ?>">
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
                                        <input type="text" class="form-control" name="advisor_department" id="advisor_department" placeholder="আপনার বিভাগের নাম লিখুন" value="<?php echo $advisor_department; ?>">
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
                                        <input type="text" class="form-control" name="advisor_organization" id="advisor_organization" placeholder="আপনার বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম লিখুন" value="<?php echo $advisor_organization; ?>">
                                    </div>
                                </div>
                            </div>

                            <h6 class="mt-4"><b>প্রকল্পের শিরোনাম</b><span class="text-danger"> *</span></h6>
                            <div class="mt-2 ms-5">
                                <label for="advisor_project_title_bd">বাংলায়<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_project_title_bd" id="advisor_project_title_bd" placeholder="আপনার প্রকল্পের শিরোনাম বাংলায় লিখুন" value="<?php echo $advisor_project_title_bd; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_project_title_en">ইংরেজিতে (ব্লক লেটারে)<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_project_title_en" id="advisor_project_title_en" placeholder="আপনার প্রকল্পের শিরোনাম ইংরেজিতে লিখুন" value="<?php echo $advisor_project_title_en; ?>">
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
                                        <!-- <input type="text" class="form-control" name="advisor_project_relatedTopic" id="advisor_project_relatedTopic" placeholder="আপনার বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম লিখুন" value="<?php echo $researcher_name_en; ?>"> -->
                                        <select name="advisor_project_relatedTopic" id="advisor_project_relatedTopic" class="form-select">
                                            <option value="">যেকোনো একটি শাখা বাছাই করুন</option>
                                            <?php
                                            $select_from_new_paper = "SELECT DISTINCT advisor_project_relatedTopic FROM `project_submission_teacher` ORDER BY id";
                                            $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                            if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                                                $row1 = mysqli_fetch_assoc($run_select_from_new_paper);
                                            ?>
                                                <option value="জীবনী" <?php if ("জীবনী" == $row1['advisor_project_relatedTopic']) {
                                                                            echo "selected";
                                                                        } ?>>জীবনী</option>
                                                <option value="কবিতা" <?php if ("কবিতা" == $row1['advisor_project_relatedTopic']) {
                                                                            echo "selected";
                                                                        } ?>>কবিতা</option>
                                                <option value="ছোটগল্প" <?php if ("ছোটগল্প" == $row1['advisor_project_relatedTopic']) {
                                                                            echo "selected";
                                                                        } ?>>ছোটগল্প</option>
                                                <option value="উপন্যাস" <?php if ("উপন্যাস" == $row1['advisor_project_relatedTopic']) {
                                                                            echo "selected";
                                                                        } ?>>উপন্যাস</option>
                                                <option value="নাটক" <?php if ("নাটক" == $row1['advisor_project_relatedTopic']) {
                                                                            echo "selected";
                                                                        } ?>>নাটক</option>
                                                <option value="প্রবন্ধ" <?php if ("প্রবন্ধ" == $row1['advisor_project_relatedTopic']) {
                                                                            echo "selected";
                                                                        } ?>>প্রবন্ধ</option>
                                                <option value="পত্রাবলি" <?php if ("পত্রাবলি" == $row1['advisor_project_relatedTopic']) {
                                                                                echo "selected";
                                                                            } ?>>পত্রাবলি</option>
                                                <option value="সংগীত" <?php if ("সংগীত" == $row1['advisor_project_relatedTopic']) {
                                                                            echo "selected";
                                                                        } ?>>সংগীত</option>
                                                <option value="অন্যান্য" <?php if ("অন্যান্য" == $row1['advisor_project_relatedTopic']) {
                                                                                echo "selected";
                                                                            } ?>>জীবন ও কর্ম সম্পর্কিত অন্যান্য বিষয়ক গবেষণা</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h6 class="mt-4"><b>গবেষণা কাজ পরিচালনার স্থান</b><span class="text-danger"> *</span></h6>
                            <div class="mt-2 ms-5">
                                <label for="advisor_research_workPlace_university">বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_research_workPlace_university" id="advisor_research_workPlace_university" placeholder="গবেষণা কাজ পরিচালনার বিশ্ববিদ্যালয়/প্রতিষ্ঠানের নাম লিখুন" value="<?php echo $advisor_research_workPlace_university; ?>">
                                </div>
                            </div>
                            <div class="mt-2 ms-5">
                                <label for="advisor_research_workPlace_department">বিভাগের নাম<span class="text-danger"> *</span></label>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="advisor_research_workPlace_department" id="advisor_research_workPlace_department" placeholder="গবেষণা কাজ পরিচালনার বিভাগের নাম লিখুন" value="<?php echo $advisor_research_workPlace_department; ?>">
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
    }
}
?>

<?php include('author_footer.php') ?>