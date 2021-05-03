@extends('admin/layout.layout')

@section('page_title','Page Listing')

@section('container')

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h4>{{$page}}</h4>
			<h2><a href="{{asset('/admin/page/add')}}">Add Pages</a></h2>
		 </div>
	  </div>
	  <div class="clearfix"></div>
	  <div class="row">
		 <div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
			   <div class="x_content">
				  <div class="row">
					 <div class="col-sm-12">
						<div class="card-box table-responsive">
						   <table id="datatable" class="table table-striped table-bordered" style="width:100%">
						   	@if($message=Session::get('success'))
<div class="alert alert-success">
  {{$message}}
</div>
@endif
							  <thead>
								 <tr>
									<th>S.No</th>
									<th>Name</th>
									<th>Slug</th>
									<th>Description</th>
									
									<th>Added_on</th>
									<th>Action</th>
								 </tr>
							  </thead>
							 @foreach($data as $i=>$row)
                    <tbody>
                      <tr>
                        <td>{{++$i}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->slug}}</td>
                        <td>{{$row->description}}</td>
                           <td>{{$row->added_on}}</td>
                              <td>
<a href="{{url('/admin/page/edit/'.$row->id)}}" class="btn btn-info">EDIT</a>
<a href="{{url('/admin/page/delete/'.$row->id)}}" class="btn btn-danger">DELETE</a>
                       </td>
							</tr>	
							  </tbody>
							  @endforeach
						   </table>
						</div>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
	  </div>
   </div>
@endsection