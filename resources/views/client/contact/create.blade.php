   @extends('layouts.appClient')

   @section('content')
   <div class="container">
       <div class="center">
           <div class="col-md-8">
               <div class="login-logo">
                   <a href="#"><i class="fas fa-edge-legacy"></i><b>E-Learning</b></a>
               </div>
               <div class="card">
                   <div class="card-body">

                       <h1 class="login-box-msg">Contactez-nous</h1>

                       <form action="/contact" method="POST">
                           @csrf
                           <div class="form-group">
                               <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                   placeholder="Votre nom ..." value="{{old('name')}}">
                               @error('name')
                               <div class="invalid-feedback">
                                   {{$errors->first('name')}}
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
       </div>
   </div>
   @endsection