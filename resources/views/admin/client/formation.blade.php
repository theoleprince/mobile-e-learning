@extends('layouts.appClient')

@section('content')

    <div class="content py-2">
        <!-- CORPS -->
        <div class="container pt-2 " style="">
            <div class="col-12" style="height:100%;">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-2 border-bottom-1 text-center">
                        <h2>Vos Formations</h2>
                    </div>
                    <div class="card-body" style="overflow-y: auto ; height: 650px;">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel"
                                aria-labelledby="custom-tabs-three-home-tab">

                                <div class="">
                                    <div class="row">
                                        @foreach ($formation as $item)
                                        <div class="col-sm-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title"><b> {{$item->nom}} </b></h5>
                                                    <p class="card-text text-justify"> {{$item->nom}} </p>
                                                    <span
                                                        style="font-size: 10ppx; text-align:right; text-decoration:underline">updated
                                                        at <b>{{$item->created_at}}</b></span>
                                                    <div class="text-center">
                                                        <a href="{{ url('/user/cours/' . $item->id) }}"
                                                            class="btn btn-primary"><i class="fa fa-plus"></i><b>
                                                                Suivre</b></a>
                                                    </div>
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
    </div>
@endsection
