<?php include("admin_header.php") ?>
<?php include("numberToWord/BanglaNumberToWord.php") ?>
<?php
$obj = new BanglaNumberToWord();
// echo $obj->engToBn(5207.56);
?>
<div class="container-fluid mt-5">
    <a href="add_published_book.php" class="btn btn-primary mb-5">প্রকাশিত গ্রন্থ সম্পর্কে তথ্য সংযুক্তি</a>
    <h3 class="text-center text-secondary fw-bold">প্রকাশিত গ্রন্থ সম্পর্কে বিস্তারিত</h3>
    <div class="col">
        <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
            <div class="table-responsive">
                <table id="table" class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th class="text-center">ক্র.ন.</th>
                            <th class="text-center">গ্রন্থ</th>
                            <th class="text-center">সম্পাদনা</th>
                            <th class="text-center">ছবি</th>
                            <th class="text-center">ফাইল</th>
                            <th class="text-center" style="width: 5vw">সংশোধন</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_from_new_paper = "SELECT * FROM publication_book";
                        $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                        $serial_no = 1;
                        if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                            while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                extract($row);
                        ?>
                                <tr>
                                    <td><?php echo $obj->engToBn($serial_no) ?></td>
                                    <td><?php echo $book_name; ?></td>
                                    <td><?php echo $publisher_name; ?></td>
                                    <td><img src="../Images/publication_book/<?php echo $image ?>" width='50px' height='50px'></td>
                                    <td>
                                        <a href="../Files/publication_book/pdf_file/<?php echo $pdf_file ?>"><?php echo $pdf_file ?></a>
                                    </td>
                                    <td>
                                        <a href="edit_published_book.php?published_book_id=<?php echo $id ?>" class="fs-3"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="delete_published_book.php?id=<?php echo $id ?>&&image=<?php echo $image; ?>&&pdf_file=<?php echo $pdf_file; ?>" class="ms-md-3 ms-2 fs-3" onclick="return confirmSubmission()"><i class="fa-solid fa-trash"></i></a>
                                    </td>

                                    <!-- <td>
                                        <a href="edit_published_book.php?published_book_id=<?php echo $id ?>" class="fs-3"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="delete_published_book.php?id=<?php echo $id ?>&&image=<?php echo $image; ?>" class="ms-md-3 ms-2 fs-3" onclick="return confirmSubmission()"><i class="fa-solid fa-trash"></i></a>
                                    </td> -->
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