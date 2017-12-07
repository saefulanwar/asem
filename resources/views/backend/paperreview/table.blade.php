<table class="table table-bordered">
    <thead>
        <tr>
            @if ($status == '2')
            <td width="80">Action</td>
            @endif
            <td width="120">Participant</td>
            <td width="170">Upload Date</td>
        </tr>
    </thead>
    <tbody>
        <?php $request = request(); ?>

        @foreach($record as $r)
        {{-- {{ dd($r) }} --}}
        <tr>
            @if ($status == '2')
            <td>
                @if (check_user_permissions($request, "Paperreview@edit", $r->id))
                <a href="{{ route('paperreview.edit', $r->id) }}" class="btn btn-xs btn-default">
                    <i class="fa fa-edit"></i>
                </a>
                @else
                <a href="#" class="btn btn-xs btn-default disabled">
                    <i class="fa fa-edit"></i>
                </a>
                @endif
            </td>
            @endif
            <td>{{ $r->participant->name }}</td>
            <td>
                <abbr title="{{ $r->dateFormatted(true) }}">{{ $r->dateFormatted() }}</abbr>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

@section('script')
<script type="text/javascript">
</script>
@endsection
