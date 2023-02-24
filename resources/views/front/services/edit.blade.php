@extends('layouts.front-layout')
@section('title', 'Update Service')
@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Service</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('services.update', $service->id) }}" class="needs-validation"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Title</label>
                        <input type="text" name="title" id="basic-addon-name" class="form-control" placeholder="Title"
                            aria-label="Name" aria-describedby="basic-addon-name" value="{{ $service->title }}"
                            required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
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
@endsection

@endsection
