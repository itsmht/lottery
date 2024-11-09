@include('userLayouts.head')
@include('userLayouts.navbar')

	<div class="container">
	

<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><meta itemprop="position" content="1"><a href="index.html" title="Lotto-India.com Home" itemprop="item"><span itemprop="name">Lotto.india.com</span></a></li>
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><meta itemprop="position" content="2"><a href="information.html" title="The Asian Lottery Information" itemprop="item"><span itemprop="name">Information</span></a></li>	
	<li>How to Play</li>
</ol>

<div class="genBox mBottom">

	<h1>How to Play</h1>


	<div id="steps" class="fx">
	
		<div class="row">
			<div class="step">
				<img itemprop="image" alt="Selecting your Numbers" src="../assets2/images/howto/1-choose-numbers.svg">
				<div class="h3">Select Your Numbers</div>
				<p>Visit the <a href="{{route('play')}}" title="Play The Asian Lottery">Play The Asian Lottery</a> page and select the 'Play' button. In the numbers panel select six numbers from 1 to 99, or alternatively opt for a Quick Pick to have a random set of numbers generated for you.</p>
			</div>
			<div class="step">
				<img alt="Choosing the number of draws" src="../assets2/images/howto/2-choose-draws.svg">
				<div class="h3">Check the Draw Date</div>
				<p>Your numbers will automatically be entered into the next draw which will be held on everyday. Make sure you check the date of this draw, as this is the only draw your numbers will be entered into and you can only win the jackpot for this draw.</p>
			</div>
		</div>
		
		<div class="row">
			<div class="step">
				<img itemprop="image" alt="Pay for your Panels" src="../assets2/images/howto/3-pay.svg">
				<div class="h3">Complete your entry</div>
				<p>If you are a new user, you will need to register for an account and provide contact details. Existing users need to sign in to complete the checkout process and finalise your ticket entry. Once this has been completed you will see the entry in your account.</p>
			</div>
			<div class="step">
				<img itemprop="image" alt="Check your numbers" src="../assets2/images/howto/4-checker.svg">
				<div class="h3">Check Your Numbers</div>
				<p>Once you have completed your entry, look out for the order confirmation in your emails. You can then check your numbers against the official <a href="{{route('result')}}" title="The Asian Lottery Results">results</a>.</p>
			</div>
		</div>
		
	</div><br>
	
	

	<style>

		#bnr-bg {background: url(images/layout/a-banner-bg.jpg) transparent no-repeat; position: absolute; width: 100%; height: 100%; overflow: hidden;z-index: 1; animation: bg 12s ease-in-out 0s infinite alternate;-webkit-animation: bg 12s ease-in-out 0s infinite alternate;}
		#bnr-base {position: relative; width: 790px; height: 160px; overflow: hidden; display: block; border-radius: 4px; margin:0 auto 20px;}
		#bnr-ad {position: relative; width: 750px; height: 100px; overflow: hidden; display: block; border-radius: 4px;}
		#bnr-logo {background: url(images/layout/a-banner-logo.png) transparent center no-repeat; width: 190px; height: 194px; position: absolute; left: -20px; top: -5px; background-size:190px 194px; z-index: 3;animation: logo 12s cubic-bezier(.68, -.55, .265, 1.55) 0s infinite normal; -webkit-animation: logo 12s cubic-bezier(.68, -.55, .265, 1.55) 0s infinite normal;}

		.bnr-text {position: absolute; width: 100%; left: -20px; top: 65px; transform: scale(.001); text-rendering: optimizeLegibility; z-index: 9;font:700 36px/36px Oswald, arial, sans-serif; color: #000; text-align: center; text-transform: uppercase;animation: textA 12s cubic-bezier(.68, -.55, .265, 1.55) 0s infinite normal; -webkit-animation: textA 12s cubic-bezier(.68, -.55, .265, 1.55) 0s infinite normal;}
		.bnr-text-navi {position: absolute; width: 100%; left: -20px; top: 65px; transform: scale(.001); text-rendering: optimizeLegibility; z-index: 9;font:700 30px/30px Oswald, arial, sans-serif; color: #000; text-align: center; text-transform: uppercase;animation: textA 12s cubic-bezier(.68, -.55, .265, 1.55) 0s infinite normal; -webkit-animation: textA 12s cubic-bezier(.68, -.55, .265, 1.55) 0s infinite normal;}
		#bnr-textA {left:0;}
		#bnr-textA {font-size:24px;}
		.bnr-wrapper.el-nino .bnr-text {color:#fff;}
		#bnr-textB {animation-name: textB; -webkit-animation-name: textB; font-size: 24px; left:-200px; transform:  scale(1); text-align:left; top:30px; font-weight:normal}
		#bnr-textC {animation-name: textC; -webkit-animation-name: textC; left:-350px; transform:  scale(1); text-align:left; top:75px; font-size: 52px;}
		#bnr-textD {animation-name: textC; -webkit-animation-name: textC; left:-350px; transform:  scale(1); text-align:left; top:75px; font-size: 38px;}
		#bnr-textE {animation-name: textC; -webkit-animation-name: textC; left:-350px; transform:  scale(1); text-align:left; top:75px; font-size: 35px;}
		.bnr-textF {position: absolute; width: 100%; left: -20px; top: 20px; transform: scale(.001); text-rendering: optimizeLegibility; z-index: 9;font:700 20px/36px Oswald, arial, sans-serif; color: #000; text-align: center; text-transform: uppercase;animation: textA 12s cubic-bezier(.68, -.55, .265, 1.55) 0s infinite normal; -webkit-animation: textA 12s cubic-bezier(.68, -.55, .265, 1.55) 0s infinite normal;}
		.euroVal {animation-name: euroVal; animation: euroVal 12s linear infinite normal; -webkit-animation-name: euroVal; -webkit-animation: euroVal 12s linear infinite normal; position: absolute; font-size: 12px; bottom: 4px; right: 4px; z-index: 9; color: #FFF;}

		.bnr-button {position: absolute; top: 25px; text-rendering: optimizeLegibility; z-index: 9;animation: button 12s cubic-bezier(.68, -.55, .265, 1.55) 0s infinite normal; -webkit-animation: button 12s cubic-bezier(.68, -.55, .265, 1.55) 0s infinite normal; font-size:28px;}
		
		#bnr-button1 {right: -200px; top:48px;}
		#bnr-base #timer {width:211px;}
		#bnr-textC span {display:block; font-size:18px;}

		@keyframes logo {
			0% {left: -200px;}
			30% {left: -200px;}
			35% {left: -20px;}
			99% {left: -20px;}
			100% {left: -200px;}
		}

		@-webkit-keyframes logo {
			0% {left: -200px;}
			30% {left: -200px;}
			35% {left: -20px;}
			99% {left: -20px;}
			100% {left: -200px;}
		}

		@keyframes textA {
			0% {opacity: 0; transform: scale(.001);}
			2% {opacity: 1; transform: scale(1);}
			23% {opacity: 1; transform: scale(1.07);}
			25% {opacity: 0; transform: scale(4);}
			100% {opacity: 0;}
		}

		@-webkit-keyframes textA {
			0% {opacity: 0; -webkit-transform: scale(.001);}
			2% {opacity: 1; -webkit-transform: scale(1);}
			23% {opacity: 1; -webkit-transform: scale(1.07);}
			25% {opacity: 0; -webkit-transform: scale(4);}
			100% {opacity: 0;}
		}

		@keyframes textB {
			0% {left: -200px;}
			25% {left: -200px;}
			30% {left: 200px;}
			90% {left: 200px;}
			97% {left: -200px;}
			100% {left: -200px;}	
		}

		@-webkit-keyframes textB {
			0% {left: -200px;}
			25% {left: -200px;}
			30% {left: 200px;}
			90% {left: 200px;}
			97% {left: -200px;}
			100% {left: -200px;}		
		}

		@keyframes textC {
			0% {left: -350px;}
			27% {left: -350px;}
			32% {left: 200px;}
			92% {left: 200px;}
			95% {left: -350px;}	
		}

		@-webkit-keyframes textC {
			0% {left: -350px;}
			27% {left: -350px;}
			32% {left: 200px;}
			92% {left: 200px;}
			95% {left: -350px;}		
		}

		@keyframes button {
			0% {right: -250px;}
			36% {right: -250px;}
			42% {right: 40px;}
			98% {right: 40px;}
			100% {right: -250px;}
		}

		@-webkit-keyframes button {
			0% {right: -250px;}
			36% {right: -250px;}
			42% {right: 40px;}
			98% {right: 40px;}
			100% {right: -250px;}
		}

		@keyframes spand {
			0% {transform: scale(1, 1);}
			50% {transform: scale(1.2, 1.2);}
			100% {transform: scale(1, 1);}
		}

		@-webkit-keyframes spand {
			0% {transform: scale(1, 1);}
			50% {transform: scale(1.2, 1.2);}
			100% {transform: scale(1, 1);}
		}

		@keyframes enter {
			0% {opacity: 0; transform: scale(3,3);}
			90% {opacity: 0; transform: scale(3,3);}
			95% {opacity: 1;}
			100% {transform: scale(1,1);}
		}

		@-webkit-keyframes enter {
			0% {opacity: 0; transform: scale(3,3);}
			90% {opacity: 0; transform: scale(3,3);}
			95% {opacity: 1;}
			100% {transform: scale(1,1);}
		}
		
		@keyframes euroVal {
			0%,40%,100% {opacity: 0;}
			52%,98% {opacity: 1;}
		}
		
		@-webkit-keyframes euroVal {
			0%,40%,100% {opacity: 0;}
			52%,98% {opacity: 1;}
		}

	</style>




</div>

	</div>

	@include('userLayouts.footer')