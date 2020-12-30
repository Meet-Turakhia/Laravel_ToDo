@extends('layout')

@section('content')

<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <form action="/create/todo" method="POST">
            {{ csrf_field() }}
            <input type="text" class="form-control input-lg" name="todo" placeholder="Create new todos">
        </form>
    </div>
</div>

@foreach($todos as $todo)
{{ $todo->todos }} <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger btn-xs"> x </a>
<a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-warning btn-xs"> update </a>

@if(!$todo->completed)
<a href="{{ route('todo.completed', ['id' => $todo->id]) }}" class="btn btn-xs  btn-success" > Mark as completed </a>

@else
<span class="text-success">Completed!!</span>

@endif

<hr>
@endforeach


@stop()