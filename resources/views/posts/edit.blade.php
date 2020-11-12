@extends('layouts.app')
@section('title','Post_Update | Page')
@section('content')

{{-- container --}}
<div class="container">
	{{-- row --}}
	<div class="row justify-content-center">
		{{-- col-md-6 --}}
		<div class="col-md-6">
			{{-- card --}}
			<div class="card">
				{{-- card-body --}}
				<div class="card-body">
					{{-- form --}}
					<form method="Post" action="{{route('post_update',$posts->id)}}" enctype="multipart/form-data" >
						@csrf
						{{-- form-group --}}
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" placeholder="title" class="form-control" value="{{$posts->title}}">
						</div>
						@error('title')
							<small style="color: red;" >{{$message}}</small>
						@enderror
						{{-- end form-group --}}
						{{-- form-group --}}
						<div class="form-group">
							<label>Category</label>
							<select class="form-control" name="category">
								<option disabled selected>------</option>
								@foreach($categories as $category)
								<option value="{{$category->id}}"
									{{$category->id==$posts->category->id?'selected':null}}>

									{{$category->name}}
								</option>
								@endforeach
							</select>
							@error('category')
							<small style="color: red;" >{{$message}}</small>
						@enderror
						</div>
						{{-- end form-group --}}
						{{-- form-group --}}
						<div class="form-group">
							<label>Description</label>
							<textarea  name="description" placeholder="description" class="form-control" rows='10'>{{$posts->description}}</textarea>
							@error('description')
							<small style="color: red;" >{{$message}}</small>
						@enderror 
						</div>
						{{-- end form-group --}}
						
						{{-- form-group --}}
						<div class="form-group">
							<label>Image</label>
							<input type="file" name="image[]" class="form-control" multiple>
							
						</div>
						@error('image')
							<small style="color: red;" >{{$message}}</small>
						@enderror
						{{-- end form-group --}}

						<input type="submit" value="Update" class="btn btn-info">
						<a href="{{route('post_create')}}" class="btn btn-danger">Cencle</a>

					</form>
					{{-- end form --}}

				</div>
				{{-- card-body --}}

			</div>
			{{-- card --}}
		</div>
		{{-- col-md-6 --}}

	</div>
	{{-- end row --}}
</div>
{{-- end container --}}

@endsection