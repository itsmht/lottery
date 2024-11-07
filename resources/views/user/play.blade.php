@include('userLayouts.head')
@include('userLayouts.navbar')

	<div class="container">
	

<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><meta itemprop="position" content="1"><a href="index.html" title="Lotto-India.com Home" itemprop="item"><span itemprop="name">Lotto.india.com</span></a></li>
	<li>Play Lotto India</li>
</ol>

<div class="genBox mBottom">

	<h1>Play Lotto India</h1>

	<p>Take the chance to win a jackpot worth at least ₹1 Lakh by playing Lotto India today. You could even win up to ₹10 Lakh when special Bumper Draws are held. It's the largest free online Indian lottery ever, not to mention the first of its kind: a national lottery for Indian people on every continent. Lotto India draws take place at 6:00 PM every Tuesday and Friday. To find out more, visit the <a href="how-to-play.html" title="How to Play Lotto India">How to Play</a> page.</p>

	
	
	<div class="centred">
	
		<div class="lotto-india nextBox big" style="position: relative;">
	
			
				
			
	
				<div class="col">
					<div class="title">
						Next Jackpot
						
					</div>
					
						<div class="bigJackpotWhite">&#8377;<span class="mainJackpot">1 Lakh</span></div>
						<div class="date">Friday, November 8, 2024</div>
										
				</div>
		
		
			
	
		</div>

	</div>
	

	
	<p>Why not try these other great lotteries with huge prizes:</p>
		
	<div class="centred">
	@foreach($schemes as $scheme)
		<div class="jackpotBox lottery powerball">
			<div class="title">{{$scheme->title}}</div>
			<div class="subJackpot" style="color: #333;">Price: {{$scheme->price}}</div>
			<div class="jackpot">Winning Price: {{$scheme->winning_price}}!</div>
			<div class="date" style="color: #333;">Wednesday 6th November</div>
			
            @if(session()->has('logged'))
            <a href="{{ route('inside', ['id' => $scheme->scheme_id]) }}" class="button">Play Now</a>
            @else
                <a href="{{route('login')}}"  class="button">Login</a>
            @endif

				
		</div>
	@endforeach
	
	</div><br>
		
	<h2>Why Play the Lottery Online?</h2>

    <p>Entering online is much quicker and more convenient than purchasing a paper ticket from a retailer, and you can do it from home or on the go. Here are some of the biggest benefits to playing online lotteries:</p>

	<div class="col-list p-margin alLeft">
        <div>
            <img src="../assets2/images/icons/secure.svg" alt="Secure">
            <p>The numbers you pick are kept safe in your online account – you’ll never have to worry about losing a ticket.</p>
        </div>
        <!--<div>
            <img src="../assets2/images/icons/notification.svg" alt="Notification">
            <p>You’ll receive an automatic email every time you win a prize, so you’ll never miss a win again!</p>
        </div>-->
        <div>
            <img src="../assets2/images/icons/online.svg" alt="Online">
            <p>You can log in to your account from your phone, computer, or tablet, and you don't need a lottery card.</p>
        </div>
        <div>
            <img src="../assets2/images/icons/thumb.svg" alt="Convenience">
            <p>Get your entries quickly and easily online; no more queuing for tickets at your local mom-and-pop store.</p>
        </div>
    </div>

</div>

	</div>

	@include('userLayouts.footer')