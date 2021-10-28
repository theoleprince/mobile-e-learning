@extends('layouts.appClient')

@section('content')
<!-- CORPS -->
    <div class="container pt-2 " style="">
        <div class="col-12" style="height:100%;">
            <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Tous</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Non lus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">En cours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">lus</a>
                    </li>
                    </ul>
                </div>
                <div class="card-body" style="overflow-y: auto ; max-height: 650px;">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">

                            <div class="text-center">
                                <div class="row">
                                    @foreach ($tous as $item)
                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                <h5 class="card-title"><b><u>(N°: {{$item->numero}})</u> {{$item->_formation}} </b></h5><br>
                                                <p clasxs="card-text"><b><u>Titre:</u></b> {{$item->nom}} <br>
                                                                    <b><u>Temps: </u></b> {{$item->temps}} Minutes </p>
                                                <a href="{{ url('/user/phase/' . $item->id) }}" class="btn btn-primary"><i class="fa fa-plus"></i><b> Lire</b></a>
                                                <a href="{{ url('/user/question/') }}" class="btn btn-success"><i class="fa fa-edit"></i><b> S'evaluer</b></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                            <div class="text-center">
                                <div class="row">
                                    @foreach ($nonlus as $item)
                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                <h5 class="card-title"><b><u>(N°: {{$item->numero}})</u> {{$item->_formation}} </b></h5>
                                                <p class="card-text"><b><u>Titre:</u></b> {{$item->nom}} <br>
                                                                    <b><u>Temps: </u></b> {{$item->temps}} Minutes </p>
                                                <a href="{{url('/user/phase/' . $item->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i><b> Suivre</b></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                            <div class="text-center">
                                <div class="row">
                                    @foreach ($encours as $item)
                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                <h5 class="card-title"><b><u>(N°: {{$item->numero}})</u> {{$item->_formation}} </b></h5>
                                                <p class="card-text"><b><u>Titre:</u></b> {{$item->nom}} <br>
                                                                    <b><u>Temps: </u></b> {{$item->temps}} Minutes </p>
                                                <a href="{{url('/user/phase/' . $item->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i><b> Suivre</b></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                            <div class="text-center">
                                <div class="row">
                                    @foreach ($lus as $item)
                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                <h5 class="card-title"><b><u>(N°: {{$item->numero}})</u> {{$item->_formation}} </b></h5>
                                                <p class="card-text"><b><u>Titre:</u></b> {{$item->nom}} <br>
                                                                    <b><u>Temps: </u></b> {{$item->temps}} Minutes </p>
                                                <a href="{{url('/user/phase/' . $item->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i><b> Suivre</b></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
