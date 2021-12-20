@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="content">
                <div class="container">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info card-outline">
                            <div class="card-header row">
                                <div class="col-1">
                                    <a href="{{url('/admin/question/' . $id . '/show')}}" class="btn btn-warning row">
                                        <i class="fas fa-arrow-left">Retour</i>
                                    </a>
                                </div>
                                <div class="col-3"></div>
                                <div class="col-7">
                                    <div class="card bg-light">
                                        <div class="card-header text-muted border-bottom-0">
                                            {{ $user->name }}
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="lead"><b>{{ $user->name }} {{ $user->prenom }}</b></h2>
                                                    <p class="text-muted text-sm"><b>About: </b> Apprenant  </p>
                                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span><strong>{{$user->email}}</strong></li>
                                                    </ul>
                                                </div>
                                                <div class="col-5 text-center">
                                                    <img src="{{ url(isset($user->avatar) ? 'storage/' . $user->avatar : 'photo.jfif') }}"class="img-circle img-fluid" style="width:100px;margin-top: -40px; height:100px; border: 2px purple solid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    @php
                                        $val = 0;
                                    @endphp
                            <div class="card-body">
                                <form method="POST" action="{{ url('/admin/question/' . $id . '/show/' .$user->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @forelse ($question as $item)
                                        <div class="car">

                                            <div class="row">
                                                <div class="col-12">
                                                    <div>
                                                        <p><b><u>Question:</u></b> {{$item->question}}&hellip;({{$item->nbre_point}} pts)</p>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group {{ $errors->has('question') ? 'has-error' : ''}}">
                                                        <textarea class="form-control" rows="2" required type="textarea" id="Reponse" readonly >{{ $item->Reponse}}</textarea>
                                                        {!! $errors->first('Reponse', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                    <div class="form-group {{ $errors->has('note') ? 'has-error' : ''}}" >
                                                        <label for="note" class="control-label">{{ 'Note ... /' . $item->nbre_point. 'pts' }}</label>
                                                        <input class="form-control" min="0" max="{{$item->nbre_point}}" name="note" required type="number" id="note" placeholder=".../{{$item->nbre_point}}" value="" >
                                                        {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        @php
                                            $val++;
                                        @endphp
                                    @empty
                                        <div class="text-muted mt-3 col-5">
                                            Cet utilisateur a par inadvertance soumis le formulaire sans remplir les champs.
                                        </div>
                                    @endforelse
                                    @if ($val != 0)
                                        <div class="form-group">
                                            <input class="btn btn-success" type="submit" value="Corriger">
                                        </div>
                                    @endif
                                </form>
                            </div>
                        <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- ./row -->
                </div><!-- /.container-fluid -->

                    <div class="modal fade" id="modal-xl">
                        <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Extra Large Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            <p>One fine body&hellip;</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success swalDefaultSuccess" data-dismiss="modal">
                                Submit
                            </button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                <!-- /.modal -->
                </section>
            </div>
        </div>
    </div>
@endsection
