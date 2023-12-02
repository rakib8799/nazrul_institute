<?php
ob_start();
require_once("../database/connection.php");
if (!isset($_SESSION['author_id'])) {
  header('location: ../index.php');
  ob_end_flush();
}
?>



<?php include_once("author_linker.php") ?>

<body style="font-family: 'Kalpurush', Arial, sans-serif">
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.php" class="app-brand-link">
            <!-- <img src="../Images/ICTBJ Logo.jpg" class="img-fluid" width="40vw" alt=""> -->
            <span class="demo menu-text fw-bolder fs-4 m-auto"><?php if (isset($_SESSION['author_role'])) echo $_SESSION['author_role'] ?> প্যানেল</span>
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

          <!-- Extended Abstract -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Extended Abstract">প্রকল্প ফরম</div>
            </a>

            <ul class="menu-sub">
              <!-- <li class="menu-item">
                <a href="new_paper_submission_step-1.php" class="menu-link">
                  <div data-i18n="Submit Paper">সাবমিশন</div>
                </a>
              </li> -->
              <li class="menu-item">
                <a href="all_papers.php" class="menu-link">
                  <div data-i18n="Paper Details">সকল প্রকল্পগুলোর বিস্তারিত দেখা</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="new_papers.php" class="menu-link">
                  <div data-i18n="Paper Details">নতুন সাবমিট করা প্রকল্পগুলোর বিস্তারিত</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="resubmission_papers.php" class="menu-link">
                  <div data-i18n="Paper Details">সাবমিট করা ত্রুটিযুক্ত প্রকল্পগুলোর বিস্তারিত</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="resubmission_papers_updated.php" class="menu-link">
                  <div data-i18n="Paper Details">পুনরায় সাবমিট করা প্রকল্পগুলোর বিস্তারিত</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="report_submission.php" class="menu-link">
                  <div data-i18n="Paper Details">চূড়ান্ত প্রতিবেদন জমা</div>
                </a>
              </li>
              <!-- <div class="mt-2 ms-5">
                <label for="pdf_file">প্রকল্পটির প্রস্তাবনার পিডিএফ ফাইল সংযুক্তি<span class="text-danger"> *</span></label>
                <input type="file" name="pdf_file" class="form-control" id="pdf_file" required>
              </div> -->
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
                          $select_from_new_paper = "SELECT * FROM author_information WHERE author_id ='$_SESSION[author_id]'";
                          $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                          $serial_no = 1;
                          if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                            $row = mysqli_fetch_assoc($run_select_from_new_paper);
                            extract($row);
                            $_SESSION['author_email'] = $author_email;
                          ?>
                            <span class="fw-semibold d-block"><?php echo $author_name ?></span>
                          <?php
                          }
                          ?>
                          <small class="text-muted"><?php if (isset($_SESSION['author_role'])) echo $_SESSION['author_role'] ?></small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="edit_author_profile.php?profile_id=<?php echo $_SESSION['author_id'] ?>">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">প্রোফাইল</span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="author_logout.php">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">লগ আউট</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->