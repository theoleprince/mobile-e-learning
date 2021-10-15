@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Reponsec</h3>
                                    <a style="float:right;" href="{{ url('/admin/reponseC/create') }}" class="btn btn-success btn-sm" title="Add New ReponseC">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Ajouter
                                    </a>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                    <tr>
                                        <th>#</th><th>Reponse</th><th>Commentaire Id</th><th>Ceated Id</th><th class="datatable-nosort">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($reponsec as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->reponse }}</td><td>{{ $item->commentaire_id }}</td><td>{{ $item-> created_id }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a href="{{ url('/admin/reponseC/' . $item->id) }}" title="Détail ReponseC"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Détail</button></a>
                                                    <a href="{{ url('/admin/reponseC/' . $item->id . '/edit') }}" title="Modifier ReponseC"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
                                                    <button type="submit" class="btn btn-danger btn-sm deleted_element" title="Supprimer ReponseC" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
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
@endsection
