@extends('layouts.main')
@section('content')


<div>


<div class='div-form'>

<form action="{{ route('tasks.store') }}" method="post" style="padding-top:100px">
  
  @csrf
  <div class="form-group">
    
      @auth
  <h1 style="color:white; margin-bottom:15px">Hello, {{ Auth::user()->name }} 👋</h1>
  @endauth
    <label>Task Name</label>
    <input  name="title" class="form-control" id="exampleInputEmail1"  placeholder="Enter task title">
    
  </div>
  <div class="form-group">
    <label>Content</label>
    <input name="content" class="form-control"  id="exampleInputPassword1" placeholder="Add details about the task">
  </div>
  <button type="submit" class="d-block mx-auto mt-2" style="
  background-color: #4bad4f;
  border-radius: 6px;
  padding: 8px 16px;
  border: none;
  color: white;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 2px 6px rgba(75, 173, 79, 0.4);
"
  onmouseover="this.style.backgroundColor='#3a8c3f'; this.style.boxShadow='0 4px 12px rgba(58, 140, 63, 0.6)';"
  onmouseout="this.style.backgroundColor='#4bad4f'; this.style.boxShadow='0 2px 6px rgba(75, 173, 79, 0.4)';"  >Add</button>
</form>
</div>
<div class = "data-div">
    <ul>
        @foreach($tasks as $task)
         <li class = "item-li">
           <h2>{{ $task->title }}</h2>
           <p class="content-p">{{ $task->content }}</p>
           <div class="buttons-div">
           <a href="{{ route('tasks.edit', $task->id) }}" class="btn" style="
  background-color: #3b82f6;
  border-radius: 6px;
  padding: 8px 16px;
  border: none;
  color: white;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 2px 6px rgba(59, 130, 246, 0.4);
"
onmouseover="this.style.backgroundColor='#2563eb'; this.style.boxShadow='0 4px 12px rgba(37, 99, 235, 0.6)';"
onmouseout="this.style.backgroundColor='#3b82f6'; this.style.boxShadow='0 2px 6px rgba(59, 130, 246, 0.4)';"
>Edit</a>
           <form action="{{ route('tasks.delete', $task->id) }}" method = "post">
            @csrf
            @method('DELETE')
            <input type="submit" value = 'Delete' class = 'btn' style="
  background-color: #ef4444;
  border-radius: 6px;
  padding: 8px 16px;
  border: none;
  color: white;
  font-weight: 600;
  cursor: pointer;
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 2px 6px rgba(239, 68, 68, 0.4);
"
onmouseover="this.style.backgroundColor='#dc2626'; this.style.boxShadow='0 4px 12px rgba(220, 38, 38, 0.6)';"
onmouseout="this.style.backgroundColor='#ef4444'; this.style.boxShadow='0 2px 6px rgba(239, 68, 68, 0.4)';"
>
            </div>
           </form>
        
           

         </li>
        @endforeach
    </ul>
    
    </div>
    <form method="POST" action="{{ route('logout') }}">
  @csrf
  <button type="submit" style="
    background-color: #4bad4f;
    border-radius: 6px;
    padding: 8px 16px;
    border: none;
    color: white;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 2px 6px rgba(75, 173, 79, 0.4);
    margin:0 auto;
    display: block;
    margin-top:30px
  "
  onmouseover="this.style.backgroundColor='#3a8c3f'; this.style.boxShadow='0 4px 12px rgba(58, 140, 63, 0.6)';"
  onmouseout="this.style.backgroundColor='#4bad4f'; this.style.boxShadow='0 2px 6px rgba(75, 173, 79, 0.4)';"
  >Logout</button>
</form>
</div>


@endsection