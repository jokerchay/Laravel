@extends('layouts.app')
@section('title','Profile | Page')
@section('content')

{{-- container --}}
<div class="container">
	{{-- starting row --}}
		<a href="{{route('post_index')}}" class="btn btn-success">Post Create</a>
		<a href="{{route('post_create')}}" class="btn btn-primary">Posts</a>
	<div class="row justify-content-center">
		{{-- staritn column --}}
			@foreach($posts as $post)
		<div class="col-md-7">
			{{-- starting card --}}
		
			<div class="card">
				{{-- starting card-body --}}

				<div class="card-body">
					
					<h3>{{$post->title}}</h3>
					<hr>
					<small class="float-right">{{$post->category->name}}</small>
					<br>
					<br>
					@foreach($post->image as $image)
					<div class="row">
						<div class="col-md-6">
							<div class="text-center"  role="group">
							    <a id="btnGroupDrop1"   data-toggle="dropdown" style="font-size: 30px;">
							     ...
							    </a>
							    <div class="dropdown-menu" >
							      <a class="dropdown-item" href="{{route('delete',$image->id)}}">Delete</a>
							      <a class="dropdown-item" href="#">edit</a>
							    </div>
						  </div>
							<img src="{{asset('/storage/upload/'.$image->name)}}" class=" img-thumbnail" style="max-width: 320px;max-height: 160px">
								
								
								{{-- <a href="#"><small>delete</small></a> --}}
							
						</div>
					</div>
						
						@endforeach
					<p>{{str_limit($post->description,$limit=150,$end=' ..........')}}</p>
					
					<small>{{$post->user->name}}</small>
					<div class="float-right">
						<a href="{{route('post_delete',$post->id)}}" class="ml-2 btn btn-danger" onclick="return confirm('Are you sure (delete)')">Delete</a>
						<a href="{{route('post_edit',$post->id)}}"class="ml-2 btn btn-success">Edit</a>
						<a href="{{route('post_view',$post->id)}}"class="ml-2 btn btn-info">Read>></a>
						<br>
						<br>
						<small class="float-right">{{\Carbon\Carbon::parse($post->created_at)->format('d-M-y')}}</small>

					</div>
					
				</div>
				{{-- ending cardbody --}}
			</div>
			{{-- ending card --}}
			
			
		</div>
		{{-- ending column --}}
		@endforeach
		
	</div>
	{{-- ending row --}}
</div>
{{-- endcontainer --}}

@endsection