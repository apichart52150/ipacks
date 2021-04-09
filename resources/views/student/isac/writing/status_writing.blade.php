@extends('layouts.sac_w')

@section('title','Status')

@section('content')

<style>
	.page-item.active .page-link {
    background-color: #009688 !important;
}
</style>

@section('page-title')
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><i class="fas fa-home"></i> <a href="{{ url('/') }}">Home</a></li>
					<!-- <li class="breadcrumb-item"><a href="#">Topic </a></li> -->
					<li class="breadcrumb-item active">Status Writing</li>
				</ol>
			</div>
			<h4 class="page-title">Status Writing</h4>
		</div>
	</div>
</div>     
@stop

<div class="row">
	<div class="col-md-12">
		<div class="card card-body">
			<h3 class="mb-3">Status</h3>
			<table id="basic-datatable" class="table table-borderless table-hover dt-responsive nowrap w-100">
				<thead class="thead-light">
					<tr>
						<th>#</th>
						<th>SAC TEST</th>
						<th>SAC TYPE</th>
						<th>SUBMITTED</th>
						<th>TEACHER</th>
						<th>STATUS</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					@if(!empty($writing))
						@foreach($writing as $writings)
						<tr>
							<td>{{ $i++ }}</td>

							<td>iSAC Writing {{ $writings->code_test }}</td>

							<td>{{ $writings->test_type }}</td>

							<td>{{ $writings->comment }}</td>
							
							<td class="text-capitalize"> {{ $writings->th_name }} </td>

							<td>
								<!-- 
									// N = Sent
									// Y = Success
									// W | TH_S = Pending
									// ST_S = Work in progress 
								-->

								@if ($writings->status == 'N')
									<span class='badge badge-warning'>Sent</span>
								@elseif ($writings->status == 'W')
									<span class='badge badge-purple'>Pending</span>
								@elseif($writings->status == 'Y')
									<span class='badge badge-success'>Success</span>
								@elseif($writings->status == 'ST_S') {
									<span class='badge badge-secondary'>Work in progress</span>
								@endif
										
							</td>
						</tr>
						@endforeach
					@endif
				</tbody>
			</table>
			<!-- end table -->
		</div>
		<!-- end card card-body -->
	</div>
	<!-- ecn col-md-12 -->
</div>
<!-- end row -->
@endsection