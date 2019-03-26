@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="mt-4 mb-2">View Travel Packages</h3>
				<table class="table mt-4">
					<thead class="thead-dark">
						<tr>
							<th>#</th>
							<th>Destination</th>
							<th>Package Name</th>
							<th>Price</th>
							<th>Days and night</th>
							<th>Honeymoon Package</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@forelse($packages as $package)
							<tr>
								<td>
									{{$package->id}}
								</td>
								<td>	
									@php
										$destination = DB::table('destinations')->where('id', $package->destination_id)->get();
									@endphp
									@foreach($destination as $des)
										{{$des->name}}
									@endforeach
								</td>
								<td>
									{{$package->package_name}}
								</td>
								<td>
									Rs. {{$package->price}}
								</td>
								<td>
									{{$package->days}} days & {{$package->nights}} nights
								</td>
								<td>
									{{($package->honeymoon_package == 1)?'Yes':'No'}}
								</td>
								<td>
									<a href="{{url('/travelpackages/edit/'.$package->package_id)}}"><i class="fa fa-edit"></i></a>
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