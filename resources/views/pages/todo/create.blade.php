@extends('layouts.main')
@section('title','Create new event')
@section('content')
	<form class="form-horizontal" action="{{route('todo.store')}}" method="post">
	{{ csrf_field() }}
	  <fieldset>
	    <legend>Create new event</legend> 
	    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
	      <label for="inputTitle" class="col-lg-2 control-label">Title</label>
	      <div class="col-lg-10">
	        <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Event Title" value="{{ old('title') }}"> 
	        	@if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
            	@endif
	      </div>
	    </div>
	    <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
	      <label for="inputImg" class="col-lg-2 control-label">Picture</label>
	      <div class="col-lg-10">
	        <input type="url" class="form-control" name="img" id="inputImg" placeholder="Event Picture" value="{{old('img')}}"> 
	        	@if ($errors->has('img'))
                    <span class="help-block">
                        <strong>{{ $errors->first('img') }}</strong>
                    </span>
            	@endif
	      </div>
	    </div>
	    <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
	      <label for="textArea" class="col-lg-2 control-label">Description</label>
	      <div class="col-lg-10">
	        <textarea class="form-control" rows="5" name="description" id="textArea">{{old('description')}}</textarea> 
	        	@if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
            	@endif
	      </div>
	    </div> 
	    <div class="form-group {{ $errors->has('at') ? ' has-error' : '' }}">
	      <label for="inputDate" class="col-lg-2 control-label">Date</label>
	      <div class="col-lg-10">
	        <input type="date" class="form-control" name="at" id="inputDate" placeholder="Event Date" value="{{old('at')}}"> 
	        	@if ($errors->has('at'))
                    <span class="help-block">
                        <strong>{{ $errors->first('at') }}</strong>
                    </span>
            	@endif
	      </div>
	    </div> 
	    <div class="form-group {{ $errors->has('tags') ? ' has-error' : '' }}">
	      <label for="inputDate" class="col-lg-2 control-label">Tags</label>
	      <div class="col-lg-10">
	        <input type="text" name="tags" class="form-control" id="inputDate" placeholder="Event Tags" value="{{old('tags')}}"> 
	        	@if ($errors->has('tags'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tags') }}</strong>
                    </span>
            	@endif
	      </div>
	    </div> 
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	        <button type="reset" class="btn btn-default">Cancel</button>
	        <button type="submit" class="btn btn-primary">Save</button>
	      </div>
	    </div>
	  </fieldset>
	</form>
@stop