@extends('layouts.front-layout')
@section('title', 'Services')
@section('content')

    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Services</h2>
                <a class="float-right btn btn-success" href="{{ route('services.create') }}">Create</a>
            </div>
        </div>
    </div>

    <section id="ajax-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Services Table</h4>
                    </div>
                    <div class="card-datatable">
                        <table id="servicesTable" class="datatables-ajax table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Service</th>

                                    <th>Show</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contact as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->service->title }}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ route('contact.show', $item->id) }}">Show</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@section('js')
    @parent

    <script>
        $("#servicesTable").DataTable();
    </script>
@endsection

@endsection
