<?php include("admin_header.php"); ?>
<?php include("numberToWord/BanglaNumberToWord.php") ?>
<?php
$obj = new BanglaNumberToWord();
// echo $obj->engToBn(5207.56);
?>

<div class="container-fluid my-5 text-center">
    <!-- <h3>Admin Dashboard</h3> -->
    <div class="row g-4" style="min-height: 60vh;">
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">ইন্সটিটিউট সম্পর্কে</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `about`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_about.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">ইন্সটিটিউটের বৃত্তান্ত</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `institute_details`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_institute_details.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">সকল পরিচালকগণ</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `director`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_directors.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">বর্তমান পরিচালক</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `director_message`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_director_message.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">কর্মকর্তাবৃন্দ</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `officers`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_officers.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">কর্মচারীবৃন্দ</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `staffs`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_staffs.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">গবেষকদের তথ্য</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `author_information`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_authors.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">শিক্ষার্থীদের প্রকল্প</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `project_submission_student`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_student_project_submission.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">শিক্ষকদের প্রকল্প</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `project_submission_teacher`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_teacher_project_submission.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">অনুষদ</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `faculties`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_faculties.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">অর্থবছর</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `fiscal_years`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_fiscal_years.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">শিক্ষাবর্ষ</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `session_years`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_session_years.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">পদবী</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `designations`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_designations.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">যোগাযোগ</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `contact`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_contact.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">শিক্ষা</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `educational_activities`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_educational_activities.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">গবেষণা</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `research_activities`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_research_activities.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">বক্তৃতামালা</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `speech`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_speech.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">কর্মশালা</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `work_shop`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_work_shop.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">প্রশিক্ষণ</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `training`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_training.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">আর্ট ক্যাম্প</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `art_camp`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_art_camp.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">অনুষদ অনুসারে বৃত্তি</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `nazrul_scholarship`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_nazrul_scholarship.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">বৃত্তিপ্রাপ্ত শিক্ষার্থী</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `scholarship_students`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_scholarship_student.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>

        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">সেমিনার</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `seminar`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_seminar.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">কনফারেন্স</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `conference`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_conference.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">প্রকাশিত গ্রন্থ</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `publication_book`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_published_book.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">সিলেবাস</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `syllabus`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_syllabus.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">অ্যালবাম</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `album`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_album.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">প্রামাণ্যচিত্র</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `documentary`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_documentary.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">জার্নাল</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `journal`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_journal.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">বার্ষিক প্রতিবেদন</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `reports`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_reports.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">সমঝোতা চুক্তি</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `memorandum`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_memorandum.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">গ্রন্থাগার</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `library`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_library.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">অবকাঠামো</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `infrastructure`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_infrastructure.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">নোটিশ বোর্ড</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `notices`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_notices.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow p-3">
                <h5 style="height: 70%;">সংবাদ</h5>
                <?php
                $select_from_new_paper = "SELECT * FROM `news`";
                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
                ?>
                <a href="view_news.php" class="home_anker">সর্বমোট: <?php echo $obj->engToBn($num_new_paper) ?></a>
            </div>
        </div>
    </div>
</div>
<?php include("admin_footer.php"); ?>