<!DOCTYPE html>
<html>
	<head>

		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>


		<div class="row" >
				<form class="col s12 valign-wrapper"  action="admin_login_2.php" method="post">
						<table style="margin-top:150px">
							<tr>
								<td colspan="2" class="input-field center-align">
									<i class="material-icons prefix">account_circle</i>
									<input name="id" type="text" class="validate" style="width:15%">
									<label for="icon_prefix">ID</label>
								</td>

							</tr>
							<tr>
								<td colspan="2" class="input-field center-align">
									<i class="material-icons prefix">vpn_key</i>
									<input name="password" type="password" class="validate" style="width:15%">
									<label for="icon_telephone">Password</label>
								</td>
							</tr>
							<tr>
								<td class="center-align" colspan="2" style="padding-left:50px">
									<input type="submit" value="LOGIN" class="waves-effect waves-light btn" style="background-color:#ff9100  ">
								</td>
							</tr>
						</table>


				</form>
			</div>

		<!--Import jQuery before materialize.js-->
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
	</body>
</html>
