@extends('layouts.app')
@section('title','Index | Page')
@section('content')

{{-- container --}}
<div class="container">
	{{-- row --}}
	<div class="row justify-content-center">
		{{-- col-md-6 --}}
		<div class="col-md-6">
			@if(session('success'))
						<div class="alert alert-success">{{session('success')}}</div>
						@endif
			{{-- card --}}
			<div class="card">
				{{-- card-body --}}
				<div class="card-body">
					{{-- form --}}
					<form method="Post" action="{{route('post_store')}}" enctype="multipart/form-data">
						@csrf
						{{-- form-group --}}

						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" placeholder="title" class="form-control">
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
									{{$category==old('category')?'selected':null}}>

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
							<textarea  name="description" placeholder="description" class="form-control" rows='10'></textarea>
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

						<input type="submit" value="Post" class="btn btn-info">
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