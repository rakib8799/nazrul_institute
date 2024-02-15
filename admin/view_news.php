<?php include("admin_header.php") ?>
<?php include("numberToWord/BanglaNumberToWord.php") ?>
<?php
$obj = new BanglaNumberToWord();
?>

<div class="container-fluid mt-5">
    <a href="add_news.php" class="btn btn-primary mb-5">নতুন সংবাদ সংযুক্তি</a>
    <h3 class="text-center text-secondary fw-bold">সকল সংবাদের বিস্তারিত</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th class="text-center">ক্র.ন.</th>
                            <th class="text-center">শিরোনাম</th>
                            <th class="text-center">বিস্তারিত</th>
                            <th class="text-center">ছবি</th>
                            <th class="text-center">প্রকাশিত সময়</th>
                            <th class="text-center" style="width: 5vw">সংশোধন</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_from_new_paper = "SELECT * FROM news";
                        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                        $serial_no = 1;
                        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                extract($row);
                                $created_date_format = date("d/m/Y", strtotime($created_at));
                        ?>
                                <tr>
                                    <td><?php echo $obj->engToBn($serial_no) ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $details; ?></td>
                                    <td><img src="../Images/news/<?php echo $image ?>" width='50px' height='50px'></td>
                                    <td><?php echo $obj->engToBn($created_date_format) ?></td>
                                    <td>
                                        <a href="edit_news.php?news_id=<?php echo $id ?>" class="fs-3"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="delete_news.php?id=<?php echo $id ?>&&image=<?php echo $image; ?>" class="ms-md-3 ms-2 fs-3" onclick="return confirmSubmission()"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                                $serial_no++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <script>
                function confirmSubmission() {
                    return confirm(" আপনি কি নিশ্চিতভাবে ডাটা ডিলিট করতে চাচ্ছেন?");
                }
            </script>
        </div>
    </div>
</div>
<?php include("admin_footer.php") ?>