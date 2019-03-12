@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="text-uppercase">Add Team Members</h3>
				<form method="post" action="/team/add" enctype="multipart/form-data">
					<label class="mt-4">Name</label>
					<input type="text" class="form-control" name="name" placeholder="Add Name" aria-label="Team Member name">

					<label class="mt-4">Designation</label>
					<input type="text" class="form-control" name="designation" placeholder="Add Designation" aria-label="Designation">

					<label class="mt-4">Image</label>
					<input type="file" name="team_img" class="show-preview" accept="image/*" data-target="#team_img" value="">
				
					{{csrf_field()}}
					<button class="btn btn-outline-secondary mt-4" type="submit">Add Team Member</button>
				</form>
			</div>
			<div class="col-12">
				<a href="/team/view" class="float-right btn btn-outline-primary">View Team</a>
			</div>
		</div>
	</div>
@endsection