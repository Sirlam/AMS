<!-- Footer -->
<footer class="footer-main">
	&copy; 2018 <strong>AMS</strong> - Account Management System</a>
</footer>
<!-- /footer -->

  </div>
  <!-- /main content -->

</div>
<!-- /main container -->

</div>
<!-- /page container -->

<!--Load JQuery-->
<script type="text/javascript" src="{{URL::asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/plugins/metismenu/jquery.metisMenu.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/plugins/blockui-master/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/plugins/blockui-master/jquery.blockUI.js')}}"></script>
<!--Float Charts-->
<script type="text/javascript" src="{{URL::asset('js/plugins/flot/jquery.flot.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/plugins/flot/jquery.flot.resize.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/plugins/flot/jquery.flot.selection.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/plugins/flot/jquery.flot.pie.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/plugins/flot/jquery.flot.time.min.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/functions.js')}}"></script>

<!--ChartJs-->
<script type="text/javascript" src="{{URL::asset('js/plugins/chartjs/Chart.min.js')}}"></script>

<!--Data-tables-->
<script type="text/javascript" src="{{URL::asset('js/plugins/data-tables/jquery.dataTables.js')}}"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#myTable').DataTable({
			"language": {
            "decimal": ",",
            "thousands": "."
        }
		});
} );
</script>
