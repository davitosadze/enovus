@extends('layouts.front-layout')
@section('title', 'Update Project')
@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Project</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('projects.update', $project->id) }}" class="needs-validation"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Title</label>
                        <input type="text" name="title" id="basic-addon-name" class="form-control" placeholder="Title"
                            aria-label="Name" aria-describedby="basic-addon-name" value="{{ $project->title }}"
                            required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Description</label>

                        <textarea name="post_description">{{ $project->description }}</textarea>

                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter company code</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Main Image</label>
                        <input type="file" name="image" id="basic-addon-name" class="form-control" aria-label="Image"
                            aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter company code</div>
                    </div>

                    Main Image:
                    <center> <img style="width: 200px;" src="{{ $project->main_image }}" alt="">
                    </center>

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Images</label>
                        <input type="file" name="images[]" multiple id="basic-addon-name" class="form-control"
                            aria-label="Image" aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter company code</div>
                    </div>

                    Media:
                    <div style="float:left;width: 100%">
                        @foreach ($project->media as $image)
                            <center><img style="margin:5px; float:left; width: 200px;" src="{{ $image->image_url }}"
                                    alt="">
                            </center>
                        @endforeach
                    </div>




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
