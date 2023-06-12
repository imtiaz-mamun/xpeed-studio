<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<style type="text/css">
		.col {
			float: left;
			width: 50%;
			padding: 1px;
		}
		.row:after {
			content: "";
			display: table;
			clear: both;
		}
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
	</style>
</head>
<body>
	<div class="card">
		<h2>XpeedStudio</h2>
		<div class="row">
			<div class="col">
				<div class="form-group">
					<input id="amount" type="number" placeholder="Amount" oninput="check_num_only(this.value)">
				</div>
			</div>

			<div class="col">
				<div class="form-group">
					<input id="buyer" type="text" placeholder="Buyer" maxlength="20" oninput="onlyLettersAndNumbersWithSpace(this.value)">
				</div>
			</div>

			<div class="col">
				<div class="form-group">
					<input id="receipt_id" type="text" placeholder="Receipt ID" oninput="check_text_only(this.value)">
				</div>
			</div>

			<div class="col">
				<div id="item_con" class="form-group">
					<input id="item_1" type="text" placeholder="Item No. 1" oninput="check_text_only(this.value)" style="width:90%" class="d_item">
					<button type="button" name="button" onclick="newinput_item()" style="width:8%;height: 100%;cursor: pointer;">+</button>
				</div>
			</div>
			<div id="after_item_div" style="position: relative;">
				<div class="col">
					<div class="form-group">
						<input id="buyer_email" type="email" placeholder="Buyer Email" onfocusout="validateEmail(this.value)">
					</div>
				</div>

				<div class="col">
					<textarea id="note" type="text" placeholder="Note" rows="5" oninput="countWords(this.value)"></textarea>
				</div>

				<div class="col">
					<div class="form-group">
						<input id="city" type="text" placeholder="City" oninput="check_text_only(this.value)">
					</div>
				</div>

				<div class="col">
					<div class="form-group">
						<input id="phone" type="number" placeholder="Phone" onfocus="add880(this.value)" onfocusout="remove880(this.value)" oninput="check_num_only(this.value)">
					</div>
				</div>

				<div class="col">
					<div class="form-group">
						<input id="entry_by" type="number" placeholder="Entry By" oninput="check_num_only(this.value)">
					</div>
				</div>
				<div class="col">
					<input type="submit" value="Submit" onclick="submit_form()" style="background: #666666; width: 40%;">
					<input class="button_sub" type="button" value="View All Submit" onclick="view_page()" style="background: #ff9922;width: 40%;right:0;position: absolute;margin-right: 0px;">
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">

		var id = 2;
		var b_top = 40;
		var newinput_item = function() {
			var parent = document.getElementById("item_con");
			var field = document.createElement("input");
			field.style = "display:block;width:90%;position:relative;";
			field.id = "item_" + id;
			field.classList.add('d_item');
			field.placeholder = "Item No. " + id;
			parent.appendChild(field);
			var now_this_item = document.getElementById("item_" + id);
			var now_id = "#item_" + id;
			var now_i = "item_" + id;
			id += 1;
			var bellow = document.getElementById("after_item_div");
			bellow.style.top = b_top+"px";
			b_top += 40;
			document.body.addEventListener( 'input', function ( event ) {
				if( event.target.id == now_i ) {
					let istext = /^[A-Za-z\s]*$/.test(now_this_item.value);
					if(!istext){
						Alert.error('Error! This field accepts Text only! ','Error',{displayDuration: 3000, pos: 'top'});
					}
				};
			} );
		}
		
		function check_num_only(value){
			let isnum = /^\d+$/.test(value);
			if(!isnum){
				Alert.error('Error! This field accepts Number only! ','Error',{displayDuration: 3000, pos: 'top'});
				return false;
			}
			else return true;
		}
		function check_text_only(value){
			let istext = /^[A-Za-z\s]*$/.test(value);
			if(!istext){
				Alert.error('Error! This field accepts Text only! ','Error',{displayDuration: 3000, pos: 'top'});
				return false;
			}
			else return true;
		}
		function onlyLettersAndNumbersWithSpace(value){
			let isok = /^[A-Za-z0-9\s]*$/.test(value);
			if(!isok){
				Alert.error('Error! This field accepts Letters, Numbers and Space only! ','Error',{displayDuration: 3000, pos: 'top'});
				return false;
			}
			else return true;
		}
		function onlyLettersAndNumbersWithSpace(value){
			let isok = /^[A-Za-z0-9\s]*$/.test(value);
			if(!isok){
				Alert.error('Error! This field accepts Letters, Numbers and Space only! ','Error',{displayDuration: 3000, pos: 'top'});
				return false;
			}
			else return true;
		}
		function validateEmail(value) {
			var validRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if (value.match(validRegex)) {
				return true;
			} else {
				Alert.error('Error! This is not a valid Email address! ','Error',{displayDuration: 3000, pos: 'top'});
				return false;
			}
		}
		function countWords(str) {
			document.getElementById("note").maxLength = 10000001;
			total_word = str.trim().split(/\s+/).length;
			if(total_word>29){
				document.getElementById("note").maxLength = str.length;
			}
		}
		function count30Words(str) {
			total_word = str.trim().split(/\s+/).length;
			if(total_word<=30){
				return true;
			}
			else return false;
		}
		function add880(value){
			if(value==""){
				document.getElementById("phone").value = 880;
			}
		}
		function remove880(value){
			if(value==880){
				document.getElementById("phone").value = "";
			}
		}
		function submit_form(){
			var item_collection_id = new Array();
			var item_collection_value = new Array();
			var amount = document.getElementById('amount');
			var buyer = document.getElementById('buyer');
			var receipt_id = document.getElementById('receipt_id');
			const item_collection = document.getElementsByClassName("d_item");
			var buyer_email = document.getElementById('buyer_email');
			var note = document.getElementById('note');
			var city = document.getElementById('city');
			var phone = document.getElementById('phone');
			var entry_by = document.getElementById('entry_by');
			// function sha512(str) {
			//   return crypto.subtle.digest("SHA-512", new TextEncoder("utf-8").encode(str)).then(buf => {
			//     return Array.prototype.map.call(new Uint8Array(buf), x=>(('00'+x.toString(16)).slice(-2))).join('');
			//   });
			// }
			// var encode_receipt_id = sha512(receipt_id).then(encode_receipt_id => encode_receipt_id);
			for (var i=0; i< item_collection.length; i++ ) {
				item_collection_id[i]=item_collection[i].id;
			}
			for (var i=0; i< item_collection.length; i++ ) {
				item_collection_value[i]=item_collection[i].value;
			}
			// const client_ip = fetch('https://api.ipify.org?format=json')
			// .then(response => response.json())
			// .then((data) => {
			// 	return data.ip;
			// });
			const obj_this_buy = {
				amount: amount.value,
				buyer: buyer.value,
				receipt_id: receipt_id.value,
				items: item_collection_value,
				buyer_email: buyer_email.value,
				note: note.value,
				city: city.value,
				phone: phone.value,
				entry_by: entry_by.value
			};
			const obj_this_form = {
				amount: amount,
				buyer: buyer,
				receipt_id: receipt_id,
				items: item_collection_id,
				buyer_email: buyer_email,
				note: note,
				city: city,
				phone: phone,
				entry_by: entry_by
			};
			var back_chk = backend_chk(obj_this_buy,obj_this_form);
		}
		function backend_chk(obj_this_buy,obj_this_form){
			if(check_num_only(obj_this_buy.amount)==true && onlyLettersAndNumbersWithSpace(obj_this_buy.buyer)==true && check_text_only(obj_this_buy.receipt_id)==true && check_text_only(obj_this_buy.items)==true && validateEmail(obj_this_buy.buyer_email)==true && count30Words(obj_this_buy.note)==true && check_text_only(obj_this_buy.city)==true && check_num_only(obj_this_buy.phone)==true && check_num_only(obj_this_buy.entry_by)==true){
				submit_api_call(obj_this_buy);
			}	
			else {
				if(check_num_only(obj_this_buy.amount)==false ){
					obj_this_form.amount.focus();
				}
				else if(onlyLettersAndNumbersWithSpace(obj_this_buy.buyer)==false){
					obj_this_form.buyer.focus();
				}
				else if(check_text_only(obj_this_buy.receipt_id)==false){
					obj_this_form.receipt_id.focus();
				}
				else if(check_text_only(obj_this_buy.items)==false){
					document.getElementById("item_1").focus();
				}
				else if(validateEmail(obj_this_buy.buyer_email)==false){
					obj_this_form.buyer_email.focus();
				}
				else if(count30Words(obj_this_buy.note)==false){
					obj_this_form.note.focus();
				}
				else if(check_text_only(obj_this_buy.city)==false){
					obj_this_form.city.focus();
				}
				else if(check_num_only(obj_this_buy.phone)==false){
					obj_this_form.phone.focus();
				}
				else if(check_num_only(obj_this_buy.entry_by)==false){
					obj_this_form.entry_by.focus();
				}
				Alert.error('Error! Data Validation Error! ','Error',{displayDuration: 3000, pos: 'top'});
			}
		}
		function submit_api_call(obj_this_buy){
			var responseText = $.ajax({ type: "POST",   
				url : "form-submit-api.php",   
				data: ({obj_this_buy: obj_this_buy}),
				async   : false
			}).responseText;
			if(responseText=="1"){
				Alert.success('Success! Form Submit is Successful! ','Success',{displayDuration: 3000, pos: 'top'});
			}
			else{
				Alert.error('Error! Form Submit is Unsuccessful! ','Error',{displayDuration: 3000, pos: 'top'});
			}
		}
		function view_page(){
			window.location.href = "view_page.php";
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