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

                             <div class="">
                                 @if(isset($videos))
                                 <div class="row">
                                     @foreach ($videos as $item)
                                     <div class="col-4">
                                         <a href="{{ url('/creator/'.$item->id) }}">
                                             <div class="card">
                                                 <video controls width="250" height="350" class="mt-2 card-img-top">
                                                     <source src="{{ url('storage/' . $item->video) }}" />
                                                 </video>
                                                 <div class="card-body">
                                                     <h5 class="card-title">{{$item->spetiality}}</h5>
                                                     <p class="card-text">{{$item->description}}</p>
                                                     <p class="card-text"><small class="text-muted">Last updated
                                                             {{$item->created_at}}</small></p>
                                                 </div>
                                             </div>
                                         </a>

                                         <div>

                                             <a href="{{ url('/creator/'.$item->id) }}" class="btn btn-primary">Voir</a>

                                         </div>
                                     </div>
                                     @endforeach

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
             <!-- /.card -->
         </div>
     </div>
 </div>
 </div>
 @endsection