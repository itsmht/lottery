
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from lotto-india.com/check-numbers by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Nov 2024 16:53:34 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>

	<meta charset="utf-8">
	<title>Check Your Numbers | Lotto India</title>
	<meta name="description" content="Use the ticket checker to automatically check your Lotto India numbers and see if you've won the free jackpot in the past 90 days.">
	<meta name="keywords" content="lotto india results checker, ticket checker, lotto india number checker">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="HandheldFriendly" content="True">
	
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/png" href="apple-touch-icon.png">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	
	<link href="css/stylesdeae.css?v=1vVjLFFXrqP7IGs26ex7oAvprdkZk3vo8yduB_NAjP01" rel="stylesheet"/>

		
	
	<style>
	
		/*############################################
		CHECKER RESULTS
		############################################*/
		
		.switch {padding: 20px;}
		.switch * {vertical-align:middle;display:inline-block;}
		.switch img {padding-left:20px;}
		.onoffswitch {position: relative;background-color: #FFF;border: 2px solid #DDD;border-radius: 36px;display: inline-block;width: 50px;height: 30px;padding: 0;transition: background-color 0.1s ease-in 0s;cursor:pointer; margin-left: 10px;}
		.onoffswitch:before {background: #FFF none repeat scroll 0 0;border-radius: 36px;content:"";display:block;position: absolute;transition: all 0.1s ease-in 0s;height: 25px;width: 25px;left:1px;top:0;cursor:pointer;box-shadow: rgba(0,0,0,0.3) 0 3px 4px;}
		.onoffswitch.on {background:#0A8901;border-color:#0A8901;}
		.onoffswitch.on:before {left:20px;}
		.tonight {padding: 10px; margin: 10px 0 0; background: #FFF; display: inline-block;}
		.checker-results {background:#0A8901;display:flex;width:100%;align-items:center;margin-bottom:20px; box-shadow: rgba(0,0,0,0.1) 0 3px 5px; text-align: center;}
		.checker-results .title{position:relative;color:#FFF;padding:10px 30px;font-weight:700;font-size:18px;line-height:20px;text-align:center;letter-spacing: 0;}
		.checker-results .title:after {content:"";background:#0A8901;position:absolute;width:24px;height:24px;top:calc(50%);right:-12px;transform:rotate(-45deg);}
		.checker-results .res td{border:none!important}
		.checker-results a {background: rgba(255,255,255,0.4); color: #FFF; border-radius: 4px; text-align: center; color: #fff; display: inline-block; padding: 4px 6px; text-decoration: none; margin-bottom: 10px;}
		.checker-results #showHideMatch{float:left;margin:0;cursor:pointer} 
		.checker-results .table .nomatch.hide{display:none}
		.checker-results .chosen-numbers{background: #F4F4F4; padding: 20px 5px;flex:1;text-align: center;}
		.checker-results .chosen-numbers .padded {padding: 5px;}
		.checker-results .chosen-numbers .balls {display: block;}
		.checker-results .chosen-numbers p {font-size: 11px; margin-bottom: 0; padding-bottom: 0;}
		
		.notice-box {display: block; background: #ff9c00; color: #FFF;}
		.notice-box a {color: #FF0;}
		.notice-box a:hover {color: #0A8901;}
		.resultsBox {display: inline-block;}
		.checkerRow {margin: 0; padding: 20px 10px; border-bottom: 1px solid #DDD;}
		.checkerRow:last-child {border-bottom: none;}
		.checkerRow .balls {margin-bottom: 0;}
		.checkerRow .balls * {position: relative; overflow: visible;}
		.checkerRow.won {box-shadow: inset #F90 0 0 30px 10px; border-radius: 10px; margin: 5px 0;}
		.checkerRow .won {display: inline-block; padding: 5px 20px; font-size: 1.2em;}
		.checkerRow .won span {color: #F00;}
		.numMatched {font-size: 14px; display: block; text-align: center;}
		.checkerRow .match:after {content:"\2713"; background:#ff9c00; color: #FFF; border-radius: 50%; text-align: center; line-height: 20px;position: absolute; bottom:-5px; right:-5px; width: 18px; height: 18px;font-size:14px;}
		.claimLink {font-size:10px;}
		.table .res td {border: none;}
		.table tr.hide {display: none;}
		
		.ball.disabled, .grid ul li.is-disabled {background: #CCC; color: #AAA; border-color: #CCC;}
		.ball.joker.disabled, #checker-grid-joker .grid ul li.is-disabled {border-color: #AAA; background: #DDD; color: #AAA;}
		
		
			.genBox.mag {margin: 0 10px 20px;}
		
		
		/*############################################
		CHECKER INPUT
		############################################*/
		
		input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button{-webkit-appearance:none;margin:0;}
		#checker{background:#E4E4E4;color:#333;overflow:hidden; text-align: center;}
		#checker-header{position: relative; padding:10px 20px;background:#0A8901; color: #FFF;}
		#checker-header .title {font-size: 20px; display: inline-block;}
		#checker-content{padding:15px 20px 0px; text-align: center;}
		#checker-header label{display:flex;cursor:pointer;align-items:center; position: absolute; right: 10px; top: 12px;}
		#checker-header label input{display:none;}
		#checker-header label > div:first-child{opacity:.5;}
		#checker-header label > div:last-child{width:120px;position:relative;margin:0 5px;overflow:hidden;background: #ff9c00; border-radius:3px; color: #FFF; padding: 2px 0; font-size: 14px;}
		#checker-header label > div:last-child:after{content:"";position:absolute;width:10px;height:20px;background:white;top:0;left:100%;transition:all .2s ease-in-out;transform:translate(-50%);}
		#checker-header label span{text-align:center;width:100%;transition:transform .2s ease-in-out;display:block;}
		#checker-header label span:last-child{position:absolute;left:100%;top:0;line-height: 18px;}
		#checker-header label input:checked + div:after{left:0;}
		#checker-header label input:checked + div span{transform:translate(-100%);}

		.line {position: relative; display: inline-block; padding: 20px 0 30px; border-bottom: 1px solid rgba(255,255,255,0.4);}
		.line:last-child {border-bottom: none;}
		.numbers {display: inline-block;}
		.numbers ul:first-child {margin-right: 30px;}
		.numbers ul, .numbers li {position: relative; list-style-type: none; display: inline-block;}
		.numbers input {border: none; border-radius: 8px; padding: 5px; font-size: 30px; font-weight: bold; text-align: center; width: 70px; height: 70px; margin: 0 2px;}
		.numbers input:focus, .numbers input:active {border: 3px solid #0DC100 !important;}
		.numbers ul:nth-child(2) li:after {content: "Joker"; position: absolute; bottom: -20px; width: 100%; left: 0; opacity: 0.7; font-size: 14px; color: #333; font-weight: normal;}
		#checker-reset, .clean {display: inline-block;}
		.clean {position: relative; font-size: 30px; padding-left: 20px; cursor: pointer;}
		#checker .remove{position: absolute; display:inline-block;width:30px;height:30px;background:url(images/icons/icon-trash.svg) no-repeat center/ 100% 100%;cursor:pointer; top: 40px; left: -50px;}
		#checker button {display: inline-block; -webkit-appearance: none; background: none; border: none; color: #0A8901; padding: 10px; font-size: 20px; margin-bottom: 20px; cursor: pointer;}
		#checker-footer {text-align: center; background: #FFF; padding: 10px;}
		#checker-footer label {padding: 10px; display: inline-block;}
		#checker-footer select {width: 150px; margin: 0 10px;}
		#checker-submit, #checker-reset {font-family: montserrat; margin: 10px; line-height: 24px; display: inline-block; width: 200px; cursor: pointer; transition: all .2s ease-in-out; -webkit-appearance: none;}
		#checker-submit {background: #0A8901; border: 3px solid #0A8901;}
		#checker-submit:hover {background: #0DC100; border: 3px solid #0DC100;}
		#checker-reset {background: transparent; border: 3px solid #999; color: #999;}
		#checker-reset:hover {border: 3px solid #0A8901; color: #0A8901;}
		#checker-lines .line .numbers ul input.is-dublicated{transition:all .2s ease-in-out .35s;background:#ff6565;color:#fff;}
		
		.is-grid .numbers ul, .grid ul {list-style-type: none; display: inline-block;}
		.is-grid .numbers ul li, .grid ul li {background: #0A8901; color: #FFF; border: 4px solid #0A8901; width: 50px; height: 50px; text-align: center; display: inline-block; border-radius: 50%; margin: 2px; font-weight: bold; font-size: 22px; line-height: 42px; cursor: pointer;}
		.is-grid .numbers ul li {cursor: default; background: #FFF; width: 70px; height: 70px; border: none; line-height: 70px; color: #0A8901; vertical-align: top; font-size: 30px;}
		.is-grid .numbers ul:nth-child(2) li:after {bottom: -50px;}
		.is-grid .remove {top: 50px !important;}
		.is-grid .clean {top: 30px;}
		#checker-grid-joker .grid ul li {background: #FFF; color: #0A8901;}
		.grid ul li.is-active {background: #ff9c00; border-color: #ff9c00;}
		#checker-grid-joker .grid ul li.is-active {background: #FFF; border-color: #ff9c00; color: #ff9c00;}
		#checker-grid-joker {margin-bottom: 20px;}

		

	</style>
	


	
	
	<script>
		function addLoadEvent(n){if(window.addEventListener)window.addEventListener("load",n,!1);else if(window.attachEvent)window.attachEvent("onload",n);else{var d=window.onload;window.onload=function(){d&&d(),n()}}}
		function addResizeEvent(e) { var t = window.onresize; if (typeof window.onresize != "function") { window.onresize = e } else { window.onresize = function () { if (t) { t() } e() } } }
	</script>
	
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-MZV5BQWLGP"></script>
	<script>
		window.dataLayer=window.dataLayer||[];
		function gtag(){dataLayer.push(arguments);}
		gtag('js',new Date());
		gtag('config','G-MZV5BQWLGP');
	</script>

</head>
<body>

	@include('userLayouts.navbar')

	<div class="container">
	
		
	<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
		<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><meta itemprop="position" content="1"><a href="index.html" title="Lotto-India.com Home" itemprop="item"><span itemprop="name">Lotto-india.com</span></a></li>
		<li>Check Your Numbers</li>
	</ol>

	<div class="genBox mBottom fx -bt">
	
		<h1>Check Your Numbers</h1>
		
		<p>Check your Lotto India numbers to find out if you have the jackpot. There are a couple of ways you can check your six numbers - either select them from a grid or type them in. Switch between the two methods by selecting the 'Input Mode' button on the right-hand side of the checker.</p>		
        <p>The Checker also allows you to select the time period you wish to view, and whether you want to look at the results from Tuesday draws, Fridays draws or both. Select the ‘Check Results’ button when you are ready. You will be shown which winning numbers you have matched in draws from your chosen time period, as well as the value of any prizes you have won. Select 'Add Line' to check more than one set of numbers at a time, or ‘Reset Checker’ to start again.</p>
		
	</div>
	
	
	
	<div class="centred">
	
		<div class="lotto-india nextBox" style="position: relative;">
	
			
				<div class="imgBox">
					<img src="images/layout/logo.svg" alt="Lotto India Logo">
				</div>
			
	
				<div class="col">
					<div class="title">
						Next Jackpot
						
					</div>
					
						<div class="bigJackpotWhite">&#8377;<span class="mainJackpot">1 Lakh</span></div>
						<div class="date">Friday, November 8, 2024</div>
										
				</div>
		
				<div class="col">
				
					
						<div class="col centred countdown">
							<div class="title">Time left to play:</div>
							<div id="lotto-indiaCountdown"></div>
							<script>addLoadEvent(function(){ displayTimer("lotto-indiaCountdown",236236, "en") });</script>
						</div>
					
					
					<br>
					
						<a href="account/register.html" title="Play the Lotto India Draw" class="button" id="nextPlayButton696">Play Now</a>
					
					
				</div>
		
			
	
		</div>

	</div>
	

	
	<form method="post" id="checker">

		<div id="checker-header">
			<div class="title" id="checker-title" data-title="Type in your numbers below, Select your numbers below">Type in your numbers below</div>
			<label id="checker-mode-label" style="display:none;">
				<div>Input Mode:</div>
				<input type="checkbox" id="checker-mode">
				<div>
					<span>Change to Select</span>
					<span>Change to Type</span>
				</div>
			</label>
		</div>
		
		<p style="padding: 20px 30px; margin: 0 0 -30px;">Choose six numbers from <strong>1 to 75</strong></p>
		
		<div id="checker-content">
			<div id="checker-lines"></div>
		</div>
		
		<button id="checker-add" value="+ Add Line" style="visibility:hidden;">+ Add Line</button>

		<div id="checker-footer">
			<div>
				<label>
					<div>Check the last:</div>
					<select name="checkingPeriod" id="checker-period">
						<option value="7" selected>7 days</option>
						<option value="30">30 days</option>
						<option value="90">90 days</option>
					</select>
				</label>
				<label>
					<div>Draw Days:</div>
					<select name="checkingDays" id="checker-days">
						<option value="0" selected>All</option>
						<option value="2">Tuesday</option>
						<option value="5">Friday</option>
					</select>
				</label>
			</div>
			<div>
				<div id="checker-reset" title="Clear all numbers" style="display:none;" class="button grey reset">Reset Checker</div>
				<input type="hidden" value="" id="checker-submit-value">
				<input type="hidden" name="js" value="disable" id="checker-js-availability">
				<input type="submit" id="checker-submit" value="Check Results" class="button">
			</div>
		</div>
		
	</form><br>
	
	<div class="genBox mBottom fx -bt">
		<p>Please note: The results of this checker do not act as proof that you have won a Lotto India prize. You must have a valid entry for the draw in question to be able to claim any prizes. Find out more on the <a href="prizes.html" title="Claim Lotto India prizes">Claim Your Prize</a> page.</p>
	</div>
	
	<script src="js/multi-checker-gridf425?v=0pMEZt8kWS-V7aLU-kuGysJwD0TRF-iGwF8DsR8JclA1"></script>

	<script>
		var checker = new Checker({
			selector: 'checker',
			views: {
				id: 'checker-mode',
				label: 'View mode',
				values: ['inline', 'grid'],
				text: ['Inline', 'Grid']
			},
			balls: {
				ball: {
					id: 'checker-grid-ball',
					name: 'ball',
					text: 'Balls',
					pool: 75,
					select: 6,
					optional: false,
					startWith: 1
				}
			},

			filters: {
				periods: 'checker-period',
				days: 'checker-days',
			},

			parts: {
				title: "checker-title",
				header: 'checker-header',
				content: 'checker-content',
				lines: 'checker-lines',
				remove: 'remove',
				mode: "checker-mode-label",
				grid: 'checker-grid',
				add: 'checker-add',
				reset: 'checker-reset',
				submit: 'checker-submit',
				submitValue: 'checker-submit-value',
				jsAvailability: 'checker-js-availability',
				selectedMessage: "You have already made all your selections.\nPlease deselect a number or add another line to continue."
			},
			cookies: ['checkingNumbers', 'checkingPeriod', 'checkingDays']
		});
	</script>
	
	</div>

	@include('userLayouts.footer')