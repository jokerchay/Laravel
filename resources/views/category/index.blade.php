@extends('layouts.app')
@section('title','Category | Page')
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
					<form method="Post" action="{{route('category_store')}}" >
						@csrf
						{{-- form-group --}}
						<div class="form-group">
							<label>Category</label>
							<input type="text" name="category" placeholder="category" class="form-control">
						</div>
						{{-- end form-group --}}
						

						<input type="submit" value="Send" class="btn btn-success">
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
	<div class="row justify-content-center mt-5">
		{{-- col-md-6 --}}
		<div class="col-md-6">
			{{-- card --}}
			<div class="card">
				{{-- card-body --}}
				<div class="card-body">
					
					{{-- table --}}
					<table class="table table-over ">
						<thead>
							<tr>
								<td>No</td>
								<td>Name</td>
								<td>Created_at</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							@foreach($categories as $key=>$category)
							<tr>
								<td>{{++$key}}</td>
								<td>{{$category->name}}</td>
								<td>{{\Carbon\Carbon::parse($category->created_at)->format('d-M-Y')}}</td>
								<td><a href="#"class="btn btn-primary">edit</a>&nbsp;&nbsp;<a href="#" class="btn btn-danger" onclick="return confirm('Are you sure')">delete</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{-- table --}}
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