@include('userLayouts.head')
@include('userLayouts.navbar')

<div class="container">


    <div class="genBox mBottom">
        <!-- Stylized Table -->
        <div class="table-responsive">
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

</div>

@include('userLayouts.footer')
