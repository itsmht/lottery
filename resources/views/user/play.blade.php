@include('userLayouts.head')
@include('userLayouts.navbar')

	<div class="container">
	

<ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
	<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><meta itemprop="position" content="1"><a href="index.html" title="Lotto-India.com Home" itemprop="item"><span itemprop="name">Lotto.india.com</span></a></li>
	<li>Play Asian Lottery</li>
</ol>

<div class="genBox mBottom">

	<h1>Play Asian Lottery</h1>

	<div class="centred">
	
	</div>
	

	
	<p>Why not try these other great lotteries with huge prizes? Check your luck.</p>
		
	<div class="centred">
	@foreach($schemes as $scheme)
		<div class="jackpotBox lottery powerball">
			<div class="title">{{$scheme->title}}</div>
			<div class="subJackpot" style="color: #333;">Price: {{$scheme->price}}</div>
			<div class="jackpot">Winning Price: {{$scheme->winning_price}}!</div>
			
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