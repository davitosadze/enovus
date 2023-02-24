@extends('layouts.front-layout')
@section('title', 'News')
@section('content')

    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">News</h2>
                <a class="float-right btn btn-success" href="{{ route('news.create') }}">Create</a>
            </div>
        </div>
    </div>

    <section id="ajax-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">News Table</h4>
                    </div>
                    <div class="card-datatable">
                        <table id="newsTable" class="datatables-ajax table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('news.edit', $item->id) }}">Edit</a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('news.destroy', $item->id) }}">
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
        $("#newsTable").DataTable();
    </script>
@endsection

@endsection
