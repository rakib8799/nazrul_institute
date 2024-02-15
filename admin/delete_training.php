<?php include("admin_header.php") ?>

<?php
if (isset($_GET['id'], $_GET['image'])) {
    $id = $_GET['id'];
    $image = $_GET['image'];
    $deleteData = "DELETE FROM training WHERE id = $id";
    $result = mysqli_query($conn, $deleteData);
    if ($result) {
        unlink('../Images/training/' . $image);

        header("Location: view_training.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য ডিলিট হয়নি</p>";
    }
}
?>

<?php include("admin_footer.php") ?>