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
                        <div class="tab-content pt-3 px-5" id="vert-tabs-right-tabContent" style="background-color: rgb(212, 212, 212);">
                            @foreach ($phase as $item)
                                <div class="tab-pane fade" id="vert-tabs-right-{{$item->id}}" role="tabpanel" aria-labelledby="vert-tabs-right-{{$item->id}}-tab">
                                    <div class="row col-12">
                                        <div class="card col-6">
                                            <video controls width="250" height="350" class="mt-2 card-img-top">
                                                <source src="{{ url('storage/' . $item->video) }}"/>
                                                </video>
                                            <div class="card-body">
                                            <h5 class="card-title">{{$item->titre}}</h5>
                                            <p class="card-text">{{$item->_cours}}</p>
                                            <p class="card-text"><small class="text-muted">Last updated {{$item->created_at}}</small></p>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-5" style="background-color: rgb(212, 212, 212);">
                                            <div class="card direct-chat direct-chat-primary">
                                                <div class="card-header text-center">
                                                    <h3 class="card-title" style="text-align: center">Commentaires sur cette vidéo</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <!-- Conversations are loaded here -->
                                                    <div class="direct-chat-messages">
                                                        @forelse ($item->comments as $comment)
                                                            @if ($comment->user_id == Auth::user()->id)
                                                                <!-- Message to the right -->
                                                                <div class="direct-chat-msg right">
                                                                    <div class="direct-chat-infos clearfix">
                                                                        <span class="direct-chat-name float-right">{{$comment->user->name}}</span>
                                                                        <span class="direct-chat-timestamp float-left">{{$comment->updated_at}}</span>
                                                                    </div>
                                                                    <!-- /.direct-chat-infos -->
                                                                    <img class="direct-chat-img" src="{{ url(isset(Auth::user()->avatar) ? 'storage/' . Auth::user()->avatar : 'photo.jfif') }}" alt="message user image">
                                                                    <!-- /.direct-chat-img -->
                                                                    <div class="direct-chat-text">
                                                                        {{$comment->commentaire}}
                                                                    </div>
                                                                    <!-- /.direct-chat-text -->
                                                                </div>
                                                            @else
                                                                <div class="direct-chat-msg">
                                                                    <div class="direct-chat-infos clearfix">
                                                                        <span class="direct-chat-name float-left">{{$comment->user->name}}</span>
                                                                        <span class="direct-chat-timestamp float-right">{{$comment->updated_at}}</span>
                                                                    </div>
                                                                    <img class="direct-chat-img" src="{{ url(isset(Auth::user()->avatar) ? 'storage/' . Auth::user()->avatar : 'photo.jfif') }}" alt="message user image">
                                                                    <div class="direct-chat-text">
                                                                        {{$comment->commentaire}}
                                                                    </div>
                                                                    <!-- /.direct-chat-text -->
                                                                </div>
                                                            @endif
                                                        @empty
                                                        Pas de commentaire pour cette video
                                                        @endforelse
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                    <form onsubmit="sendComment()" method="POST" action="{{ url('/user/commentaire') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="form-group {{ $errors->has('phase_id') ? 'has-error' : ''}}" hidden>
                                                            <label for="phase_id" class="control-label">{{ 'Phase' }}</label>
                                                            <input class="form-control" name="phase_id" type="number" id="phase_id" readonly value="{{$item->id}}" >
                                                            {!! $errors->first('phase_id', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                        <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}" hidden>
                                                            <label for="user_id" class="control-label">{{ 'User Id' }}</label>
                                                            <input class="form-control" name="user_id" type="number" id="user_id" readonly value="{{ Auth::user()->id }}" >
                                                            {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                        <div class="input-group {{ $errors->has('commentaire') ? 'has-error' : ''}}">
                                                            <input type="text" name="commentaire" id="commentaire" placeholder="Commenter cette vidéo ..." class="form-control" required>
                                                            <span class="input-group-append">
                                                                <button type="submit" class="btn btn-primary">Envoyer</button>
                                                            </span>
                                                        </div>
                                                    </form>
                                                </div>
                                            <!-- /.card-footer-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-5 col-sm-3">
                        <div class="col nav nav-tabs nav-tabs-right" id="vert-tabs-right-tab" role="tablist" aria-orientation="vertical"  style="overflow-y: auto ; max-height: 550px;">
                            @foreach ($phase as $item)
                                <a class="nav-link" id="vert-tabs-right-{{$item->id}}-tab" data-toggle="pill" href="#vert-tabs-right-{{$item->id}}" role="tab" aria-controls="vert-tabs-right-{{$item->id}}" aria-selected="true">
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
                            @endforeach
                            <form method="POST" action="{{ url('/user/cours/' . $item->cours_id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <button  style="margin-left: auto; margin-right: auto; margin-bottom: 5px;" class="btn btn-success"><b> J'ai terminé cette partie</b> <i class="fa fa-arrow-right"></i></button>
                            </form>
                            </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <script>
        function sendComment() {
            var phase = document.getElementById('phase_id');
            var user = document.getElementById('user_id');
            var commentaire = document.getElementById('commentaire');
            alert(phase.value)
            console.log(phase);
            var data = {
                "phase_id": id,
                "user_id": user,
                "commentaire": commentaire
            }
            $.ajax({
                type: "GET",
                url: "/user/commentaire",
                data: data,
                success: function (response) {

                Swal.fire({
                    icon: 'success',
                    title: response['status'],
                    showConfirmButton: true,
                    timer: 4000
                }).then((result) => {
                    console.log(response.id)
                    alert("Commentaire ok")
                });
                }
            });
            console.log(data);
            return false;
        }
    </script>
@endsection
