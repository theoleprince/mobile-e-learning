   @extends('layouts.appClient')

   @section('content')
   <div class="container">
       <div class="center">
           <div class="row">
               <div class="col-md-8">
                   <div class="login-logo">
                       <a href="#"><i class="fas fa-edge-legacy"></i><b>E-Learning</b></a>
                   </div>
                   <div class="card">
                       <div class="card-body">

                           <h1 class="login-box-msg">Contactez un formateur</h1>

                           <form action="/prof-create" method="POST">
                               @csrf
                               <div class="form-group">
                                   <input type="text" class="form-control @error('nom') is-invalid @enderror" name="nom"
                                       placeholder="Votre nom ..." value="{{old('nom')}}">
                                   @error('nom')
                                   <div class="invalid-feedback">
                                       {{$errors->first('nom')}}
                                   </div>
                                   @enderror
                               </div>

                               <div class="form-group">
                                   <input type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" placeholder="Votre email ..." value="{{old('email')}}">
                                   @error('email')
                                   <div class="invalid-feedback">
                                       {{$errors->first('email')}}
                                   </div>
                                   @enderror
                               </div>

                               <div class="form-group">
                                   <input type="text" class="form-control @error('objet') is-invalid @enderror"
                                       name="objet" placeholder="Votre objet ..." value="{{old('objet')}}">
                                   @error('objet')
                                   <div class="invalid-feedback">
                                       {{$errors->first('objet')}}
                                   </div>
                                   @enderror
                               </div>

                               <div class="form-group">
                                   <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                                       cols="50" rows="10" placeholder="Votre message ...">{{old('message')}}</textarea>
                                   @error('message')
                                   <div class="invalid-feedback">
                                       {{$errors->first('message')}}
                                   </div>
                                   @enderror
                               </div>

                               <button type="submit" class="btn btn-primary">Envoyer mon message</button>
                           </form>
                       </div>
                   </div>
               </div>
               <div class="col-md-4">
                   <div class="login-logo">
                       <a href="#"><i class="fas fa-edge-legacy"></i><b>Question reponse</b></a>
                   </div>
                   <div class="card">
                       <div class="card-body">

                           @foreach($data as $item)
                           <p
                               style="background-color:gray; color:white; border-radius:5px; padding:5px;margin-right:20px">
                               {{$item->objet}}<br>
                               {{$item->message}}<br>
                           </p>
                           @if($item->reponseProfCreate)
                           @foreach($item->reponseProfCreate as $item)
                           <p
                               style="background-color:MediumSeaGreen; color:white; border-radius:5px; padding-left:5px; margin-left:20px">
                               {{$item->message}}
                           </p>
                           @endforeach
                           @endif
                           @endforeach
                       </div>

                   </div>
               </div>
           </div>
       </div>
   </div>
   @endsection