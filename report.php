<?php include_once('linker.php') ?>
<?php include("./admin/numberToWord/BanglaNumberToWord.php") ?>
<?php
$obj = new BanglaNumberToWord();
// echo $obj->engToBn(5207.56);
?>

<body style="font-family: 'Kalpurush', Arial, sans-serif">
    <header>
        <?php include_once('header.php') ?>
    </header>

    <section style="min-height: 90vh;" class="d-flex align-items-center">
        <div class="container mt-5" data-aos="fade-up">
            <h2 class="text-uppercase fw-bold text-center mb-3 secondaryColor" data-aos="fade-up">
                বার্ষিক প্রতিবেদন
            </h2>
            <div class="col">
                <div class="card pt-5 pb-4 shadow mb-5 px-md-5 px-3 bg-body rounded">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">ক্রমিক নং</th>
                                    <th class="text-center">শিরোনাম</th>
                                    <th class="text-center">ডাউনলোড</th>
                                    <!-- <th>আপলোডের সময়</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $serial_no = 1;
                                $select_from_new_paper = "SELECT * FROM `reports` ORDER BY id DESC";
                                $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
                                if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                                    while ($row = mysqli_fetch_assoc($run_select_from_new_paper)) {
                                        extract($row);
                                ?>
                                        <tr>
                                            <td><?php echo $obj->engToBn($serial_no) ?></td>
                                            <td><?php echo $title; ?></td>
                                            <td>
                                                <!-- <a href="Files/reports/doc_file/<?php echo $doc_file ?>"><?php echo $doc_file ?></a> -->
                                                <a href="Files/reports/pdf_file/<?php echo $pdf_file ?>" target="_blank"><a href="Files/reports/pdf_file/<?php echo $pdf_file ?>">পিডিএফ</a></a>
                                            </td>
                                            <!-- <td><?php echo $created_at; ?></td> -->
                                        </tr>
                                <?php
                                        $serial_no++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer data-aos="fade-up">
        <?php include_once('footer.php') ?>
    </footer>
    <!-- Here we hook our AOS JS file  -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Activate AOS Library -->
    <script>
        AOS.init();
    </script>
</body>

</html>