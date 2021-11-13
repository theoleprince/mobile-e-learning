@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Category {{ $categorie->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/category') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/category/' . $categorie->id . '/edit') }}" title="Edit category"><button
                            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            Edit</button></a>

                    <form method="POST" action="{{ url('admin/category' . '/' . $categorie->id) }}"
                        accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete category"
                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                aria-hidden="true"></i> Delete</button>
                    </form>
                    <br />
                    <br />

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $categorie->id }}</td>
                                </tr>
                                <tr>
                                    <th> Nom </th>
                                    <td> {{ $categorie->nom }} </td>
                                </tr>
                                <tr>
                                    <th> Description </th>
                                    <td> {{ $categorie->description }} </td>
                                </tr>
                                <tr>
                                    <th> Type categori </th>
                                    <td> {{ $categorie->_nom }} </td>
                                </tr>
                                <tr>
                                    <th> Image </th>
                                    <td> <img height="200" src="{{ url('storage/' . $categorie->image) }}" alt=""> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection