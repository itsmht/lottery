@include('userLayouts.head')
@include('userLayouts.navbar')

	<div class="container">
	

<div id="mainPromo" class="altBg">

	<div class="inner centred">
							
		
	
			<h1>Register to play in our amazing FREE draw!</h1>
			
			<p style="max-width: 800px; margin: auto;">Register now for the Lotto India. Submit your details right here to sign up in a matter of seconds. You’ll then be able to enter our twice-weekly draws, get your tickets checked and maybe win up to ₹1 Lakh! It’s completely free to register and play.</p>
			
			<div class="formBox">
			
				<h2>Enter your details below:</h2>
	
				
			
				<form action="{{route('login.submit')}}" name="form" method="post" onSubmit="return checkDetails();">
                    {{@csrf_field()}}
					<div class="fx-sm">
						<div>
							<input id="FirstName" name="FirstName" placeholder="First Name" class="textBox" tabindex="3" type="text" maxlength="255"><br>
							<input id="Surname" name="Surname" placeholder="Last Name" class="textBox" tabindex="4" type="text" maxlength="255"><br>
							<input id="Email" name="Email" placeholder="Email Address" class="textBox" tabindex="5" type="email" maxlength="255">
						</div>
						<div>
							<input id="Password" name="Password" placeholder="Choose a Password" class="textBox" tabindex="6" type="password" maxlength="255"><br>
							<input id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password" class="textBox" tabindex="7" type="password" maxlength="255"><br>
							<input type="checkbox" id="AcceptTerms" name="AcceptTerms" value="1" tabindex="9" autocomplete="on">
							I Accept the <a href="../terms-and-conditions.html" target="_blank" title="Click here to read the terms and conditions" onclick="event.stopPropagation();">Terms &amp; Conditions</a>
							<br><br>
						</div>
					</div>
				
					<input id="submit_form" class="button" type="submit" tabindex="10" value="Register">
				
					<p class="smallTxt centred" style="padding-top: 10px;"><span class="redTxt">*</span> All form fields are required</p><br>
					
					<p>Already registered? <a href="login.html">Click here to login</a></p>
				
				</form>
				
			</div>
	
		
		
		<div class="inner centred">
		
			<div class="regPromo weekly">
				<img src="../images/layout/a-banner-logo-hi.png" alt="Draw Logo" width="186" height="186">
				<div class="floatLeft">
					<div class="jackpot"><strong>₹1 Lakh</strong> Jackpot!</div>
					
					<div class="col centred countdown">
						<div class="title">Time Left to Play</div>
						<div id="countdownTimer"></div>
						<script>addLoadEvent(function(){ displayTimer('countdownTimer',236228, 'en'); });</script>
					</div>
				</div>
			</div>
		
			<p class="promoTxt">What are you waiting for? <strong>Join and play for FREE today!</strong></p>
		
		</div>
		
	</div>

</div>

	</div>

	@include('userLayouts.footer')