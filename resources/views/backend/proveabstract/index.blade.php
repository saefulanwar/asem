@extends('includes.backend.main')

@section('title', 'Approval Payment proof | Payment proof index')

@section('content')

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Abstract
          <small>Display All Abstract</small>
        </h1>
        <ol class="breadcrumb">
          <li>
              <a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li><a href="{{ route('proveabstract.index') }}">Abstract</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header clearfix">
                    <div class="pull-right" style="padding:7px 0;">
                        <?php $links = [] ?>
                        @foreach($statusLink as $key => $r)
                            <?php $selected = ($status == $key) ? 'selected-status' : '' ?>
                            <?php $links[] = "<a class=\"{$selected}\" href=\"?status={$key}\">" . ucwords($r['name_status']) . "({$r['count']})</a>" ?>
                        @endforeach
                        {!! implode(' | ', $links) !!}
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                    @include('backend.partials.message')

                    @if (! $record->count())
                        <div class="alert alert-danger">
                            <strong>No record found</strong>
                        </div>
                    @else
                        @include('backend.proveabstract.table')
                    @endif
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="pull-left">
                        {{ $record->appends( Request::query() )->render() }}
                    </div>
                    <div class="pull-right">
                        <small>{{ $recCount }} {{ str_plural('Item', $recCount) }}</small>
                    </div>
                </div>
              </div>
              <!-- /.box -->
            </div>
          </div>
        <!-- ./row -->
      </section>
      <!-- /.content -->
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection
