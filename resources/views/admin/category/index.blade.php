@extends('layouts.app')

@section('content')
<section class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between">
                        <h3 class="card-title">Category</h3>
                        <a href="{{ url('/admin/category/create') }}" class="btn btn-success btn-sm"
                            title="Add New category">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Description</th>
                                        <th>Type Categori</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->_nom }}</td>
                                        <td> <img height="50" src="{{ url('storage/' . $item->image) }}" alt=""> </td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                    href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a href="{{ url('/admin/category/' . $item->id) }}"
                                                        title="Detail category"><button class="btn btn-info btn-sm"><i
                                                                class="fa fa-eye" aria-hidden="true"></i>
                                                            Détail</button></a>
                                                    <a href="{{ url('/admin/category/' . $item->id . '/edit') }}"
                                                        title="Modifier category"><button
                                                            class="btn btn-primary btn-sm"><i
                                                                class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                            Modifier</button></a>
                                                    <form method="POST"
                                                        action="{{ url('admin/category/$categorie->id') }}"
                                                        accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm deleted_element"
                                                            title="Delete category"
                                                            onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                                class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection