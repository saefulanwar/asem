<table class="table table-bordered">
    <thead>
        <tr>
            <td width="80">Action</td>
            <td>Date of Conference</td>
            <td>Audience Registration</td>
        </tr>
    </thead>
    <tbody>
        @foreach($deadlines as $deadline)

            <tr>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['deadline.destroy', $deadline->id]]) !!}
                        <a href="{{ route('deadline.edit', $deadline->id) }}" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"></i>
                        </a>
                            <button type="submit" class="btn btn-xs btn-danger js-submit-confirm">
                                <i class="fa fa-times"></i>
                            </button>
                    {!! Form::close() !!}
                </td>
                <td>{{ $deadline->date_of_conference }}</td>
                <td>{{ $deadline->audience_registration }}</td>
            </tr>

        @endforeach
    </tbody>
</table>
