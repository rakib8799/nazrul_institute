<?php include("admin_header.php") ?>
<?php
if (isset($_GET['id'], $_GET['pdf_file1'], $_GET['pdf_file2'])) {
    $id = $_GET['id'];
    // $doc_file = $_GET['doc_file'];
    $pdf_file1 = $_GET['pdf_file1'];
    $pdf_file2 = $_GET['pdf_file2'];
    $deleteData = "DELETE FROM project_submission_teacher WHERE `id` = '$id'";
    $result = mysqli_query($conn, $deleteData);
    if ($result) {
        // unlink('../Files/project_submission_teacher/doc_file/' . $doc_file);
        unlink('../Files/project_submission_teacher/pdf_file/' . $pdf_file1);
        unlink('../Files/project_submission_teacher/pdf_file/' . $pdf_file2);
        // echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Deleted successfully</p>";
        header("Location: view_student_project_submission.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য ডিলিট হয়নি</p>";
    }
}
?>
<?php include("admin_footer.php") ?>