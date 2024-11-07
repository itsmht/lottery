@include('userLayouts.head')
@include('userLayouts.navbar')

<div class="container">
    <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <meta itemprop="position" content="1">
            <a href="index.html" title="Lotto-India.com Home" itemprop="item">
                <span itemprop="name">Lotto.india.com</span>
            </a>
        </li>
        <li>Results</li>
    </ol>

    <div class="genBox mBottom">
        <h1>Results</h1>
        <p>The latest Lotto India results are displayed here straight after every draw, on Tuesdays and Fridays at 6:00 PM. View the six winning numbers to see if you have won the jackpot that can be won for free twice a week. If you've matched enough numbers to win a prize, head to the <a href="prizes.html" title="Claiming Your Prize">How to Claim Prizes</a> page to find out what happens next.</p>
    </div>

    <div class="centred">
        <div class="lotto-india nextBox" style="position: relative;">
            <div class="imgBox">
                <img src="images/layout/logo.svg" alt="Lotto India Logo">
            </div>

            <div class="col">
                <div class="title">Next Jackpot</div>
                <div class="bigJackpotWhite">&#8377;<span class="mainJackpot">1 Lakh</span></div>
                <div class="date">Friday, November 8, 2024</div>
            </div>

            <div class="col">
                <div class="col centred countdown">
                    <div class="title">Time left to play:</div>
                    <div id="lotto-indiaCountdown"></div>
                    <script>addLoadEvent(function(){ displayTimer("lotto-indiaCountdown",236237, "en") });</script>
                </div>
                <br>
                <a href="account/register.html" title="Play the Lotto India Draw" class="button" id="nextPlayButton696">Play Now</a>
            </div>
        </div>
    </div>

    <div class="previousResults fx">
        @foreach($anns as $ann)
            <div class="genBox mBottom resultsBox colHalf">
                <div class="row fx -bt -al">
                    <div class="date">{{ \Carbon\Carbon::parse($ann->created_at)->format('l, F j, Y') }}</div>
                    <div class="drawNumber">Announcement Id <span>{{$ann->announcement_id}}</span></div>
                </div>
                <div class="centred">
                    <div class="ball ball">{{$ann->winning_number}}</div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination links should be outside the loop -->
    <div class="pagination-links" style="text-align: center; margin-top: 20px;">
        {{ $anns->links() }}
    </div>
</div>

@include('userLayouts.footer')
