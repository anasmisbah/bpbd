	<!-- Javascript Files
	================================================== -->

	<!-- initialize jQuery Library -->
	<script src="<?= base_url('pages_assets/plugins/jQuery/jquery.min.js'); ?>"></script>
	<!-- Bootstrap jQuery -->
	<script src="<?= base_url('pages_assets/plugins/bootstrap/bootstrap.min.js'); ?>" defer></script>
	<!-- Slick Carousel -->
	<script src="<?= base_url('pages_assets/plugins/slick/slick.min.js'); ?>"></script>
	<script src="<?= base_url('pages_assets/plugins/slick/slick-animation.min.js'); ?>"></script>
	<!-- Color box -->
	<script src="<?= base_url('pages_assets/plugins/colorbox/jquery.colorbox.js'); ?>"></script>
	<!-- shuffle -->
	<script src="<?= base_url('pages_assets/plugins/shuffle/shuffle.min.js'); ?>" defer></script>
	<!-- shuffle -->
	<script src="<?= base_url('pages_assets/plugins/flip/flip.min.js'); ?>" defer></script>


	<!-- Google Map API Key-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
	<!-- Google Map Plugin-->
	<script src="<?= base_url('pages_assets/plugins/google-map/map.js'); ?>" defer></script>

	<!-- Template custom -->
	<script src="<?= base_url('pages_assets/js/script.js'); ?>"></script>
	 <script src="<?= base_url('admin_assets/plugins/moment/moment-with-locales.min.js'); ?>"></script>
	 <script>
	 moment.locale('id')

	 $( "#search-field" ).keypress(function( event ) {
		if ( event.which == 13 ) {
			event.preventDefault();
			let form = $('#form-search')
			let inputItemId = $('#keyword')
			inputItemId.val($(this).val())
			form.submit()
		}
	});
    $(document).ready(function(){
		$(".preloader").fadeOut('slow');

		var pathArray = window.location.pathname.split('/');
		if (pathArray[1] !== "") {
			let navId = `#nav-${pathArray[1]}`
			$(navId).addClass('active')
		}else{
			let navId = `#nav-beranda`
			$(navId).addClass('active')
		}
    })
	const urlData = "<?= base_url('data/visitor'); ?>"
	$.getJSON('http://ip-api.com/json', function(data) {
		$.getJSON(`${urlData}/${data.query}`, function(dt) {
			$("#today-visitor").html(dt.amountVisitorToday)
			$("#total-visitor").html(dt.totalVisitor)
			$("#online-visitor").html(dt.onlineVisitor)
		});
	});
	 </script>
	 <?= $this->renderSection('js'); ?>