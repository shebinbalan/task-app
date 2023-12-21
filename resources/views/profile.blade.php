@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    User Profile
                </div>
                
            </div>
            <div class="card-body">

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Title :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                        {{ Auth::user()->name }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Description :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                        {{ Auth::user()->email }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Category :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $task->category->name }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Due Date :</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $task->due_date }}
                        </div>
                    </div>
                  
            </div>
        </div>
    </div>
</div>    
@endsection




