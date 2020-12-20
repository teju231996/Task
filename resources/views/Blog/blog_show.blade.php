{{-- blog_show.blade.php --}}
@extends('Header.header')
@section('page_title','Blog List')

@section('content')

<div class="container-fluid">
  
           @isset($message_success)
              <div class="alert alert-success">
           {!! $message_success  !!}</div>
          
           @endisset

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">BLOG LIST</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">BLOG List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter"></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr role="row">
                       <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 108px;">Blog Img</th>
                   <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 108px;">Title</th>
                   <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 170px;">Category</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 170px;">User Name</th>
                   <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 170px;">Description </th>
                   <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 170px;">Edit</th>
                   <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 170px;">Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr><th rowspan="1" colspan="1">Blog img</th><th rowspan="1" colspan="1"> Title</th> <th rowspan="1" colspan="1">Category</th> <th rowspan="1" colspan="1">User Name</th><th rowspan="1" colspan="1">Description</th> <th rowspan="1" colspan="1">Edit</th><th rowspan="1" colspan="1">Delete</th> </tr>
                  </tfoot>
                  <tbody>
                   
                     @foreach($blog as $blogs)
                     <tr role="row" class="odd">
                      <td>
                    
                              @if(file_exists('uploads/' . $blogs->img))
                   <img src="{{ asset('uploads/'.$blogs->img)}}" alt="Hobby Thumb" height ="100" width="100">
                                 
                                        
                                    @else
                                     <img src="{{ asset('/img/thumb_portrait.jpg')}}" alt="Hobby Thumb">
                                 
                                          </a>

                                    @endif


                      </td>
                      <td>{{$blogs->title}}</td>
                      <td>{{$blogs->category}}</td>
                      {{--  <td>{{$blogs->status}}</td> --}}
                         <td>  {{$blogs->user->name}} </a>
                        <td>{{$blogs->description}}</td>
                         
                      <td> <a class="btn btn-sm btn-success ml-2" href="{{route('Blog.edit',$blogs->b_id) }} "><i class="fas fa-edit"></i> Edit</a></td>
                      <td>
                   <form style="display: inline;" action="{{ route('Blog.destroy',$blogs->b_id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-outline-danger btn-sm ml-2" type="submit" value="Delete">
                                    </form>
                                </td>
                               
                   
                    </tr>
                    @endforeach
                 </tbody>

                </table>
<div class ="mt-3">
  {{$blog->links()}}
</div>
              </div></div></div>
              </div>
            </div>
          </div>

        </div>
@endsection
