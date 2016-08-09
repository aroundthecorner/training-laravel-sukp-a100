@extends('layouts.master')

@section('title', 'Task Details')

@section('content')
	<h3>{{ $task->name }} <small>{{ $task->status }}</small></h3>
	<p>{{ $task->description }}</p>
	<a href="{{ url('/tasks/'.$task->id.'/edit') }}" class="btn btn-warning btn-sm">
		<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	</a>

	<a href="{{ url('/tasks/'.$task->id) }}" class="btn btn-danger btn-sm" 
	data-method="delete" 
	data-token="{{csrf_token()}}" 
	data-confirm="Are you sure?">
		<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
	</a>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ url('/js/app.js') }}"></script>
@endsection
