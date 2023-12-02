<?php include("admin_header.php") ?>
<?php
if (isset($_GET['id'], $_GET['image'], $_GET['pdf_file'])) {
    $id = $_GET['id'];
    $image = $_GET['image'];
    $pdf_file = $_GET['pdf_file'];
    $deleteData = "DELETE FROM documentary WHERE id = $id";
    $result = mysqli_query($conn, $deleteData);
    if ($result) {
        // echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Deleted successfully</p>";
        unlink('../Images/documentary/' . $image);
        unlink('../Files/documentary/pdf_file/' . $pdf_file);

        header("Location: view_documentary.php");
        ob_end_flush();
    } else {
        echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য ডিলিট হয়নি</p>";
    }
}



// if (isset($_GET['id'], $_GET['image'])) {
//     $id = $_GET['id'];
//     $image = $_GET['image'];
//     $deleteData = "DELETE FROM documentary WHERE id = $id";
//     $result = mysqli_query($conn, $deleteData);
//     if ($result) {
//         echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Deleted successfully</p>";
//         unlink('../Images/documentary/' . $image);

//         header("Location: view_documentary.php");
//         ob_end_flush();
//     } else {
//         echo "<p class='text-danger text-bold text-center fs-5 mt-3'>Not Deleted</p>";
//     }
// }
?>
<?php include("admin_footer.php") ?>
