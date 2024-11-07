@include('userLayouts.head')
@include('userLayouts.navbar')

	<div class="container">
	

<div class="row mBottom introBox">

	<div class="contentBox">
	
		<h1>The Asian Lottery</h1>
		
		<p class="big">The first free online lottery for the whole of Bangladesh, with a jackpot worth at least <strong>৳1 Lakh</strong> in every draw!</p>
		
		<div class="centred">
	
			<div class="lotto-Bangladesh nextBox big" style="position: relative;">
		
				
					
				
		
					<div class="col">
						<div class="title">
							Next Jackpot
							
						</div>
						
							<div class="bigJackpotWhite">৳<span class="mainJackpot">1 Lakh</span></div>
							
											
					</div>
			
			
				
		
			</div>
	
		</div>
		
		<p>Bangladeshi lottery fans can take part in The Asian Lottery from countries around the world, and it's easy to play. Just pick six numbers from 1 to 99 in with a chance of becoming the next lakhpati for free! You could even win up to ₹10 Lakh in special <a href="bumper-draw.html" title="Bumper Draws">Bumper Draws</a> that take place to celebrate big holidays and festivals in Bangladesh.</p>
		
		<p>The Asian Lottery draws take place everyday at 9:00 PM in Bangladesh. Entries are completely free and can be made until 8:00 PM on the day of each draw, and will open back up shortly after 9:00 PM for the next draw.</p>
		<h2>Available Lotteries</h2>
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



		<h2>Latest Results</h2>
		<p>Draws take place everyday at 9:00 PM, and you can find the latest winning numbers directly below or on the <a href="{{route('result')}}" title="Lotto Bangladesh Results">Results</a> page straight after every draw.</p>
		
		<div class="resultsHome genBox">
			<div class="fx -cn titleBox">
				<div class="date">Tuesday, November 5, 2024</div>
				<div class="date">Basic</div>
			</div>
			<ul class="balls alt">
				
					<li class="ball ball">12</li>
				
			</ul>
			<div class="row fx -cn -md">
				<a href="{{route('result')}}" title="More Lotto Bangladesh Results" class="button orange">More Results</a>
			</div>
		</div><br>	
	
	</div>
	
	<div class="infoBoxHome">

		

<div class="jackpotBox">

	<div class="jackpotInner">
		<div class="title">Next Jackpot</div>
		<div class="jackpot">1 <span style="font-size: 0.6em;">Lakh</span></div>
	</div>

	<div class="ctaBox">
		<div class="title">Upcoming Draw:</div>
		<p>Everyday at 9.00 PM</p>
		
			<br><a href="{{route('play')}}" title="Play Lotto Bangladesh" class="button" >Play Now</a>
		
	</div>

</div>
		
		
		<div class="linkBox">
			<div class="box">
				<div class="title stats"><a href="{{route('about')}}" title="Lotto Bangladesh FAQs">How We Work</a></div>
				<p>Read about The Asian Lottery and win daily.</p>
			</div>
			<div class="box">
				<div class="title picker"><a href="{{route('result')}}" title="Check your Lotto Bangladesh numbers here">Check Your Numbers</a></div>
				<p>Check your numbers to find out if you've won the jackpot.</p>
			</div>
		</div>
		
		<a class="helpBox" href="{{route('how')}}" title="Learn how to play">
			<p class="big">How to Play The Asian Lottery</p>
			<img src="../assets2/images/info/guide.png" alt="Lotto Guide">
		</a>

		

	</div>

</div>

	</div>

@include('userLayouts.footer')