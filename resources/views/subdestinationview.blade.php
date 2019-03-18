@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="mt-4">View Subdestination</h3>
				<table class="table mt-4">
					<thead class="thead-dark">
						<tr>
							<th>#</th>
							<th>Destination</th>
							<th>Subdestination Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@forelse($subdestination as $sub)
							<tr>
								<td>
									{{$sub->id}}
								</td>
								<td>	
									@php
										$destination = DB::table('destinations')->where('id', $sub->destination_id)->get();
									@endphp
									@foreach($destination as $des)
										{{$des->name}}
									@endforeach

								</td>
								<td>
									{{$sub->subdestination_name}}
								</td>
								<td>
									<i class="fa fa-edit" data-toggle="modal" role="button" data-target="#exampleModal{{$sub->id}}"></i>
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
	@forelse($subdestination as $sub)
		<div class="modal fade" id="exampleModal{{$sub->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModal">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<form action="/subdestination/update" method="post" class="w-100" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Edit Subdestination</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<label class="mt-4">Destination</label>
								<select class="form-control" name = "destination" id="destination">
										<option value="0">Choose</option>
										@forelse($all_destination as $dest)
											<option value="{{$dest->id}}" {{($dest->id == $sub->destination_id)?'selected':''}}>{{$dest->name}}</option>
											@empty{{''}}
										@endforelse
								</select>
							<input type="text" name="subdestination_name" class="form-control mt-3" value="{{$sub->subdestination_name}}">
							<div class="form-check mt-4 mb-4">
								<input type="checkbox" name="popular_destination" class="form-check-input" id="popular_destination" value="1" {{$sub->popular == '1'?'checked':''}}>
								<label class="form-check-label ml-4" for="popular_destination">Add to Popular Destination</label>
							</div>

							<label class="mt-4">Sub-Destination Image</label>
							<input type="file" name="subdestination_img" class="show-preview" accept="image/*" value="">

							<img src="/crm/uploads/{{$sub->subdestinationimg}}" class="w-50">
							<input type="hidden" value="{{$sub->subdestinationimg}}" name="imgname">

							<input type="hidden" name="id" value="{{$sub->id}}">
						</div>
						<div class="modal-footer">
							{{csrf_field()}}
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="{{url('/subdestination/delete/'.$sub->id)}}" class="btn btn-danger">Delete</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		@empty{{''}}
	@endforelse
@endsection