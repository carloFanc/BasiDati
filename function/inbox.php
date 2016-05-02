<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>inBoxJavascript</title>
		<meta name="author" content="Carlof" />
		<!-- Date: 2016-05-01 -->
		 <script type="text/javascript" src="../BasiDati/js/jquery-1.11.1.min.js"></script>
		  <script type="text/javascript" src="../BasiDati/js/jquery-ui.js"></script>
		  <script type="text/javascript" src="../BasiDati/js/scripts.js"></script>
		  <script type="text/javascript" src="../BasiDati/js/bootstrap.min.js"></script>
		  <style type="text/css">
			DIV.container {
				width: inherit;
				text-align: center;
			}
			table, thead, tr, tbody, th, td {
				text-align: center;
			}

			.table td {
				text-align: center;
			}
		</style>
	</head>
	<body> 
<div id='result_table'>
<h1>Messaggi Inbox</h1> 
</div>

<script type='text/javascript' language='javascript'>
$( document ).ready(function(){

$.ajax({
        url: '/BasiDati/function/getTabletInbox.php',
        type:'POST',
        dataType: 'json',
        success: function(output_string){
                $('#result_table').append(output_string);
            } // End of success function of ajax form
        }); // End of ajax call    

});
</script>

	</body>
</html>
