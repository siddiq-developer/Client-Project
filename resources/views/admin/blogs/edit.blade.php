<!-- @extends('partials.default')
@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Blogs</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('blogs.update', ['id' => $blog->id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}" required>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="8" required>{{ $blog->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $blog->author }}" required>
            </div>

            <div class="form-group">
                <label for="author">Published Date</label>
                <input type="date" name="date" max="{{ date('Y-m-d') }}" id="date" class="form-control" value="{{ $blog->published_at }}" required>
            </div>

            <div class="form-group">
                <label for="author">Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                @if ($blog->image)
                    <img src="{{\Storage::disk('public')->url('app/public/blogs/'.$blog->image)}}" alt="Blog Image" style="max-width: 200px; margin-top: 10px;">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        </div>

    </div>
</div>
@endsection -->
<!-- ===================================================== -->

@extends('partials.default')

@section('content')
<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Blogs</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('blogs.update', ['id' => $blog->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}" required>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="8" required>{{ $blog->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $blog->author }}" required>
            </div>

            <div class="form-group">
                <label for="date">Published Date</label>
                <input type="date" name="date" max="{{ date('Y-m-d') }}" id="date" class="form-control" value="{{ $blog->published_at }}" required>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                @if ($blog->image)
                    <img src="{{ \Storage::disk('public')->url('app/public/blogs/'.$blog->image) }}" alt="Blog Image" style="max-width: 200px; margin-top: 10px;">
                @endif
            </div>

            <!-- Dropdown for selecting blog type -->
            <div class="form-group">
                <label for="type">Blog Type</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="blog" {{ $blog->type == 'blog' ? 'selected' : '' }}>Blog</option>
                    <option value="bylaws" {{ $blog->type == 'bylaws' ? 'selected' : '' }}>Bylaws</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
    </div>
</div>
@endsection
