@extends('layouts.main')
@section('content')
<div>
    <ul>
        @foreach($tasks as $task)
         <li>
           <h2>{{ $task->title }}</h2>
           <p>{{ $task->content }}</p>
           <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
           <form action="{{ route('tasks.delete', $task->id) }}" method = "post">
            @csrf
            @method('DELETE')
            <input type="submit" value = 'Delete' class = 'btn btn-danger'>
           </form>
        
           

         </li>
        @endforeach
    </ul>
</div>

<form action="{{ route('tasks.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label>Task Name</label>
    <input  name="title" class="form-control" id="exampleInputEmail1"  placeholder="What task do you want to acomplish today?">
    
  </div>
  <div class="form-group">
    <label>Content</label>
    <input name="content" class="form-control"  id="exampleInputPassword1" placeholder="Tell more about what do you want to do">
  </div>
  <button type="submit" class="btn btn-primary">Add</button>
</form>
@endsection