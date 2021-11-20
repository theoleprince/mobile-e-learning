@extends('layouts.appClient')

@section('content')

<div class="container-fluid pt-2" style="width: 90%">
    <div class="row" style="height:100%;">
        <div class="row card card-primary card-outline card-tabs p-4" style="width:100%;">
            <div class="card-header p-2 border-bottom-1 text-center">
                <h2>Vos Leçons</h2>
            </div>
            <div class="row ">
                <div class="col-7 col-sm-9 pt-2">
                    <div class="tab-content pt-3 px-5" id="vert-tabs-right-tabContent"
                        style="background-color: rgb(212, 212, 212);">
                        @forelse ($videos as $video)
                        @forelse ($video as $item)

                        <div class="tab-pane fade" id="vert-tabs-right-{{$item->id}}" role="tabpanel"
                            aria-labelledby="vert-tabs-right-{{$item->id}}-tab">
                            <div class="row col-12">
                                <div class="card col-12">
                                    <video controls width="250" height="350" class="mt-2 card-img-top">
                                        <source src="{{ url('storage/' . $item->video) }}" />
                                    </video>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$item->titre}}</h5>
                                        <p class="card-text">{{$item->_cours}}</p>
                                        <p class="card-text"><small class="text-muted">Last updated
                                                {{$item->created_at}}</small></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @empty

                        @endforelse
                        @empty
                        <div class="row">
                            <div class="row col-12">
                                <div class="card ">
                                    <div class="row g-0 ">
                                        <div class="card-body">
                                            <h5 class="card-title"><b>Nous n'avons pas encore de vidéos pour la
                                                    spetialite</h5>
                                            <p class="card-text"> Veillez s'il vous plait patienter que les
                                                administratuer mettent à jours les donnée de ce cours</p>
                                            <p class="card-text text-center">
                                                <a href="{{url('/home')}}" class="btn btn-warning row">
                                                    <i class="fas fa-arrow-left">Retournez a l'accueil</i>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-5 col-sm-3">
                    <div class="col nav nav-tabs nav-tabs-right" id="vert-tabs-right-tab" role="tablist"
                        aria-orientation="vertical" style="overflow-y: auto ; max-height: 550px;">
                        @forelse ($videos as $video)
                        @forelse ($video as $item)
                        <a class="nav-link" id="vert-tabs-right-{{$item->id}}-tab" data-toggle="pill"
                            href="#vert-tabs-right-{{$item->id}}" role="tab"
                            aria-controls="vert-tabs-right-{{$item->id}}" aria-selected="true">
                            <div class="card m-1">
                                <div class="row g-0 m-1">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>({{$item->numero}})</b> {{$item->titre}}</h5>
                                        <p class="card-text"> {{$item->_cours}}</p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated: {{$item->created_at}}</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @empty
                        @endforelse
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection