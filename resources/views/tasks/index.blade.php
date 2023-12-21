@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Tasks</div>
    <div class="card-body">
       
            <a href="{{ route('tasks.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Task</a>
     
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Categories</th>
                <th scope="col">Due Date</th>
                <th scope="col" style="width: 250px;">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->category->name }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                           
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   
                               
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this task?');"><i class="bi bi-trash"></i> Delete</button>
                               

                        </form>
                    </td>
                </tr>
                @endforeach
              
            </tbody>
        </table>

        {{ $tasks->links() }}

    </div>
</div>
@endsection