@extends('layouts.main')
@section('content')
	<table class="table table-striped table-hover ">
	  <thead>
	    <tr>
	      <th>#</th>
	      <th>Title</th>
	      <th>Date</th>
	      <th>Tags</th>
	      <th></th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($data as $item)
	    <tr>
	      <td>{{$item->id}}</td> 
	      <td>{{$item->title}}</td> 
	      <td>{{$item->at}}</td> 
	      <td>{{$item->tags}}</td> 
	      <td>
	      	<a href="{{ route('todo.show',$item->id) }}" class="btn btn-xs btn-info">Show</a>
	      	<a href="{{ route('todo.edit',$item->id) }}" class="btn btn-xs btn-warning">Edit</a>
	      	<form action="{{route('todo.destroy',$item->id)}}" method="post" class="btn btn-xs btn-danger"> 
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<button type="submit" class="btn btn-xs btn-danger"	>Delete</button>
	      	</form>
	      </td> 
	    </tr> 
	    @endforeach
	  </tbody>
	</table> 
	<center>{{$data->links()}}</center>
@stop