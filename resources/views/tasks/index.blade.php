@extends('layouts.master')

@section('title', 'Task List')

@section('content')
	<a href="{{ url('/tasks/create') }}" class="btn btn-success btn-sm">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	</a>
	<div class="pull-right">
		{{ $tasks->links() }}
	</div>
	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Status</th>
				<th>Description</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			{{-- comment here --}}
			@forelse($tasks as $task)
			<tr>
				<td>{{ $task->name }}</td>
				<td>{{ $task->status }}</td>
				<td>{{ $task->description }}</td>
				<td class="col-md-3 col-lg-2">
					<a href="{{ url('/tasks/'.$task->id) }}" class="btn btn-primary btn-sm">
						<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					</a>

					<a href="{{ url('/tasks/'.$task->id.'/edit') }}" class="btn btn-warning btn-sm">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					</a>

					<a href="{{ url('/tasks/'.$task->id) }}" class="btn btn-danger btn-sm" 
					data-method="delete" 
					data-token="{{csrf_token()}}" 
					data-confirm="Are you sure?">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					</a>

				</td>
			</tr>
			@empty
			<tr>
				<td colspan="2">No tasks available</td>
			</tr>
			@endforelse
		</tbody>
	</table>
	<div class="pull-right">
		{{ $tasks->links() }}
	</div>
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ url('/js/app.js') }}"></script>
@endsection



















