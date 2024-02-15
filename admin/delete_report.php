<?php include("admin_header.php") ?>

<?php
if (isset($_GET['id'], $_GET['pdf_file'])) {
    $id = $_GET['id'];
    $pdf_file = $_GET['pdf_file'];
    $deleteData = "DELETE FROM reports WHERE `id` = '$id'";
    $result = mysqli_query($conn, $deleteData);
    if ($result) {
        unlink('../Files/reports/pdf_file/' . $pdf_file);
        header("Location: view_reports.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য ডিলিট হয়নি</p>";
    }
}
?>

<?php include("admin_footer.php") ?>