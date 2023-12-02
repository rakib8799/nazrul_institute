<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="assets/vendor/libs/jquery/jquery.js"></script>
<script src="assets/vendor/libs/popper/popper.js"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Main JS -->
<script src="assets/js/main.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function() {
    $('#table').DataTable();
  });
</script>

<script src="../ckeditor/ckeditor.js"></script>
<script>
  // Initialize CKEditor
  $('.long_desc').each(function() {
    CKEDITOR.replace($(this).prop('id'));
  });
</script>

<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>