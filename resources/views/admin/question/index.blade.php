@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between">
                            <h3 class="card-title">Question</h3>
                            @if(Auth::user()->hasPermission('questions-create'))
                                <a href="{{ url('/admin/question/create') }}" class="btn btn-success btn-sm" title="Add New Question">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            @endif

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th><th>Question</th><th>Nbre Point</th><th>Cours Id</th><th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($question as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->question }}</td><td>{{ $item->nbre_point }}</td><td>{{ $item->cours_id }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a href="{{ url('/admin/question/' . $item->id) }}" title="Detail Question"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Détail</button></a>
                                                        @if(Auth::user()->hasPermission('questions-update'))
                                                            <a href="{{ url('/admin/question/' . $item->id . '/edit') }}" title="Modifier Question"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
                                                        @endif
                                                        @if(Auth::user()->hasPermission('questions-delete'))
                                                            <button type="submit" class="btn btn-danger btn-sm deleted_element" title="Supprimer Question" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
                                                        @endif
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
