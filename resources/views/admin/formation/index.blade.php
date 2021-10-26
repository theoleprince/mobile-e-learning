@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between">
                            <h3 class="card-title">Formation</h3> 
                            @if(Auth::user()->hasPermission('formations-create'))
                                <a href="{{ url('/admin/formation/create') }}" class="btn btn-success btn-sm" title="Add New Formation">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            @endif

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th><th>Nom</th><th>Description</th><th>Activated</th><th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($formation as $item)
                                        @if (Auth::user()->hasRole('formateur'))
                                        @if ($item->activated)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nom }}</td><td>{{ $item->description }}</td><td>{{ $item->activated }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a href="{{ url('/admin/formation/' . $item->id) }}" title="Detail Formation"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Détail</button></a>
                                                            @if(Auth::user()->hasPermission('formations-update'))
                                                                <a href="{{ url('/admin/formation/' . $item->id . '/edit') }}" title="Modifier Formation"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
                                                            @endif
                                                            @if(Auth::user()->hasPermission('formations-delete'))
                                                            <form method="POST" action="{{ url('admin/formation/$formation->id') }}" accept-charset="UTF-8" style="display:inline">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                                <button type="submit" class="btn btn-danger btn-sm deleted_element" title="Delete Formation" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                            </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                        @else
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nom }}</td><td>{{ $item->description }}</td><td>{{ $item->activated }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a href="{{ url('/admin/formation/' . $item->id) }}" title="Detail Formation"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Détail</button></a>
                                                            @if(Auth::user()->hasPermission('formations-update'))
                                                                <a href="{{ url('/admin/formation/' . $item->id . '/edit') }}" title="Modifier Formation"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
                                                            @endif
                                                            @if(Auth::user()->hasPermission('formations-delete'))
                                                                <button type="submit" class="btn btn-danger btn-sm deleted_element" title="Supprimer Formation" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>  
                                        @endif
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
