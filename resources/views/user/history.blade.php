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
        <li>Contact Us</li>
    </ol>

    <div class="genBox mBottom">
        <!-- Stylized Table -->
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Scheme Name</th>
                    <th>Picked Number</th>
                    <th>Result</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchases as $p)
                <tr>
                    <td>{{$p->purchase_id}}</td>
                    <td>{{$p->scheme->title}}</td>
                    <td>{{$p->picked_number}}</td>
                    <td>
                        @if ($p->is_win == 0)
                            Result Not Published
                        @elseif ($p->is_win == 2)
                            Lost
                        @else
                            Win
                        @endif
                    </td>
                    <td>
                        @if ($p->status == "1")
                            Approved
                        @elseif ($p->status == "2")
                            Rejected
                        @else
                            Pending
                        @endif
                    </td>
                    <td>{{ \Carbon\Carbon::parse($p->created_at)->format('l, F j, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@include('userLayouts.footer')
