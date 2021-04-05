		<!-- Javascript Files
	================================================== -->

		<!-- initialize jQuery Library -->
		<script type="text/javascript" src="<?= base_url('pages_assets/js/jquery.js'); ?>"></script>
		<!-- Bootstrap jQuery -->
		<script type="text/javascript" src="<?= base_url('pages_assets/js/bootstrap.min.js'); ?>"></script>
		<!-- Owl Carousel -->
		<script type="text/javascript" src="<?= base_url('pages_assets/js/owl.carousel.min.js'); ?>"></script>
		<!-- Color box -->
		<script type="text/javascript" src="<?= base_url('pages_assets/js/jquery.colorbox.js'); ?>"></script>
		<!-- Isotope -->
		<script type="text/javascript" src="<?= base_url('pages_assets/js/isotope.js'); ?>"></script>
		<script type="text/javascript" src="<?= base_url('pages_assets/js/ini.isotope.js'); ?>"></script>


    <!-- Google Map API Key-->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
		<!-- Google Map Plugin-->
		<script type="text/javascript" src="<?= base_url('pages_assets/js/gmap3.js'); ?>"></script>
 
	 <!-- Template custom -->
	 <script type="text/javascript" src="<?= base_url('pages_assets/js/custom.js'); ?>"></script>

	</div><!-- Body inner end -->
<!-- Code injected by live-server -->
<script type="text/javascript">
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>