@extends('layouts.app')
@section('content')
	<div class="container">
		<h3 class="mt-4">View Team Members</h3>
		<div class="row">
			@forelse($team as $member)
				<div class="col-4 mt-3">
					<div class="card">
						<img class="card-imp-top" style="height: 200px;" src="{{asset('/uploads/phpCCD3.tmp.jpg')}}" alt="Team member">
						<div class="card-body">
							<p class="card-text font-weight-bold">{{$member->name}}</p>
							<p>
								{{$member->designation}}
							</p>
							<a href="#" class="btn btn-primary" data-toggle="modal" role="button" data-target="#teamModal{{$member->id}}">Edit / Delete</a>
						</div>
					</div>
				</div>
				@empty{{''}}
			@endforelse
		</div>
	</div>
@endsection

@section('modal')
	@forelse($team as $member)
		<div class="modal fade" id="teamModal{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="teamModal">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<form action="/team/update" method="post" class="w-100" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="teamModalLabel">Edit Team Member</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<input type="text" name="member_name" class="form-control" value="{{$member->name}}">
							<input type="text" name="member_designation" class="form-control mt-2" value="{{$member->designation}}">
							<label class="mt-4">Image</label>
							<input type="file" name="member_img" class="show-preview" accept="image/*" value="">
							<img src="/crm/uploads/{{$member->image}}" class="w-50">
							<input type="hidden" value="{{$member->image}}" name="imgname">
							<input type="hidden" name="id" value="{{$member->id}}">
						</div>
						<div class="modal-footer">
							{{csrf_field()}}
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="{{url('/team/delete/'.$member->id)}}" class="btn btn-danger">Delete</a>
						</div>
					</div>
				</form>
			</div>
		</div>
		@empty{{''}}
	@endforelse
@endsection