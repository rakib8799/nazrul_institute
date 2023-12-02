<?php include("admin_header.php") ?>
<?php
if (isset($_GET['id'], $_GET['image'])) {
    $id = $_GET['id'];
    $image = $_GET['image'];
    $deleteData = "DELETE FROM speech WHERE id = $id";
    $result = mysqli_query($conn, $deleteData);
    if ($result) {
        // echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Deleted successfully</p>";
        unlink('../Images/speech/' . $image);
        header("Location: view_speech.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য ডিলিট হয়নি</p>";
    }
}
?>
<?php include("admin_footer.php") ?>
