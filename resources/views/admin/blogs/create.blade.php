
@extends('partials.default')

@section('content')

<div class="container-fluid">
    <div class="form-head mb-4">
        <h2 class="text-black font-w600 mb-0">Blogs</h2>
    </div>

    <!-- Blog Listing -->
    <div class="row">
        @foreach ($blogs as $blog)
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h3>{{ $blog->title }}</h3>
                        <p>{{ Str::limit($blog->content, 200) }}</p>
                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Blog Submission Form -->
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control" rows="8" required></textarea>
                </div>

                <div class="form-group">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" max="{{ date('Y-m-d') }}" id="date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label for="type">Blog Type</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="blog">Blog</option>
                        <option value="bylaws">Bylaws</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
