 @extends('layouts.appClient')

 @section('content')

 <div class="content py-2">
     <!-- CORPS -->
     <div class="container pt-2 " style="">
         <div class="col-12" style="height:100%;">
             <div class="card card-primary card-outline card-tabs">
                 <div class="card-header p-2 border-bottom-1 text-center">
                     <h2>Vos different test pour devenir createur</h2>
                     <div class="">
                         <a href="/inscriptionUser/create" class="btn btn-primary">Devenir createur</a>
                     </div>
                 </div>
                 <div class="card-body" style="overflow-y: auto ; height: 650px;">
                     <div class="tab-content" id="custom-tabs-three-tabContent">
                         <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel"
                             aria-labelledby="custom-tabs-three-home-tab">


                             @if(isset($video))
                             <div class="card">
                                 <video controls width="250" height="350" class="mt-2 card-img-top">
                                     <source src="{{ url('storage/' . $video->video) }}" />
                                 </video>
                                 <div class="card-body">
                                     <h5 class="card-title">{{$video->spetiality}}</h5>
                                     <p class="card-text">{{$video->description}}</p>
                                     <p class="card-text"><small class="text-muted">Last updated
                                             {{$video->created_at}}</small></p>
                                 </div>
                             </div>
                             <div>
                                 <form method="POST" action="{{route('creator.update',['id'=>$video->id])}}"
                                     accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                     <div class="form-group {{ $errors->has('reponse_etape') ? 'has-error' : ''}}">
                                         <label for="reponse_etape" class="control-label">{{ 'reponse_etape' }}</label>
                                         <input class="form-control" name="reponse_etape" type="number"
                                             id="reponse_etape"
                                             value="{{ isset($video->reponse_etape) ? $video->reponse_etape : ''}}">
                                         {!! $errors->first('reponse_etape', '<p class="help-block">
                                             :message</p>') !!}
                                     </div>
                                     <div class="form-group">
                                         <input class="btn btn-primary" type="submit" value="Envoyer">
                                     </div>
                                 </form>
                             </div>
                             @else
                             <div class="direct-chat-msg">
                                 <div class="direct-chat-infos clearfix">
                                     <span class="direct-chat-name float-left">theo</span>
                                 </div>
                                 <img class="direct-chat-img"
                                     src="{{ url(isset(Auth::user()->avatar) ? 'storage/' . Auth::user()->avatar : 'photo.jfif') }}"
                                     alt="message user image">
                                 <div class="direct-chat-text">
                                     <b style="color: red">
                                         Pas de video disponible
                                     </b>
                                 </div>
                                 <!-- /.direct-chat-text -->
                             </div>
                             @endif

                         </div>


                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- /.card -->
 </div>

 @endsection