<div class="pt-5 mt-5 pb-1 bg-dark text-light" style="font-family: 'Kalpurush', Arial, sans-serif">

    <div class="container">
        <div id="footer" class="row">
            <?php
            $select_from_new_paper = "SELECT * FROM `contact` ORDER BY id DESC";
            $run_select_from_new_paper = mysqli_query($conn, $select_from_new_paper);
            if (mysqli_num_rows($run_select_from_new_paper) > 0) {
                $row = mysqli_fetch_assoc($run_select_from_new_paper);
                extract($row);
            ?>
                <div class="col-md-4 text-center">
                    <!-- <h5>Address</h5> -->
                    <i class="fa-solid fa-location-dot fs-3"></i>
                    <hr>
                    <p><?php echo $location ?></p>
                </div>

                <div class="col-md-4 text-center">

                    <!-- <h5>Contact</h5> -->
                    <i class="fa-solid fa-phone fs-3"></i>
                    <hr>
                    <p><?php echo $contact ?></p>
                </div>

                <div class="col-md-4 text-center">
                    <!-- <h5>Email Address</h5> -->
                    <i class="fa-solid fa-envelope fs-3"></i>
                    <hr>
                    <!-- <h6>Facebook page :</h6> -->
                    <!-- <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a> -->
                    <!-- <h6>Website: <a href="https://ictbj@jkkniu.edu.bd" class="text-decoration-none" target="_blank">ictbj@jkkniu.edu.bd</a></h6> -->

                    <h6><a href="mailto:<?php echo $email; ?>" class="text-decoration-none" target="_blank"><?php echo $email; ?></a></h6>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <p class="text-center mt-4 py-2" style="background: #333333">
        &copy; Copyright <span id="year"></span>, JKKNIU -
        All Rights
        Reserved
    </p>
    <script>
        document.getElementById('year').innerHTML = new Date().getFullYear();
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script> -->

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
    <script>
        document.addEventListener("click", function(e) {
            // Hamburger menu
            if (e.target.classList.contains("hamburger-toggle")) {
                e.target.children[0].classList.toggle("active");
            }
        });
    </script>
</div>