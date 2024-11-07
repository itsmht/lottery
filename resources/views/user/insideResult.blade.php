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
        <h1>Results of {{$scheme->title}}</h1>
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
