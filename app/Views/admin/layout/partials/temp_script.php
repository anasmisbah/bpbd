<!-- jQuery -->
<script src="<?= base_url('admin_assets/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('admin_assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('admin_assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('admin_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('admin_assets/dist/js/adminlte.js'); ?>"></script>
<script src="<?= base_url('admin_assets/plugins/moment/moment-with-locales.min.js'); ?>"></script>
<script>
moment.locale('id')
$(function () {
  var pathArray = window.location.pathname.split('/');
  if (pathArray[1] !== 'index.php') {
    let navId = `#nav-${pathArray[2]}`
    $(navId).addClass('active')
  } else {
    let navId = `#nav-${pathArray[3]}`
    $(navId).addClass('active')
  }
})
</script>
<?= $this->renderSection('js') ?>