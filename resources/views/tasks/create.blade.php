@extends('layouts.master')

@section('title', 'Create new task')

@section('content')

{{-- Use method post, action to tasks --}}
<form class="form-horizontal" method="POST" action="{{ url('/tasks') }}">
<fieldset>

{{-- Required to prevent CSRF --}}
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<!-- Form Name -->
<legend>Task Details</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="description" name="description"></textarea>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-8">
    <button id="submit" name="submit" class="btn btn-success">Create</button>
    <a href="{{ url('/tasks') }}" class="btn btn-danger">Cancel</a>
  </div>
</div>

</fieldset>
</form>

@endsection