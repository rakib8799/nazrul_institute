<?php
ob_start();
require_once("../database/connection.php");
if (!isset($_SESSION['admin_id'])) {
  header('location: login.php');
  ob_end_flush();
}

// Set the inactivity time of 15 minutes (900 seconds)
// $inactivity_time = 15 * 60;

// if (!isset($_SESSION['admin_id']) && isset($_SESSION['last_timestamp']) && (time() - $_SESSION['last_timestamp']) > $inactivity_time) {
//   session_unset();
//   session_destroy();

//   header('location: login.php');
//   ob_end_flush();
// } else {
//   // Regenerate new session id and delete old one to prevent session fixation attack
//   session_regenerate_id(true);

//   // Update the last timestamp
//   $_SESSION['last_timestamp'] = time();
// }
?>

<?php include_once("admin_linker.php") ?>

<body style="font-family: 'Kalpurush', Arial, sans-serif">
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.php" class="app-brand-link">
            <span class="demo menu-text fw-bolder fs-3 m-auto">এডমিন প্যানেল</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item active">
            <a href="index.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">ড্যাশবোর্ড</div>
            </a>
          </li>

          <!-- Manage Institute -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Manage Institute">ইন্সটিটিউট পরিচিতি</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="view_about.php" class="menu-link">
                  <div data-i18n="View Institute About">ইন্সটিটিউট সম্পর্কে</div>
                </a>
              </li>
            </ul>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="view_institute_details.php" class="menu-link">
                  <div data-i18n="View Institute History">ইন্সটিটিউটের বৃত্তান্ত</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- Manage Members -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Manage Members">সদস্যবৃন্দ</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="view_directors.php" class="menu-link">
                  <div data-i18n="View Director">সকল পরিচালকগণ</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_director_message.php" class="menu-link">
                  <div data-i18n="View Director Message">বর্তমান পরিচালকের বিবৃতি</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_officers.php" class="menu-link">
                  <div data-i18n="View Officers">কর্মকর্তাবৃন্দ</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_staffs.php" class="menu-link">
                  <div data-i18n="View Staffs">কর্মচারীবৃন্দ</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- Manage Researchers and Project Submission -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Manage Researchers and Project Submission">গবেষকদের তথ্য ও প্রকল্প সাবমিশন</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="view_authors.php" class="menu-link">
                  <div data-i18n="View Researchers">গবেষকদের তথ্য</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_student_project_submission.php" class="menu-link">
                  <div data-i18n="View Student's Project Submission">শিক্ষার্থীদের প্রকল্পের তথ্য</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_teacher_project_submission.php" class="menu-link">
                  <div data-i18n="View Teacher's Project Submission">শিক্ষকদের প্রকল্পের তথ্য</div>
                </a>
              </li>
            </ul>

            <!-- Manage Faculty, Years and Contact -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Manage Faculty, Academic Years, Designation and Contact">অনুষদ-সাল-পদবি-যোগাযোগ</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="view_faculties.php" class="menu-link">
                  <div data-i18n="View Faculties">অনুষদ</div>
                </a>
              </li>
              <li class="menu-item">
                <!-- <a href="view_years.php" class="menu-link"> -->
                <!-- <div data-i18n="View Years">একাডেমিক সাল -->

                <!-- <li class="menu-item"> -->
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div data-i18n="View Fiscal and Session Years">একাডেমিক সাল</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="view_fiscal_years.php" class="menu-link">
                      <div data-i18n="View Fiscal Years">অর্থবছর</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="view_session_years.php" class="menu-link">
                      <div data-i18n="View Session Years">শিক্ষাবর্ষ</div>
                    </a>
                  </li>
                </ul>
                <!-- </div> -->
                <!-- </a> -->
              </li>
              <li class="menu-item">
                <a href="view_designation.php" class="menu-link">
                  <div data-i18n="View Designation">পদবি</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_contact.php" class="menu-link">
                  <div data-i18n="View Contact">যোগাযোগ</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- Manage Activities -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Manage Activities">কার্যক্রমসমূহ</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
              </li>
              <li class="menu-item">
                <a href="view_educational_activities.php" class="menu-link">
                  <div data-i18n="View Educational Activities">শিক্ষা</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_research_activities.php" class="menu-link">
                  <div data-i18n="View Research Activities">গবেষণা</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_speech.php" class="menu-link">
                  <div data-i18n="View Speech">বক্তৃতামালা</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_work_shop.php" class="menu-link">
                  <div data-i18n="View Work Shop">কর্মশালা</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_training.php" class="menu-link">
                  <div data-i18n="View Training">প্রশিক্ষণ</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_art_camp.php" class="menu-link">
                  <div data-i18n="View Art Camp">আর্ট ক্যাম্প</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- Manage Nazrul Scholarship -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Manage Nazrul Scholarship">বৃত্তি</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="view_nazrul_scholarship.php" class="menu-link">
                  <div data-i18n="View Faculty wise Scholarship">অনুষদ অনুসারে বৃত্তি</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_scholarship_student.php" class="menu-link">
                  <div data-i18n="View Scholarship Students">বৃত্তিপ্রাপ্ত শিক্ষার্থী</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- Manage Seminar and Conference -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Manage Seminar and Conference">সেমিনার ও কনফারেন্স</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="view_seminar.php" class="menu-link">
                  <div data-i18n="View Seminar">সেমিনার</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_conference.php" class="menu-link">
                  <div data-i18n="View Conference">কনফারেন্স</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- Manage Nazrul Publication -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Manage Nazrul Publication">প্রকাশনা</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="view_published_book.php" class="menu-link">
                  <div data-i18n="View Published Book">প্রকাশিত গ্রন্থ</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_syllabus.php" class="menu-link">
                  <div data-i18n="View Syllabus">সিলেবাস</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_album.php" class="menu-link">
                  <div data-i18n="View Album">অ্যালবাম</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_documentary.php" class="menu-link">
                  <div data-i18n="View Documentary">প্রামাণ্যচিত্র</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_journal.php" class="menu-link">
                  <div data-i18n="View Journal">জার্নাল</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_reports.php" class="menu-link">
                  <div data-i18n="View Report">বার্ষিক প্রতিবেদন</div>
                </a>
              </li>
            </ul>
          </li>

          <!-- Manage Others -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Manage Others">অন্যান্য</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="view_memorandum.php" class="menu-link">
                  <div data-i18n="View Memorandum">দ্বি-পাক্ষিক সমঝোতা চুক্তি</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_library.php" class="menu-link">
                  <div data-i18n="View Library">গ্রন্থাগার</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_infrastructure.php" class="menu-link">
                  <div data-i18n="View Infrastructure">অবকাঠামো</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="view_notices.php" class="menu-link">
                  <div data-i18n="View Notice">নোটিশ</div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <!-- <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
              </div>
            </div> -->
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->
              <!-- <li class="nav-item lh-1 me-3">
                <a class="github-button" href="https://github.com/themeselection/sneat-html-admin-template-free" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
              </li> -->

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../Images/logo.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../Images/logo.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <?php
                          $select_from_new_paper = "SELECT * FROM admin_information";
                          $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                          $serial_no = 1;
                          if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                            $row = mysqli_fetch_assoc($run_select_from_new_paper);
                            extract($row);
                            $_SESSION['admin_email'] = $admin_email;
                          ?>
                            <span class="fw-semibold d-block"><?php echo $admin_name ?></span>
                          <?php
                          }
                          ?>
                          <small class="text-muted">এডমিন</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="edit_admin_profile.php?profile_id=<?php echo $_SESSION['admin_id'] ?>">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">প্রোফাইল</span>
                    </a>
                  </li>
                  <!-- <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li> -->
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="admin_logout.php">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">লগআউট</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->