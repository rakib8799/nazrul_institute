<?php include("admin_header.php") ?>
<?php include("numberToWord/BanglaNumberToWord.php") ?>
<?php
$obj = new BanglaNumberToWord();
// echo $obj->engToBn(5207.56);
?>
<div class="container-fluid mt-5">
    <h3 class="text-center text-secondary fw-bold">গবেষকদের তথ্যাবলী</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th class="text-center">ক্র.ন.</th>
                            <th class="text-center">নাম</th>
                            <th class="text-center">ইমেইল</th>
                            <th class="text-center">মোবাইল/টেলিফোন</th>
                            <th class="text-center">গবেষকদের ভূমিকা</th>
                            <th class="text-center">ইমেইল যাচাইকরণ</th>
                            <th class="text-center">মুছুন</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_from_new_paper = "SELECT * FROM author_information";
                        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                        $serial_no = 1;
                        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                extract($row);
                        ?>
                                <tr>
                                    <td><?php echo $obj->engToBn($serial_no) ?></td>
                                    <td><?php echo $author_name ?></td>
                                    <td><?php echo $author_email ?></td>
                                    <td><?php echo $author_contact_no ?></td>
                                    <td><?php echo $author_role ?></td>
                                    <td><?php echo $email_verified_at ?></td>
                                    <td>
                                        <a href="delete_author.php?id=<?php echo $author_id ?>" class="ms-md-3 ms-2 fs-3" onclick="return confirmSubmission()"><i class="fa-solid fa-trash"></i></a>
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