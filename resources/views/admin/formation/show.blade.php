@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between;">
                        <div class="col-md-9">
                            Formation {{ $formation->id }}
                        </div>
                        <div class="col-md-3" style="display: flex; justify-content: space-around;">
                            <a href="{{ url('/admin/formation') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <a href="{{ url('/admin/formation/' . $formation->id . '/edit') }}" title="Edit Formation"><button class="btn btn-primary btn-sm"><i class="fas fa-pen" aria-hidden="true"></i> Edit</button></a>
                            <form method="POST" action="{{ url('admin/formation' . '/' . $formation->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Formation" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash" aria-hidden="true"></i> Delete</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ($cours as $item)
                                @if ($item->activated)
                                    <div class="col-3">
                                        <div class="card border-info m-1">
                                            <div class="card-header bg-success">
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
                                                <h5 class="card-title">Secondary card title</h5>
                                                <p class="card-text">Some quick bulk of the card's content.</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-3">
                                        <div class="card border-info m-1">
                                            <div class="card-header bg-warning">
                                                <h3 class="card-title">{{$item->nom}}</h3>

                                                <div class="card-tools">
                                                    <button type="button submit" class="btn btn-tool" title="Supprimer Cour" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-times"></i></button>
                                                </div>
                                            </div>
                                                <div class="card-body text-black">
                                                <h5 class="card-title">Secondary card title</h5>
                                                <p class="card-text">Some quick bulk of the card's content.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="card border-info mb-1 col-12">
                                    <div class="card-header bg-secondary">Aucun</div>
                                        <div class="card-body text-black">
                                            <p class="card-text">Oups Vous n'avez pas encore de cours pour cette formation</p>
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
