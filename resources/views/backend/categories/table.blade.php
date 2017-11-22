<table class="table table-bordered">
    <thead>
        <tr>
            <td width="80">Action</td>
            <td>Category Name</td>
            <td width="120">Post Count</td>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)

            <tr>
                <td>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id]]) !!}
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-xs btn-default">
                            <i class="fa fa-edit"></i>
                        </a>
                        @if($category->id == config('cms.default_category_id'))
                            <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                                <i class="fa fa-times"></i>
                            </button>
                        @else
                            <button type="submit" class="btn btn-xs btn-danger js-submit-confirm">
                                <i class="fa fa-times"></i>
                            </button>
                        @endif
                    {!! Form::close() !!}
                </td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->posts->count() }}</td>
            </tr>

        @endforeach
    </tbody>
</table>
