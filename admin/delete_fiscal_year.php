<?php include("admin_header.php") ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteData = "DELETE FROM fiscal_years WHERE id = $id";
    $result = mysqli_query($conn, $deleteData);
    if ($result) {
        header("Location: view_years.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য ডিলিট হয়নি</p>";
    }
}
?>

<?php include("admin_footer.php") ?>