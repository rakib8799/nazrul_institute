<?php include("admin_header.php") ?>
<?php include("numberToWord/BanglaNumberToWord.php") ?>
<?php
$obj = new BanglaNumberToWord();
?>
<div class="container-fluid mt-5">
    <a href="add_institute_details.php" class="btn btn-primary mb-5">ইন্সটিটিউটের বৃত্তান্ত সংযুক্তি</a>
    <h3 class="text-center text-secondary fw-bold">ইন্সটিটিউটের বৃত্তান্ত বিস্তারিত</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <table id="table" class="table table-responsive table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th class="text-center">ক্র.ন.</th>
                            <th class="text-center">নাম</th>
                            <th class="text-center">প্রতিষ্ঠাকাল</th>
                            <th class="text-center">লক্ষ্য</th>
                            <th class="text-center">উদ্দেশ্য</th>
                            <th class="text-center" style="width: 5vw">সংশোধন</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_from_new_paper = "SELECT * FROM institute_details";
                        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                        $serial_no = 1;
                        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                extract($row);
                        ?>
                                <tr>
                                    <td><?php echo $obj->engToBn($serial_no) ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $founding_period; ?></td>
                                    <td><?php echo $aim; ?></td>
                                    <td><?php echo $target; ?></td>
                                    <td>
                                        <a href="edit_institute_details.php?institute_details_id=<?php echo $id ?>" class="fs-3"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="delete_institute_details.php?id=<?php echo $id ?>" class="ms-md-3 ms-2 fs-3" onclick="return confirmSubmission()"><i class="fa-solid fa-trash"></i></a>
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