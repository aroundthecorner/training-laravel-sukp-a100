@extends('layouts.master')

@section('title', 'Create new task')

@section('content')

{{-- Use method post, action to posts --}}
<form class="form-horizontal" method="POST" action="{{ url('/posts') }}">
<fieldset>

{{-- Required to prevent CSRF --}}
{{ csrf_field() }}

<!-- Form Name -->
<legend>New Post</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-8">
    <button id="submit" name="submit" class="btn btn-success">Create</button>
    <a href="{{ url('/posts') }}" class="btn btn-danger">Cancel</a>
  </div>
</div>

</fieldset>
</form>

@endsection