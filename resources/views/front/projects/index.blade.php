@extends('layouts.front-layout')
@section('title', 'Projects')
@section('content')

    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Projects</h2>
                <a class="float-right btn btn-success" href="{{ route('projects.create') }}">Create</a>
            </div>
        </div>
    </div>

    <section id="ajax-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Projects Table</h4>
                    </div>
                    <div class="card-datatable">
                        <table id="projectsTable" class="datatables-ajax table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ route('projects.edit', $item->id) }}">Edit</a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('projects.destroy', $item->id) }}">
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
        $("#projectsTable").DataTable();
    </script>
@endsection

@endsection
