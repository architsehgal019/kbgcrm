@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="mt-4">View Destination</h3>	
				<table class="table mt-4">
					<thead class="thead-dark">
						<tr>
							<th>#</th>
							<th>Destination</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@forelse($destination as $alldes)
							<tr>
								<td>
									{{$alldes->id}}
								</td>
								<td>	
									{{$alldes->name}}
								</td>
								<td>
									<i class="fa fa-edit" data-toggle="modal" role="button" data-target="#exampleModal{{$alldes->id}}"></i>
									<i class="fa fa-trash ml-3"></i>
								</td>
							</tr>
								@empty{{''}}
						@endforelse
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
@section('modal')
	@forelse($destination as $alldes)
		<div class="modal fade" id="exampleModal{{$alldes->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<form action="/destination/update" method="post" class="w-100" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Edit Destination</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<input type="text" name="destination_name" class="form-control" value="{{$alldes->name}}">
							<label class="mt-4">Banner Image</label>
							<input type="file" name="destination_img" class="show-preview" accept="image/*" value="">
							<img src="/crm/uploads/{{$alldes->bannerimg}}" class="w-50">
							<input type="hidden" value="{{$alldes->bannerimg}}" name="imgname">
							<input type="hidden" name="id" value="{{$alldes->id}}">
						</div>
						<div class="modal-footer">
							{{csrf_field()}}
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="{{url('/destination/delete/'.$alldes->id)}}" class="btn btn-danger">Delete</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		@empty{{''}}
	@endforelse
@endsection