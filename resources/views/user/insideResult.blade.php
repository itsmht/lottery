@include('userLayouts.head')
@include('userLayouts.navbar')

<div class="container">
    

    <div class="genBox mBottom">
        <h1>Results of {{$scheme->title}}</h1>
    </div>

    

    <div class="previousResults fx">
        @foreach($anns as $ann)
            <div class="genBox mBottom resultsBox colHalf">
                <div class="row fx -bt -al">
                    <div class="date">{{ \Carbon\Carbon::parse($ann->created_at)->format('l, F j, Y') }}</div>
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
