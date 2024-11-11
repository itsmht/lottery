@include('userLayouts.head')
@include('userLayouts.navbar')
@include('sweetalert::alert')

	<div class="container">
	

<div id="mainPromo" class="altBg">

	<div class="inner centred">
							
		
	
			<h1>Register to play in our amazing FREE draw!</h1>
			
			<p style="max-width: 800px; margin: auto;">Register now for the The Asian Lottery. Submit your details right here to sign up in a matter of seconds. You’ll then be able to enter our site, play and maybe win up to 1 Lakh! It’s completely free to register and play.</p>
			
			<div class="formBox">
			
				<h2>Enter your details below:</h2>
	
				
			
				<form action="{{route('registerSubmit')}}" name="form" method="post" onSubmit="return checkDetails();">
                    {{@csrf_field()}}
					<div class="fx-sm">
						<div>
							<input id="Name" name="name" placeholder="Name" class="textBox" tabindex="3" type="text" maxlength="255"><br>
                            @error('name')
                                <span class="text-danger" style="color: #dc3545;font-size: 0.9rem; margin-top: 5px; display: block;">{{$message}}</span>
                            @enderror
							<input id="Phone" name="phone" placeholder="Phone" class="textBox" tabindex="4" type="text" maxlength="255"><br>
                            @error('phone')
                                <span class="text-danger" style="color: #dc3545;font-size: 0.9rem; margin-top: 5px; display: block;">{{$message}}</span>
                            @enderror
							<input id="Phone" name="refer_code" placeholder="Refer Code" class="textBox" tabindex="4" type="text" maxlength="255"><br>
						</div>
						<div>
							<input id="Password" name="password" placeholder="Choose a Password" class="textBox" tabindex="6" type="password" maxlength="255"><br>
                            @error('password')
                                <span class="text-danger" style="color: #dc3545;font-size: 0.9rem; margin-top: 5px; display: block;">{{$message}}</span>
                            @enderror
							<input id="ConfirmPassword" name="conf_password" placeholder="Confirm Password" class="textBox" tabindex="7" type="password" maxlength="255"><br>
							@error('conf_password')
                                <span class="text-danger" style="color: #dc3545;font-size: 0.9rem; margin-top: 5px; display: block;">{{$message}}</span>
                            @enderror
							<br><br>
						</div>
					</div>
				
					<input id="submit_form" class="button" type="submit" tabindex="10" value="Register">
				
					<p class="smallTxt centred" style="padding-top: 10px;"><span class="redTxt">*</span> All form fields are required</p><br>
					
					<p>Already registered? <a href="{{route('login')}}">Click here to login</a></p>
				
				</form>
				
			</div>
	
		
		
		<div class="inner centred">
		
			<div class="regPromo weekly">
				<div class="floatLeft">
					<div class="jackpot"><strong>1 Lakh</strong> Jackpot!</div>
				</div>
			</div>
		
			<p class="promoTxt">What are you waiting for? <strong>Join and play for FREE today!</strong></p>
		
		</div>
		
	</div>

</div>

	</div>

	@include('userLayouts.footer')