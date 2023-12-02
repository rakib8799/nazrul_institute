<?php include("author_header.php"); ?>
<?php include("../admin/numberToWord/BanglaNumberToWord.php") ?>
<?php
$obj = new BanglaNumberToWord();
// echo $obj->engToBn(5207.56);
?>
<div class="container-fluid mt-3 text-center">
   <!-- <h3>Author Dashboard</h3> -->
   <div class="row">
      <div class="col-md-3 col-12 mt-2">
         <div class="card shadow p-3 mb-5" style="border-radius: 8px; height: 15vh;">
            <h5 style="height: 70%;"><i class="fa-solid fa-check-double m-1"></i> সকল প্রকল্পগুলো</h5>
            <?php
            if (isset($_SESSION['author_role']) && $_SESSION['author_role'] === 'Student') {
               // select paper information
               $select_from_new_paper = "SELECT * FROM `project_submission_student` WHERE `researcher_author_id` = '$_SESSION[author_id]'";
               $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
               $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
            ?>
               <a href="all_papers.php" class="home_anker">সর্বমোট প্রকল্প: <?php echo $obj->engToBn($num_new_paper) ?></a>
            <?php
            } else {
               $select_from_new_paper = "SELECT * FROM `project_submission_teacher` WHERE `advisor_author_id` = '$_SESSION[author_id]'";
               $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
               $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
            ?>
               <a href="all_papers.php" class="home_anker">সর্বমোট প্রকল্প: <?php echo $obj->engToBn($num_new_paper) ?></a>
            <?php
            }
            ?>
         </div>
      </div>
      <div class="col-md-3 col-12 mt-2">
         <div class="card shadow p-3 mb-5" style="border-radius: 8px; height: 15vh;">
            <h5 style="height: 70%;"><i class="fa-solid fa-check-double m-1"></i> নতুন সাবমিট করা প্রকল্পগুলো</h5>
            <?php
            if (isset($_SESSION['author_role']) && $_SESSION['author_role'] === 'Student') {
               // select paper information
               $select_from_new_paper = "SELECT * FROM `project_submission_student` WHERE `researcher_author_id` = '$_SESSION[author_id]' AND `paper_status` = '1'";
               $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
               $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
            ?>
               <a href="new_papers.php" class="home_anker">সর্বমোট প্রকল্প: <?php echo $obj->engToBn($num_new_paper) ?></a>
            <?php
            } else {
               $select_from_new_paper = "SELECT * FROM `project_submission_teacher` WHERE `advisor_author_id` = '$_SESSION[author_id]' AND `paper_status` = '1'";
               $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
               $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
            ?>
               <a href="new_papers.php" class="home_anker">সর্বমোট প্রকল্প: <?php echo $obj->engToBn($num_new_paper) ?></a>
            <?php
            }
            ?>
         </div>
      </div>
      <div class="col-md-3 col-12 mt-2">
         <div class="card shadow p-3 mb-5" style="border-radius: 8px; height: 15vh;">
            <h5 style="height: 70%;"><i class="fa-solid fa-check-double m-1"></i> ত্রুটিযুক্ত প্রকল্পগুলো</h5>
            <?php
            if (isset($_SESSION['author_role']) && $_SESSION['author_role'] === 'Student') {
               // select paper information
               $select_from_new_paper = "SELECT * FROM `project_submission_student` WHERE `researcher_author_id` = '$_SESSION[author_id]' AND `paper_status` = '0'";
               $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
               $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
            ?>
               <a href="resubmission_papers.php" class="home_anker">সর্বমোট প্রকল্প: <?php echo $obj->engToBn($num_new_paper) ?></a>
            <?php
            } else {
               $select_from_new_paper = "SELECT * FROM `project_submission_teacher` WHERE `advisor_author_id` = '$_SESSION[author_id]' AND `paper_status` = '0'";
               $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
               $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
            ?>
               <a href="resubmission_papers.php" class="home_anker">সর্বমোট প্রকল্প: <?php echo $obj->engToBn($num_new_paper) ?></a>
            <?php
            }
            ?>
         </div>
      </div>
      <div class="col-md-3 col-12 mt-2">
         <div class="card shadow p-3 mb-5" style="border-radius: 8px; height: 15vh;">
            <h5 style="height: 70%;"><i class="fa-solid fa-check-double m-1"></i> পুনরায় সাবমিট করা প্রকল্পগুলো</h5>
            <?php
            if (isset($_SESSION['author_role']) && $_SESSION['author_role'] === 'Student') {
               // select paper information
               $select_from_new_paper = "SELECT * FROM `project_submission_student` WHERE `researcher_author_id` = '$_SESSION[author_id]' AND `paper_status` = '2'";
               $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
               $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
            ?>
               <a href="resubmission_papers_updated.php" class="home_anker">সর্বমোট প্রকল্প: <?php echo $obj->engToBn($num_new_paper) ?></a>
            <?php
            } else {
               $select_from_new_paper = "SELECT * FROM `project_submission_teacher` WHERE `advisor_author_id` = '$_SESSION[author_id]' AND `paper_status` = '2'";
               $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
               $num_new_paper = mysqli_num_rows($run_select_from_new_paper);
            ?>
               <a href="resubmission_papers_updated.php" class="home_anker">সর্বমোট প্রকল্প: <?php echo $obj->engToBn($num_new_paper) ?></a>
            <?php
            }
            ?>
         </div>
      </div>

      <!-- <div class="col-md-3">
         <div class="card shadow p-3 mb-5">
            <h6>প্রকল্প সাবমিট</h6>
            <a href="new_paper_submission_step-1.php">Add</a>
         </div>
      </div>
      <div class="col-md-3">
         <div class="card shadow p-3 mb-5">
            <h6>প্রকল্পগুলোর বিস্তারিত</h6>
            <a href="new_papers.php">View</a>
         </div>
      </div> -->
   </div>

   <div class="row">
      <div class="col">
         <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <h3 class="text-primary fw-bold">নতুন নোটিশগুলো দেখুন</h3>
            <div class="table-responsive">
               <table id="table" class="table table-bordered table-hover text-center">
                  <thead>
                     <tr>
                        <th class="text-center">ক্রমিক নং</th>
                        <th class="text-center">শিরোনাম</th>
                        <th class="text-center">ডাউনলোড</th>
                        <th class="text-center">জমাদানের শেষ সময়</th>
                        <th class="text-center">ফরম পূরণ</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $serial_no = 1;
                     $select_from_new_paper = "SELECT submission_date FROM `notices` ORDER BY submission_date DESC";
                     $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                     if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                        while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                           // extract($row);
                           $submission_date = $row['submission_date'];
                           $submission_date_form = date("d/m/Y", strtotime($submission_date));
                           // $submission_date_format = date("Y-m-d", strtotime($submission_date));
                           $new_date = date('Y-m-d');
                           $diff = strtotime($submission_date) - strtotime($new_date);
                           $date_diff = round($diff / 86400);
                           // echo $date_diff, "  ";
                           if ($row && $date_diff > 0) {
                              $select_from_new_paper1 = "SELECT * FROM `notices` WHERE submission_date BETWEEN '$new_date' AND '$submission_date' ORDER BY submission_date DESC";
                              $run_select_from_new_paper1 = mysqli_query($conn, $select_from_new_paper1);
                              if (mysqli_num_rows($run_select_from_new_paper1) > 0) {
                                 $row1 = mysqli_fetch_assoc($run_select_from_new_paper1);
                                 extract($row1);
                                 // date('Y-m-d', strtotime($res['date'])) > $dateFrom && date('Y-m-d', strtotime($res['date'])) < $dateTo
                     ?>
                                 <tr>
                                    <td><?php echo $obj->engToBn($serial_no) ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td>
                                       <!-- <a href="Files/notices/doc_file/<?php echo $doc_file ?>"><?php echo $doc_file ?></a> -->
                                       <a href="../Files/notices/pdf_file/<?php echo $pdf_file ?>" target="_blank">পিডিএফ</a>
                                    </td>
                                    <td><?php echo $obj->engToBn($submission_date_form) ?></td>
                                    <td>
                                       <a href="new_paper_submission_step-1.php?notice_id=<?php echo $id ?>" class="fs-3"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                 </tr>
                     <?php
                                 $serial_no++;
                              }
                           }
                        }
                     }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include("author_footer.php"); ?>