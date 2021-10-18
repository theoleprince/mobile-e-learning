@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between">
                            <h3 class="card-title">Reponseq</h3>
                            <a href="{{ url('/admin/reponse-q/create') }}" class="btn btn-success btn-sm" title="Add New ReponseQ">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th><th>Reponse</th><th>Note</th><th>Statut</th><th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reponseq as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->Reponse }}</td><td>{{ $item->note }}</td><td>{{ $item->statut }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <a href="{{ url('/admin/reponse-q/' . $item->id) }}" title="Detail ReponseQ"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Détail</button></a>
                                                        <a href="{{ url('/admin/reponse-q/' . $item->id . '/edit') }}" title="Modifier ReponseQ"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
                                                        <button type="submit" class="btn btn-danger btn-sm deleted_element" title="Supprimer ReponseQ" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
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
