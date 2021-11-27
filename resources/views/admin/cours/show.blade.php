@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card text-center">
                            <div class="card-header row">
                                <div class="col-7">
                                    <b>{{ $cour->nom }}</b>
                                </div>
                                <div class="col-5">
                                    <a href="{{ url('/admin/cours') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                                    <a href="{{ url('/admin/cours/' . $cour->id . '/edit') }}" title="Edit Cour"><button class="btn btn-primary btn-sm"><i class="fas fa-pen" aria-hidden="true"></i> Modifier</button></a>

                                    <form method="POST" action="{{ url('admin/cours' . '/' . $cour->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Cour" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash" aria-hidden="true"></i> Supprimer</button>
                                    </form>
                                    <a href="{{url('admin/phase/create/' . $cour->id)}}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Ajout Vidéo</a>
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="col-3">
                                    <b>Formation</b><br>
                                    <p class="card-text">{{ $cour->_nom }}</p>
                                </div>
                                <div class="col-2">
                                    <b>Tepms</b><br>
                                    <p class="card-text">{{ $cour->temps }}</p>
                                </div>
                                <div class="col-6">
                                    <b>Personne Ayant Posté</b>
                                    <p class="card-text"> {{ $cour->_name.' '.$cour->_prenom }} (<a href="mailto:{{$cour->_email}}"><strong>{{$cour->_email}}</strong></a>)</p>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <div class="card-header">Cour {{ $cour->id }}</div>
                                <div class="row">
                                    @forelse ($phase as $items)
                                        @php
                                            $active = $items->activated;
                                        @endphp
                                        @if ($active == 1)
                                            <div class="col-md-3">
                                                <div class="card col-12 mx-3 my-3 mt-1 mb-1 bg-success">
                                                    <video controls width="250" height="150" class="mt-2 card-img-top" alt="Titre">
                                                        <source src="{{ url('storage/' . $items->video) }}"/>
                                                    </video>
                                                    <div class="card-body col bg-white">
                                                        <div>
                                                            <h5 class="card-title mb-1" style="height: 50px;"><b>(N°: {{ $loop->iteration }}) <u>{{$items->titre }}</u></b></h5>
                                                        </div>
                                                        <br>
                                                        <hr>
                                                        <div class="row">
                                                            <a href="{{ url('/admin/phase/' . $items->id . '/edit/' . $cour->id ) }}" title="Modifier Phase"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true">Mod</i></button></a>
                                                            <button type="submit" class="mx-4 btn btn-danger btn-sm deleted_element" title="Supprimer Phase" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true">Supp</i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-3">
                                                <div class="card col-12 mx-3 my-3 mt-1 mb-1 bg-warning">
                                                    <video controls width="250" height="150" class="mt-2 card-img-top" alt="Titre">
                                                        <source src="{{ url('storage/' . $items->video) }}"/>
                                                    </video>
                                                    <div class="card-body col bg-white">
                                                        <div>
                                                            <h5 class="card-title mb-1" style="height: 50px;"><b>(N°: {{ $loop->iteration }}) <u>{{$items->titre }}</u></b></h5>
                                                        </div>
                                                        <br>
                                                        <hr>
                                                        <div class="row">
                                                            <a href="{{ url('/admin/phase/' . $items->id . '/edit/' . $cour->id ) }}" title="Modifier Phase"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true">Mod</i></button></a>
                                                            <button type="submit" class="mx-4 btn btn-danger btn-sm deleted_element" title="Supprimer Phase" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true">Supp</i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @empty
                                        <div class="card-body">
                                            <h5 class="card-title">Oups ce cours ne dispose pas encore de vidéos</h5>
                                            <a href="{{url('admin/phase/create')}}" class="btn btn-primary">Ajouter des Vidéos à ce cours</a>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
