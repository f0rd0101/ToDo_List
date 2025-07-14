@extends('layouts.main')
@section('content')


<div>
<div class='div-form'>
<form action="{{ route('tasks.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label>Task Name</label>
    <input  name="title" class="form-control" id="exampleInputEmail1"  placeholder="Enter task title">
    
  </div>
  <div class="form-group">
    <label>Content</label>
    <input name="content" class="form-control"  id="exampleInputPassword1" placeholder="Add details about the task">
  </div>
  <button type="submit" class="btn btn-success d-block mx-auto mt-2">Add</button>
</form>
</div>
<div class = "data-div">
    <ul>
        @foreach($tasks as $task)
         <li class = "item-li">
           <h2>{{ $task->title }}</h2>
           <p class="content-p">{{ $task->content }}</p>
           <div class="buttons-div">
           <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
           <form action="{{ route('tasks.delete', $task->id) }}" method = "post">
            @csrf
            @method('DELETE')
            <input type="submit" value = 'Delete' class = 'btn btn-danger'>
            </div>
           </form>
        
           

         </li>
        @endforeach
    </ul>
    </div>
</div>


@endsection