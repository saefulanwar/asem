<table class="table table-bordered">
    <thead>
        <tr>
            @if ($status == '2')
            <td width="80">Action</td>
            @endif
            <td width="120">Participant</td>
            <td width="170">Proof Date</td>
        </tr>
    </thead>
    <tbody>
        <?php $request = request(); ?>

        @foreach($record as $r)
        {{-- {{ dd($r) }} --}}
        <tr>
            @if ($status == '2')
            <td>
                @if (check_user_permissions($request, "Provepaymentproof@update", $r->id))
                <button type="button" class="btn btn-xs btn-danger" data-id="{{$r->id}}" onclick="formApprove(this);"><i class="fa fa-pencil-square"></i></button>
                @else
                <button type="button" onclick="return false;" class="btn btn-xs btn-danger disabled"><i class="fa fa-pencil-square"></i></button>
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
    @if (check_user_permissions($request, "Provepaymentproof@update", $r->id))
        function formApprove(el) {
            var hidden = document.createElement("input");
            hidden.setAttribute("type", "hidden");
            hidden.setAttribute("name", "_method");
            hidden.setAttribute("value", "PUT");
            
            var token = document.createElement("input");
            token.setAttribute("type", "hidden");
            token.setAttribute("name", "_token");
            token.setAttribute("value", "{{ csrf_token() }}");

            var select = document.createElement("select");
            my_form=document.createElement('FORM');
            my_form.id='post-form';
            my_form.method='POST';
            my_form.action= "{{action('Backend\ApprovalpaymentproofController@update',['id' => ''])}}/"+$(el).data('id');

            select.name = "payment_status_id";
            select.id = "payment_status_id";
            str_option = '';
            @foreach($statusList as $key => $r)
                    str_option += '<option value="{{$r}}">{{$key}}</option>';
            @endforeach
            select.innerHTML = str_option;
            my_form.appendChild(hidden);
            my_form.appendChild(token);
            my_form.appendChild(select);
            swal({
                content: my_form,
                title: 'Please choose to process this payment proof',
            }).then(function (result,i) {
                var val = $(select).val();
                $(my_form).submit();
            });
        }
    @endif
</script>
@endsection
