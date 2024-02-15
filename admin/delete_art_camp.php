<?php include("admin_header.php") ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select_from_new_paper = "SELECT image FROM art_camp";
    $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
    $serial_no = 1;
    if (mysqli_num_rows($run_select_from_new_paper) > 0) {
        $imgIndex = 0;

        while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
            $images = explode(",", $row['image']);

            if (count($images) > 1) {
                while ($imgIndex < count($images)) {
                    unlink('../Images/art_camp/' . $images[$imgIndex]);

                    $imgIndex++;
                }
            } else {
                unlink('../Images/art_camp/' . $image);
            }
        }

        $deleteData = "DELETE FROM art_camp WHERE id = $id";
        $result = mysqli_query($conn, $deleteData);
        if ($result) {
            header("Location: view_art_camp.php");
            ob_end_flush();
        } else {
            echo "<p class='text-danger text-bold text-center fs-5 mt-3'>কোনো তথ্য ডিলিট হয়নি</p>";
        }
    }
}
?>

<?php include("admin_footer.php") ?>