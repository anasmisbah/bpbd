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
    if (pathArray[2] === 'profil') {
      $('#list-profil').addClass('menu-open')
      subNavId=`#subnav-${pathArray[2]}-${pathArray[3]}`
      $(subNavId).addClass('active')
    }
  } else {
    let navId = `#nav-${pathArray[3]}`
    $(navId).addClass('active')
    if (pathArray[3] === 'profil') {
      $('#list-profil').addClass('menu-open')
      subNavId=`#subnav-${pathArray[3]}-${pathArray[4]}`
      $(subNavId).addClass('active')
    }
  }
})
</script>
<?= $this->renderSection('js') ?>