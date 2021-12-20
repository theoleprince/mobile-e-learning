@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Corrections Des Epreuves</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/question') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />
                        <div class="row d-flex align-items-stretch">
                            @foreach($reponse as $item)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                    <a href="{{ url('/admin/question/' . $id . '/show/' . $item->iduser) }}">
                                        <div class="card bg-light">
                                            <div class="card-header text-muted border-bottom-0">
                                                {{ $item->name }}
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="lead"><b>{{ $item->name }} {{ $item->prenom }}</b></h2>
                                                        <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span><strong>{{$item->email}}</strong></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-5 text-center">
                                                        <img src="{{ url(isset($item->avatar) ? 'storage/' . $item->avatar : 'photo.jfif') }}"class="img-circle img-fluid" style="width:150px;margin-top: -40px; height:150px; border: 2px purple solid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            @endforeach
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
