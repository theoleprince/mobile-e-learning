@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between">
                            <h3 class="card-title">Phase</h3>
                            <a href="{{ url('/admin/phase/create') }}" class="btn btn-success btn-sm" title="Add New Phase">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="row">
                                    @foreach($phase as $item)
                                        <div class="card col-md-3 mx-3 my-3 mt-1 mb-1" style="width: 18rem;">
                                            <video controls width="250" height="150" class="mt-2 card-img-top" alt="{{ $item->titre }}">
                                                <source src="{{ url('storage/' . $item->video) }}"/>
                                            </video>
                                            <div class="card-body">
                                                <h5 class="card-title">(<b> <u>N°: {{ $item->numero }}) {{ $item->titre }}</u></b></h5>
                                                <p class="card-text">{{ $item->_cours }} <hr>
                                                    <div class="row">
                                                        <a href="{{ url('/admin/phase/' . $item->id . '/edit') }}" title="Modifier Phase"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true">Modifier</i></button></a>
                                                        <button type="submit" class="mx-4 btn btn-danger btn-sm deleted_element" title="Supprimer Phase" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true">Supprimer</i></button>
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
