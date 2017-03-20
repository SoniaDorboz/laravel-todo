@extends('layouts.main')
@section('title',$todo->title)
@section('content')
	<img src="{{ $todo->img }}" style="max-width: 100%">
	<i class="pull-right">{{ $todo->at }}</i>
	<h1>{{ $todo->title }}</h1>
	<p>{{ $todo->description }}</p>
	@if(!empty($todo->tags()))
		@foreach($todo->tags() as $tag)
		<span class="label label-info">{{ $tag }}</span>
		@endforeach
	@endif
@stop