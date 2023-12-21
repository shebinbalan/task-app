@extends('categories.layout')

@section('content')
<div class="card"> </div>
<br><br>
    <div class="card">
    <div class="card-header">
    <div class="row">
        <div class="col-lg-9 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('categories.create') }}">Create New Categories</a>
            </div>
        </div>
    </div>
</div>

        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    
                    <th width="280px">Action</th>
                </tr>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $category->name }}</td>
                        
                        <td>
                            <form action="{{ route('categories.destroy',$category->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            {!! $categories->links() !!}
        </div>
    </div>
@endsection
