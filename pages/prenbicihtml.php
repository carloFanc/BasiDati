<?php
require_once (dirname(dirname(__FILE__)) . '/session.php');
require_once (dirname(dirname(__FILE__)) . '/class.user.php');

$user = new USER();
$stmt = $user -> runQuery('SELECT id from Bici');
$stmt -> execute();
?>
<head>
		<link rel="stylesheet" href="/BasiDati/css/bootstrap-datetimepicker.min.css">
	</head>
<body>
		 <div>
			<h1 align="center">Prenotazione bici</h1>
			
			
			<form role="form"  id="PrenBici" >
				<div class="form-group">
					<label for="bici">Bici:</label>
					<select name="form-bici" class="form-control" id="form-bici">
  					<?php while ($userRow=$stmt->fetch(PDO::FETCH_ASSOC)): ?>
					<option  value="<?php echo $userRow["id"] ?>"><?php echo $userRow["id"] ?></option>
					<?php endwhile; ?>
					</select>	
				</div>
				<div class="row top-buffer "  >
				<div class="col-md-6">
					<h4>Data Inizio:</h4>
				</div>
			</div>
			<div class="row top-buffer " >
				<div class="input-group date col-md-6" id="datetimepicker1" style="padding-left:15px; padding-right:15px" >

					<input name="form-date1" id="form-date1" type='text' class="form-control "> </input>
					<span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span>
				</div>
			</div>
			<div class="row top-buffer "  >
				<div class="col-md-6">
					<h4>Data Fine:</h4>
				</div>
			</div>
			<div class="row top-buffer " >
				<div class="input-group date col-md-6" id="datetimepicker2" style="padding-left:15px; padding-right:15px" >

					<input name="form-date2" id="form-date2" type='text' class="form-control "> </input>
					<span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span>
				</div>
			</div>	<br>
				<button type="submit" name="btn-invio" class="btn btn-primary">
					Invio
				</button>
			</form>
		</div>
		<script  src="/BasiDati/js/moment.js"></script>
		<script src="/BasiDati/js/bootstrap-datetimepicker.min.js"></script>
		<script src="/BasiDati/js/prenBici.js"></script>
	</body>