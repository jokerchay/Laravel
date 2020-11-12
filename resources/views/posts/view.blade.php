@extends('layouts.app')
@section('title','View | Page')
@section('content')

{{-- container --}}
<div class="container">
	{{-- starting row --}}
	<a href="{{route('post_create')}}" class="btn btn-primary">Back</a>
	<div class="row justify-content-center">
		{{-- staritn column --}}
			
		<div class="col-md-7">
			{{-- starting card --}}
		
			<div class="card">
				{{-- starting card-body --}}

				<div class="card-body">
					
					<h3>{{$posts->title}}</h3>
					<hr>
					<small class="float-right">{{$posts->category->name}}</small>
					<br>
					<p>{{$posts->description}}</p>
					<small>{{$posts->user->name}}</small>
					<div class="float-right">
						<a href="{{route('post_delete',$posts->id)}}" class="ml-2 btn btn-danger" onclick="return confirm('Are you sure (delete)')">Delete</a>
						<a href="{{route('post_edit',$posts->id)}}"class="ml-2 btn btn-success">Edit</a>
						
						<br><br>
						<small class="float-right">{{\Carbon\Carbon::parse($posts->created_at)->format('d-M-y')}}</small>
					</div>
					
				</div>
				{{-- ending cardbody --}}
			</div>
			{{-- ending card --}}
			
			
		</div>
		{{-- ending column --}}
		
	</div>
	{{-- ending row --}}
</div>
{{-- endcontainer --}}

@endsection