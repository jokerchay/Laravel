@extends('layouts.app')
@section('title','Update | page')
@section('content')

{{-- container --}}

<div class="container">
	{{-- row --}}

		<div class="row justify-content-center">
			{{-- col-md- --}}
			<div class="col-md-6">
				{{-- card --}}

				<div class="card">
					{{-- card-body --}}
					<div class="card-body">
						{{-- form --}}

						<form method="POST" action="{{route('category_update',$category->id)}}">
							@csrf
							{{-- form-group --}}

						
						{{-- form-group --}}

						<div class="form-group">
							{{-- category --}}
							<label>Category</label>
							<input type="text" name="category" class="form-control" value="{{$category->name}}">
							@error('category')
							<small style="color:red;">{{$message}}</small>
							@enderror
							
							{{-- end category --}}
							
						{{-- button --}}
						</div>
						<button class="btn btn-info" style="margin-top:30px">Send</button>
						{{-- form-group --}}
						</form>
						{{-- form --}}
					</div>
					{{-- card-body --}}
				</div>

				{{-- card --}}
			</div>


			{{-- col-md --}}
		</div>
	{{-- end row --}}

</div>




{{-- end container --}}


@endsection