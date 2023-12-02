<?php include("admin_header.php") ?>
<?php include("numberToWord/BanglaNumberToWord.php") ?>
<?php
$obj = new BanglaNumberToWord();
// echo $obj->engToBn(5207.56);
?>

<div class="container-fluid mt-5">
    <a href="add_notice.php" class="btn btn-primary mb-5">নোটিশের তথ্য সংযুক্তি</a>
    <h3 class="text-center text-secondary fw-bold">নোটিশ সম্পর্কে বিস্তারিত দেখা</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th class="text-center">ক্র.ন.</th>
                            <th class="text-center">শিরোনাম</th>
                            <th class="text-center">পিডিএফ ফাইল</th>
                            <th class="text-center">জমাদানের শেষ সময়</th>
                            <th class="text-center" style="width: 5vw">সংশোধন</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_from_new_paper = "SELECT * FROM notices";
                        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                        $serial_no = 1;
                        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                extract($row);
                                $submission_date_format = date("d/m/Y", strtotime($submission_date));
                        ?>
                                <tr>
                                    <td><?php echo $obj->engToBn($serial_no) ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td>
                                        <!-- <a href="../Files/notices/doc_file/<?php echo $doc_file ?>"><?php echo $doc_file ?></a> -->
                                        <a href="../Files/notices/pdf_file/<?php echo $pdf_file ?>"><?php echo $pdf_file ?></a>
                                    </td>
                                    <td><?php echo $obj->engToBn($submission_date_format) ?></td>
                                    <td>
                                        <a href="edit_notice.php?notice_id=<?php echo $id ?>" class="fs-3"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="delete_notice.php?id=<?php echo $id ?>&&pdf_file=<?php echo $pdf_file; ?>" class="ms-md-3 ms-2 fs-3" onclick="return confirmSubmission()"><i class="fa-solid fa-trash"></i></a>
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