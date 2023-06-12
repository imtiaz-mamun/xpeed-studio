<?php 
//////////////////////////////////////////////
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xpeed_task";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
//////////////////////////////////////////////
$query_get = "SELECT * FROM `data_house` ORDER BY entry_at DESC";
$sth = $conn->prepare($query_get);
$sth->execute();
$data = $sth->get_result();
$result = $data->fetch_all(MYSQLI_ASSOC);
$conn->close();
?>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<style type="text/css">
		.alert-auto-message {
			line-height:20px;
			font-size:12px;
			padding-bottom: 12px;
		}

		.unstyled {
			margin: 0;
			list-style: none;
		}
		.unstyled a, .unstyled #test {
			width: 120px;
			text-decoration: none;
			padding: .5em 1em;
			background-color: #213347;
			border-radius: 4px;
			display: block;
			margin-bottom: .5em;
			font-size:15px;
			font-weight:300;
			font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
		}
		.unstyled a:hover, .unstyled #test:hover {
			background-color: #f25c5d;
		}
		.cf, .alert-auto {
			*zoom: 1;
		}
		.cf:before, .alert-auto:before, .cf:after, .alert-auto:after {
			display: table;
			content: "";
			line-height: 0;
		}
		.cf:after, .alert-auto:after {
			clear: both;
		}
		#alert-autos {
			width: 400px;
			top: 12px;
			right: 50px;
			position: fixed;
			z-index: 9999;
			list-style: none;
		}
		.alert-auto {
			width: 30%;
			z-index: 9999;
			margin-bottom: 8px;
			display: block;
			position: fixed;
			border-left: 4px solid;
			right: -50px;
			opacity: 0;
			line-height: 1;
			padding: 0;
			transition: right 400ms, opacity 400ms, line-height 300ms 100ms, padding 300ms 100ms;
			display: table;
		}
		.alert-auto:hover {
			cursor: pointer;
			box-shadow: 0 0 6px rgba(0, 0, 0, 0.3);
		}
		.open-alert {
			right: 0;
			top: 0;
			opacity: 1;
			/*line-height: 2;*/
			padding: 10px 10px;
			font-weight: bold;
			transition: line-height 200ms, padding 200ms, right 350ms 200ms, opacity 350ms 200ms;
		}
		.open {
			font-weight: bold;
			transition: line-height 200ms, padding 200ms, right 350ms 200ms, opacity 350ms 200ms;
		}
		.alert-auto-title {
			font-weight: bold;
		}
		.alert-auto-block {
			width: 80%;
			width: -webkit-calc(100% - 10px);
			width: calc(100% - 10px);
			text-align: left;
		}
		.alert-auto-block em, .alert-auto-block small {
			font-size: .75em;
			opacity: .75;
			display: block;
		}
		.alert-auto i {
			font-size: 2em;
			width: 1.5em;
			max-height: 48px;
			top: 50%;
			margin-top: -12px;
			display: table-cell;
			vertical-align: middle;
		}
		.alert-auto-success {
			color: #fff;
			border-color: #539753;
			background-color: #8fbf2f;
		}
		.alert-auto-error {
			color: #fff;
			border-color: #dc4a4d;
			background-color: #f25c5d;
		}
		.alert-auto-trash {
			color: #fff;
			border-color: #dc4a4d;
			background-color: #f25c5d;
		}
		.alert-auto-info {
			color: #fff;
			border-color: #076d91;
			background-color: #3397db;
		}
		.alert-auto-warning {
			color: #fff;
			border-color: #dd6137;
			background-color: #f7931d;
		}

		* {
			margin: 0;
			padding: 0;
			border-size: border-box;
		}

		body {
			font-family: 'Balsamiq Sans', sans-serif;
			padding: 30px 90px 90px 90px;
			border-radius: 5px;
			height: auto;
			overflow:auto !important;
		}

		.card {
			margin: 50px;
		}

		.card h2 {
			color: rgba(0, 0, 0, 0.3);
			font-size: 60px;
			text-transform: uppercase;
		}
		.card .row .col {
			position: relative;
			width: 100%;
			margin: 5px 5px 10px 0px;
			transition: 0.5s;
		}

		.card .row .form-group {
			position: relative;
			width: 100%;
			height: 40px;
			color: #ffffff;
		}

		.card .row .form-group input{
			position: relative;
			width: 100%;
			height: 100%;
			background: transparent;
			outline: none;
			font-size: 18px;
			padding: 10px 0 10px 20px;
			border: 1px solid rgba(0, 0, 0, 0.3);
			box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.3);
			color: #ffffff;
			border-radius: 5px;
		}
		.card .row textarea {
			position: relative;
			width: 100%;
			height: auto;
			background: transparent;
			outline: none;
			font-size: 18px;
			padding: 10px 0 10px 20px;
			border: 1px solid rgba(0, 0, 0, 0.3);
			box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.3);
			color: #ffffff;
			border-radius: 5px;
		}

		.card .row .form-group input:focus,
		.card .row .form-group textarea:focus {
			border: 1px solid #ffffff;
			transition: all 0.5s;
		}

		.card .row input[type="submit"] {
			border: 1px solid rgba(0, 0, 0, 0.3);
			box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.7);
			padding: 10px;
			width: 50%;
			cursor: pointer;
			outline: none;
			background: transparent;
			text-transform: uppercase;
			color: #ffffff;
			line-height: 40px;
			font-size: 24px;
			font-weight: 700;
			border-radius: 5px;
			text-shadow: 3px 3px 0 rgba(0, 55, 0, 0.3);
			letter-spacing: 5px;
			transition: all 0.4s;
			margin: 0px 10px 20px 0px;
		}

		.card .row input[type="submit"]:hover {
			border: 1px solid rgba(0, 255, 0, 1);
			box-shadow: 3px 3px 0 rgba(0, 55, 0, 0.3);
			color: #0f0;
			text-shadow: 3px 3px 0 rgba(0, 55, 0, 0.3);
			transition: all 0.4s;
		}
		.card .row input[type="button"] {
			border: 1px solid rgba(0, 0, 0, 0.3);
			box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.7);
			padding: 10px;
			width: 50%;
			cursor: pointer;
			outline: none;
			background: transparent;
			text-transform: uppercase;
			color: #ffffff;
			line-height: 40px;
			font-size: 24px;
			font-weight: 700;
			border-radius: 5px;
			text-shadow: 3px 3px 0 rgba(0, 55, 0, 0.3);
			letter-spacing: 5px;
			transition: all 0.4s;
			margin: 0px 10px 20px 0px;
		}

		.card .row input[type="button"]:hover {
			border: 1px solid rgba(0, 255, 0, 1);
			box-shadow: 3px 3px 0 rgba(0, 55, 0, 0.3);
			color: #0f0;
			text-shadow: 3px 3px 0 rgba(0, 55, 0, 0.3);
			transition: all 0.4s;
		}
		@media screen and (max-width: 900px) {
			.card .row {
				grid-template-columns: repeat(auto-fit,minmax(70%, 1fr));
			}
			.card {
				padding: 20px;
			}
			.card h2 {
				font-size: 34px;
			}
			.card .row input[type="submit"] {
				width: 100%;
			}
		}
		table {
			border: 1px solid #ccc;
			border-collapse: collapse;
			overflow-x: auto;
			display: block;
		}

		table caption {
			font-size: 1.5em;
			margin: .5em 0 .75em;
		}

		table tr {
			background-color: #f8f8f8;
			border: 1px solid #ddd;
			padding: .35em;
		}

		table th,
		table td {
			padding: .625em;
			text-align: center;
		}

		table th {
			font-size: .85em;
			letter-spacing: .1em;
			text-transform: uppercase;
		}

		@media screen and (max-width: 600px) {
			table {
				border: 0;
			}

			table caption {
				font-size: 1.3em;
			}

			table thead {
				border: none;
				clip: rect(0 0 0 0);
				height: 1px;
				margin: -1px;
				overflow: hidden;
				padding: 0;
				position: absolute;
				width: 1px;
			}

			table tr {
				border-bottom: 3px solid #ddd;
				display: block;
				margin-bottom: .625em;
			}

			table td {
				border-bottom: 1px solid #ddd;
				display: block;
				font-size: .8em;
				text-align: right;
			}

			table td::before {
				content: attr(data-label);
				float: left;
				font-weight: bold;
				text-transform: uppercase;
			}

			table td:last-child {
				border-bottom: 0;
			}
		}
		.container {
			margin-bottom: 20px;
			margin-top: 40px;
		}
		fieldset {
			background-color: #eeeeee;
			border-bottom: 6px solid #c0c0c0;
		}
		.threeD-4 {
			color: #ccc;
			text-shadow: 0 -2px 0px #fff, 0px 2px 4px rgba(0,0,0,0.35), 0px 3px 15px rgba(0,0,0,0.15);
		}

		legend {
			background-color: gray;
			color: white;
			width: auto;
			padding: 20px 20px;
			text-align: center;
			font-family: "Roboto", sans-serif;
			letter-spacing: 10px;
			font-size: xx-large;
			border: 0;
			left: -2px;
			position: relative;
		}
	</style>
</head>
<body>
	<div class="card">
		<h2>XpeedStudio</h2>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="form-group">
						<h3>From:</h3>
						<input onchange="filterRows()" id="datefilterfrom" type="date" class="form-control" id="pure-date" aria-describedby="date-design-prepend">
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
						<h3>To:</h3>
						<input onchange="filterRows()" id="datefilterto" type="date" class="form-control" id="pure-date" aria-describedby="date-design-prepend">
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 120px !important;">
			<div class="col">
				<table class="table" style="text-align:center">

					<fieldset>
						<legend class="threeD-4">VIEW ALL SUBMIT</legend>
						<thead>
							<tr>
								<th style="text-align:center">ID</th>
								<th style="text-align:center">Amount</th>
								<th style="text-align:center">Buyer</th>
								<th style="text-align:center">Receipt ID</th>
								<th style="text-align:center">Items</th>
								<th style="text-align:center">Buyer Email</th>
								<th style="text-align:center">Buyer IP</th>
								<th style="text-align:center">Note</th>
								<th style="text-align:center">City</th>
								<th style="text-align:center">Phone</th>
								<th style="text-align:center">Hash Key</th>
								<th style="text-align:center">Entry At</th>
								<th style="text-align:center">Entry By</th>
							</tr>
						</thead>
						<tbody id="datatable" >
							<?php 
							for($i=0;$i<count($result);$i++)
							{
								?>
								<tr>
									<td><?php echo $result[$i]['id']; ?></td>
									<td><?php echo $result[$i]['amount']; ?></td>
									<td><?php echo $result[$i]['buyer']; ?></td>
									<td><?php echo $result[$i]['receipt_id']; ?></td>
									<td><?php echo $result[$i]['items']; ?></td>
									<td><?php echo $result[$i]['buyer_email']; ?></td>
									<td><?php echo $result[$i]['buyer_ip']; ?></td>
									<td><?php echo $result[$i]['note']; ?></td>
									<td><?php echo $result[$i]['city']; ?></td>
									<td><?php echo $result[$i]['phone']; ?></td>
									<td><?php echo $result[$i]['hash_key']; ?></td>
									<td><?php echo $result[$i]['entry_at']; ?></td>
									<td><?php echo $result[$i]['entry_by']; ?></td>
								</tr>
								<?php 
							}
							?>
						</tbody>
					</fieldset>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<input class="button_sub" type="button" value="Submit New Data" onclick="view_page()" style="background: #ff9922;width: 40%;margin-left: 0px;">
			</div>

		</div>
	</div>
	<script type="text/javascript">
		function filterRows() {
		  var from = $('#datefilterfrom').val();
		  var to = $('#datefilterto').val();

		  if (!from){
		  	Alert.warning('Warning! Please Select a From Date! ','Warning',{displayDuration: 3000, pos: 'top'});
		  	return;
		  }else if(!to) { 
		  	Alert.warning('Warning! Please Select a To Date! ','Warning',{displayDuration: 3000, pos: 'top'});
		    return;
		  }
		  var responseText = $.ajax({ type: "POST",   
				url : "filter-data-api.php",   
				data: ({from: from, to:to}),
				async   : false
			}).responseText;
		  if (responseText!="") {
			  	$('#datatable tr').remove();
			  	document.getElementById("datatable").innerHTML = responseText;
				Alert.success('Success! Data Filter Successful! ','Success',{displayDuration: 3000, pos: 'top'});

		  }
		  else{
			Alert.error('Error! No Data Found! ','Error',{displayDuration: 3000, pos: 'top'});
		  }

		}


		function view_page(){
			window.location.href = "index.php";
		}
	</script>
	<script>
		var Alert = undefined;
		(function (Alert) {
			var alert, error, trash, info, success, warning, _container;
			info = function (message, title, options) {
				return alert("info", message, title, "fa fa-info-circle", options);
			};
			warning = function (message, title, options) {
				return alert("warning", message, title, "fa fa-warning", options);
			};
			error = function (message, title, options) {
				return alert("error", message, title, "fa fa-exclamation-circle", options);
			};

			trash = function (message, title, options) {
				return alert("trash", message, title, "fa fa-trash-o", options);
			};

			success = function (message, title, options) {
				return alert("success", message, title, "fa fa-check-circle", options);
			};
			alert = function (type, message, title, icon, options) {
				var alertElem, messageElem, titleElem, iconElem, innerElem, _container;
				if (typeof options === "undefined") {
					options = {};
				}
				options = $.extend({}, Alert.defaults, options);
				if (!_container) {
					_container = $("#alerts");
					if (_container.length === 0) {
						_container = $("<ul>").attr("id", "alerts").appendTo($("body"));
					}
				}
				if (options.width) {
					_container.css({
						width: options.width
					});
				}

				alertElem = $("<li>")
				.addClass("alert-auto")
				.addClass("alert-auto-" + type);
				setTimeout(function () {
					alertElem.addClass("open-alert");
				}, 1);
				if (icon) {
					iconElem = $("<i>").addClass(icon);
					alertElem.append(iconElem);
				}
				innerElem = $("<div>").addClass("alert-auto-block");
				alertElem.append(innerElem);
				if (title) {
					titleElem = $("<div>").addClass("alert-auto-title").append(title);
					innerElem.append(titleElem);
				}
				if (message) {
					messageElem = $("<div>").addClass("alert-auto-message").append(message);
					innerElem.append(messageElem);
				}
				if (options.displayDuration > 0) {
					setTimeout(function () {
						leave();
					}, options.displayDuration);
				} else {
					innerElem.append("<em>Click to Dismiss</em>");
				}
				alertElem.on("click", function () {
					leave();
				});

				function leave() {
					alertElem.removeClass("open-alert");
					alertElem.one(
						"webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
						function () {
							return alertElem.remove();
						}
						);
				}
				return _container.prepend(alertElem);
			};
			Alert.defaults = {
				width: "",
				icon: "",
				displayDuration: 3000,
				pos: ""
			};
			Alert.info = info;
			Alert.warning = warning;
			Alert.error = error;
			Alert.trash = trash;
			Alert.success = success;
			return (_container = void 0);
		})(Alert || (Alert = {}));

		this.Alert = Alert;
	</script>
</body>
</html>