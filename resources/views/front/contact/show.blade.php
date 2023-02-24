@extends('layouts.front-layout')
@section('title', 'Contact Information')
@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Contact Information</h4>
            </div>
            <div class="card-body">

                <p>Service: <b>{{ $contact->service->title }}</b></p>

                <div class="form-group">
                    <label class="form-label" for="basic-addon-name">Name</label>
                    <input type="text" name="name" id="basic-addon-name" class="form-control" disabled
                        placeholder="Name" value="{{ $contact->name }}" aria-label="Name"
                        aria-describedby="basic-addon-name" required />
                </div>

                <div class="form-group">
                    <label class="form-label" for="basic-addon-name">Email</label>
                    <input type="text" name="email" id="basic-addon-name" class="form-control" disabled
                        placeholder="Email" value="{{ $contact->email }}" aria-label="Email"
                        aria-describedby="basic-addon-name" required />
                </div>


                <div class="form-group">
                    <label class="form-label" for="basic-addon-name">Phone</label>
                    <input type="text" name="phone" id="basic-addon-name" class="form-control" disabled
                        placeholder="Phone" value="{{ $contact->phone }}" aria-label="Phone"
                        aria-describedby="basic-addon-name" required />
                </div>

                <div class="form-group">
                    <label class="form-label" for="basic-addon-name">Phone</label>
                    <textarea name="text" class="form-control" id="" disabled cols="30" rows="3">{{ $contact->text }}</textarea>
                </div>


            </div>
        </div>
    </div>
@section('js')
    @parent
@endsection

@endsection
