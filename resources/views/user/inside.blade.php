@include('userLayouts.head')
@include('userLayouts.navbar')

	<div class="container">
	
		
	<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
		<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><meta itemprop="position" content="1"><a href="index.html" title="Lotto-India.com Home" itemprop="item"><span itemprop="name">Lotto-india.com</span></a></li>
		
	</ol>

	<div class="genBox mBottom fx -bt">
	
		<h1>{{$scheme->title}}</h1>
		
		<p>Check your Lotto India numbers to find out if you have the jackpot. There are a couple of ways you can check your six numbers - either select them from a grid or type them in. Switch between the two methods by selecting the 'Input Mode' button on the right-hand side of the checker.</p>		
        <p>The Checker also allows you to select the time period you wish to view, and whether you want to look at the results from Tuesday draws, Fridays draws or both. Select the ‘Check Results’ button when you are ready. You will be shown which winning numbers you have matched in draws from your chosen time period, as well as the value of any prizes you have won. Select 'Add Line' to check more than one set of numbers at a time, or ‘Reset Checker’ to start again.</p>
		
	</div>
	
	
	
	<div class="centred">
	
		<div class="lotto-india nextBox" style="position: relative;">
	
			
				<div class="imgBox">
					<img src="../assets2/images/layout/logo.svg" alt="Lotto India Logo">
				</div>
			
	
				<div class="col">
					<div class="title">
						Next Jackpot
						
					</div>
					
						<div class="bigJackpotWhite">&#8377;<span class="mainJackpot">1 Lakh</span></div>
						<div class="date">Friday, November 8, 2024</div>
										
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
		
		<p style="padding: 20px 30px; margin: 0 0 -30px;">Choose <b>one</b> numbers from <strong>1 to 100</strong></p>
		
		<div id="checker-content">
			<div id="checker-lines"></div>
		</div>
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
	
	<script src="../assets2/js/multi-checker-gridf425?v=0pMEZt8kWS-V7aLU-kuGysJwD0TRF-iGwF8DsR8JclA1"></script>

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
					select: 1,
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