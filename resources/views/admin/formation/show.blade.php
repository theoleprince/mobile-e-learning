@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between;">
                        <div class="col-md-2">
                            Formation {{ $formation->id }}
                        </div>
                        <div class="col-md-6"><b><span style="color: blue;">{{ (isset($formation->users) ? $formation->users : 00) }} User(s)</span> suivent ce Cours</b></div>
                        <div class="col-md-4" style="display: flex; justify-content: space-around;">
                            <a href="{{ url('/admin/formation') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <a href="{{ url('/admin/cours/create/' . $formation->id) }}" title="Back"><button class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Cours</button></a>
                            <a href="{{ url('/admin/formation/' . $formation->id . '/edit') }}" title="Edit Formation"><button class="btn btn-primary btn-sm"><i class="fas fa-pen" aria-hidden="true"></i> Edit</button></a>
                            <form method="POST" action="{{ url('admin/formation' . '/' . $formation->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Formation" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash" aria-hidden="true"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-title mb-1 bg-secondary col-12 text-center">
                            <h5>{{ $formation->description }}</h5>
                        </div><br>
                        <div class="row mt-2">
                            @forelse ($cours as $item)
                                @if ($item->activated)
                                    <div class="col-3">
                                        <div class="card border-info m-1">
                                            <div class="card-header bg-success" style="height: 60px">
                                                <h3 class="card-title">{{$item->nom}}</h3>

                                                <div class="card-tools">
                                                    <form method="POST" action="{{ url('/admin/cours/' . $item->id) }}"
                                                        accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="button submit" class="btn btn-tool"
                                                            title="Supprimer Cour"
                                                            onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="card-body text-black">
                                                <h5 class="card-title">Nbre Vidéos:<b>{{ (isset($item->phase) ? $item->phase : 00) }} Vidéos(s)</b></h5>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-3">
                                        <div class="card border-info m-1">
                                            <div class="card-header bg-warning" style="height: 60px">
                                                <h3 class="card-title">{{$item->nom}}</h3>

                                                <div class="card-tools">
                                                    <form method="POST" action="{{ url('/admin/cours/' . $item->id) }}"
                                                        accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="button submit" class="btn btn-tool"
                                                            title="Supprimer Cour"
                                                            onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                                <div class="card-body text-black">
                                                    <h5 class="card-title">Nbre Vidéos:<b>{{ (isset($item->phase) ? $item->phase : 00) }} Vidéos(s)</b></h5>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="card border-info mb-1 col-12">
                                    <div class="card-header bg-secondary">Aucun</div>
                                        <div class="card-body text-black">
                                            <p class="card-text">Oups Vous n'avez pas encore de cours pour cette formation</p>
                                            <p class="text-center"><a href="{{ url('/admin/cours/create/' . $formation->id) }}" title="Back"><button class="btn btn-success btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> Cours</button></a>
                                            </p>
                                        </div>
                                </div>
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
