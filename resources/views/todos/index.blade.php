@extends('app');

@section('content')
    <div class="container w-25 border p-4 mt-4">
    <form action="{{ route('todos') }}" method="POST">
    <!-- cross site request forgery     -->
    @csrf 

    @if (session('success'))
        <h6 class="alert alert-success">
            {{session('success')}}
        </h6>
    @endif

    @error('title')
    <h6 class="alert alert-danger">
            {{$message}}
        </h6>
    @enderror
    <div class="mb-3">
        <label for="title" class="form-label">Task Title</label>
        <input type="text" name="title" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
    </div>
@endsection