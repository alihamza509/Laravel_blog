@extends('admin/layout.layout')

@section('page_title','Post Listing')

@section('container')

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h4>{{$page}}</h4>
			<h2><a href="{{asset('/admin/post/add')}}">Add Post</a></h2>
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
									<th>Title</th>
									<th>Short Desc</th>
									<th>IMAGE</th>
									<th>Post_date</th>
									<th>Action</th>
								 </tr>
							  </thead>
							 @foreach($data as $i=>$row)
                    <tbody>
                      <tr>
                        <td>{{++$i}}</td>
                        <td>{{$row->title}}</td>
                        <td>{{$row->short_desc}}</td>
                        <td><img src="{{asset('public/storage/post/'.$row->image)}}" width="50"></td>
                           <td>{{$row->post_date}}</td>
                              <td>
<a href="{{url('/admin/post/edit/'.$row->id)}}" class="btn btn-info">EDIT</a>
<a href="{{url('/admin/post/delete/'.$row->id)}}" class="btn btn-danger">DELETE</a>
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