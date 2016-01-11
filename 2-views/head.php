<!DOCTYPE html>
<html>
	<head>
	    <meta charset="UTF-8">
	    <title><?php echo $content['template_title']; ?></title>
	    <link rel="icon" type="image/png" href="assets/pictures/logo.favicon" />    
	    <!--CSS-->
	    <link type="text/css" href="assets/css/style.css" rel="stylesheet"/>
        <!--Bootstrap CSS-->
	    <link href="assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <!--Select2 CSS-->
	    <link href="assets/vendors/select2-4.0.1/css/select2.min.css" rel="stylesheet">
        <!--datatable CSS-->
        <link rel="stylesheet" type="text/css" href="assets/vendors/datatable/DataTables-1.10.10/css/jquery.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/vendors/datatable/DataTables-1.10.10/css/dataTables.bootstrap.min.css"/>
        <!--JS-->
		<script type="text/javascript" src="assets/js/verifyForm.js"></script>
		<!--JQuery JS-->
		<script type="text/javascript" src="assets/vendors/jquery/jquery-2.1.4.min.js"></script>		
        <!--Bootstrap JS-->
        <script type="text/javascript" src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
		<!--Select2 JS-->
        <script type="text/javascript" src="assets/vendors/select2-4.0.1/js/select2.min.js"></script>
        <!--datatable JS-->
        <script type="text/javascript" src="assets/vendors/datatable/DataTables-1.10.10/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="assets/vendors/datatable/DataTables-1.10.10/js/dataTables.bootstrap.js"></script>		
        <!--JS on load-->
		<script type="text/javascript">
			$(window).load(function(){
				$('.alert').hide();
				$('select').select2();
			});
		</script>
	</head>