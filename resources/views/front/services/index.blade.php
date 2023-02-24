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
                                    <th>Title</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ route('services.edit', $item->id) }}">Edit</a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('services.destroy', $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="btn btn-danger" name=""
                                                    id="">
                                            </form>
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
