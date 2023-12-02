<?php require_once("database/connection.php"); ?>

<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark fw-bold" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="./Images/unnamed.jpg" alt="logo" class="img-fluid" style="width: 40px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php">হোম</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'institute_details.php' ? 'active' : ''; ?>" href="institute_details.php">ইন্সটিটিউট পরিচিতি</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        সদস্যবৃন্দ
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'about_director.php' ? 'active' : ''; ?>" href="about_director.php">বর্তমান পরিচালক</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'about_previous_director.php' ? 'active' : ''; ?>" href="about_previous_director.php">সকল পরিচালকগণ</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'other_officers.php' ? 'active' : ''; ?>" href="other_officers.php">কর্মকর্তাবৃন্দ</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'other_staffs.php' ? 'active' : ''; ?>" href="other_staffs.php">কর্মচারীবৃন্দ</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        কার্যক্রমসমূহ
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'educational_activities.php' ? 'active' : ''; ?>" href="educational_activities.php">শিক্ষা</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'research_activities.php' ? 'active' : ''; ?>" href="research_activities.php">গবেষণা</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'speech.php' ? 'active' : ''; ?>" href="speech.php">বক্তৃতামালা</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'workshop.php' ? 'active' : ''; ?>" href="workshop.php">কর্মশালা</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'training.php' ? 'active' : ''; ?>" href="training.php">প্রশিক্ষণ</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'art_camp.php' ? 'active' : ''; ?>" href="art_camp.php">আর্ট ক্যাম্প</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        বৃত্তি
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'faculty_scholarship.php' ? 'active' : ''; ?>" href="faculty_scholarship.php">অনুষদ অনুসারে</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'student_scholarship.php' ? 'active' : ''; ?>" href="student_scholarship.php">বৃত্তিপ্রাপ্ত শিক্ষার্থী</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        সেমিনার ও কনফারেন্স
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'seminar.php' ? 'active' : ''; ?>" href="seminar.php">সেমিনার</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'conference.php' ? 'active' : ''; ?>" href="conference.php">কনফারেন্স</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        প্রকাশনা
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'published_book.php' ? 'active' : ''; ?>" href="published_book.php">প্রকাশিত গ্রন্থ</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'syllabus.php' ? 'active' : ''; ?>" href="syllabus.php">সিলেবাস</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'album.php' ? 'active' : ''; ?>" href="album.php">অ্যালবাম</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'documentary.php' ? 'active' : ''; ?>" href="documentary.php">প্রামাণ্যচিত্র</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'journal.php' ? 'active' : ''; ?>" href="journal.php">জার্নাল</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'report.php' ? 'active' : ''; ?>" href="report.php">বার্ষিক প্রতিবেদন</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : ''; ?>" href="login.php">লগইন</a>
                </li>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        অন্যান্য
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'memorandum.php' ? 'active' : ''; ?>" href="memorandum.php">দ্বি-পাক্ষিক সমঝোতা চুক্তি</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'library.php' ? 'active' : ''; ?>" href="library.php">গ্রন্থাগার</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'infrastructure.php' ? 'active' : ''; ?>" href="infrastructure.php">অবকাঠামো</a></li>
                        <li><a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'notice_board.php' ? 'active' : ''; ?>" href="notice_board.php">নোটিশ বোর্ড</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact_us.php' ? 'active' : ''; ?>" href="contact_us.php">যোগাযোগ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>