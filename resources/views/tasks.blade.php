@extends('layouts.main')
@section('content')
<div>
    <ul>
        @foreach($tasks as $task)
         <li>
           <h2>{{ $task->title }}</h2>
           <p>{{ $task->content }}</p>
         </li>
        @endforeach
    </ul>
</div>
@endsection