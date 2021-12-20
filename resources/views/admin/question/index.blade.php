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
                                <a href="{{ url('/admin/question/create') }}" class="btn btn-success btn-sm" title="Add New Formation">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                            @endif

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center pt-auto pb-auto">
                                            <th rowspan="2">#</th><th rowspan="2">Formation</th><th rowspan="2">Cours</th><th colspan="3">Utilisateur</th><th rowspan="2">Actions</th>
                                        </tr>
                                        <tr class="text-center">
                                            <th>Inscript</th><th>Evalué</th><th>Noté</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reponse as $item)
                                            <tr style="background-color: blue-sky">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->_formation }}</td>
                                                <td>{{ $item->_cours }}</td>
                                                <td>{{ $item->cours }}</td>
                                                <td>{{ $item->evalue }}</td>
                                                <td>{{ $item->corrected }}</td>
                                                <td>
                                                    <a href="{{ url('/admin/question/' . $item->_idcours) }}" title="Detail Questionnaire"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                    @if(Auth::user()->hasPermission('formations-update'))
                                                        <a href="{{ url('/admin/question/' . $item->_idcours . '/show') }}" title="Corriger Questionnaire"><button class="btn btn-primary btn-sm"><i class="fas fa-pen" aria-hidden="true"></i></button></a>
                                                    @endif
                                                    {{-- <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">

                                                        </div>
                                                    </div> --}}
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
    </section>
@endsection
