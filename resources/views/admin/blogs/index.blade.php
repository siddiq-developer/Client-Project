@extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Blogs</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3 btn-sm">Create Blog</a>

            <table class="table table-bordered table-hovered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Published Date</th>
                        <th>Action</th>                        
                    </tr>
                </thead>

                <tbody>
                    @foreach($blogs as $p)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td width="15%">
                                <img style="width: 100%;" src="{{\Storage::disk('public')->url('app/public/blogs/'.$p->image)}}">
                            </td>
                            <td>{{$p->title}}</td>
                            <td>{{$p->author}}</td>
                            <td>{{date('Y-m-d',strtotime($p->published_at))}}</td>
                            <td>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-xxs dropdown-toggle" data-bs-toggle="dropdown">Actions</button>
                                    <div class="dropdown-menu">
                                         <a class="btn mt-1 btn-block btn-xxs" href="{{route('blogs.edit',['id'=>$p->id])}}">Edit</a>
                                                <a class="btn mt-1 btn-block btn-xxs" href="{{route('blogs.delete',['id'=>$p->id])}}">Delete</a>
                                    </div>
                                </div>
                               
                            </td>
                        </tr>
                    @endforeach()
                </tbody>
            </table>
            {{$blogs->links()}}
        </div>

    </div>
</div>
@endsection