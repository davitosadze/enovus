@extends('layouts.front-layout')
@section('title', 'Update Blog Post')
@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Blog Post</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('news.update', $news->id) }}" class="needs-validation"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Title</label>
                        <input type="text" name="title" id="basic-addon-name" class="form-control" placeholder="Title"
                            aria-label="Name" aria-describedby="basic-addon-name" value="{{ $news->title }}" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Description</label>

                        <textarea name="post_description">{{ $news->description }}</textarea>

                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter company code</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Post Image</label>
                        <input type="file" name="image" id="basic-addon-name" class="form-control" aria-label="Image"
                            aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter company code</div>
                    </div>

                    <center><img style="width: 350px;" src="{{ $news->image }}" alt=""></center>


                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@section('js')
    @parent
    <script>
        CKEDITOR.replace('post_description');
    </script>
@endsection

@endsection
