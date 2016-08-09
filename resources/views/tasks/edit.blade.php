@extends('layouts.master')

@section('title', 'Update task')

@section('content')

{{-- Use method post, action to tasks --}}
<form class="form-horizontal" method="POST" action="{{ url('/tasks/'.$task->id) }}">
<fieldset>

{{-- Spoofing method --}}
{{ method_field('PUT') }}

{{ csrf_field() }}

<!-- Form Name -->
<legend>Task Details</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="" value="{{ $task->name }}">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="status">Status</label>
  <div class="col-md-4">
    <select id="status" name="status" class="form-control">
      <option value="New" {{ ($task->status == 'New') ? 'selected' : '' }}>New</option>
      <option value="In Progress" {{ ($task->status == 'In Progress') ? 'selected' : '' }}>In Progress</option>
      <option value="Done" {{ ($task->status == 'Done') ? 'selected' : '' }}>Done</option>
    </select>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-8">
    <button id="submit" name="submit" class="btn btn-success">Update</button>
    <a href="{{ url('/tasks') }}" class="btn btn-danger">Cancel</a>
  </div>
</div>

</fieldset>
</form>

@endsection