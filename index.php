<?php include_once('linker.php') ?>

<body>
    <header style="font-family: 'Kalpurush', Arial, sans-serif">
        <?php include_once('header.php') ?>
    </header>
    <section class="HomepageSection" id="HomeBanner" style="font-family: 'Kalpurush', Arial, sans-serif">
        <?php include_once('home_banner.php') ?>
    </section>

    <section>
        <?php include_once('home_details.php') ?>
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