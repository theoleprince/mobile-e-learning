<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>AdminLTE 3 | sign in</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    </head>
    
    <body class="hold-transition login-page">
        <div class="container">
            <div class="center">
                <div class="col-md-8">
                    <div class="login-logo">
                        <a href="#"><i class="fas fa-edge-legacy"></i><b>E-Learning</b></a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <p class="login-box-msg"><b>Créer un compte pour acceder à l'application</b></p>

                            <form method="POST" action="{{ url('inscriptionUser') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                    <div class="required form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                                        <label for="name" class="control-label obligatoire">{{ 'Nom' }}</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ isset($user->name) ? $user->name : ''}}"
                                            required placeholder="Enter le nom">
                                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('prenom') ? 'has-error' : ''}}">
                                        <label for="prenom" class="control-label">{{ 'Prenom' }}</label>
                                        <input type="text" class="form-control" name="prenom" id="prenom"
                                            value="{{ isset($user->prenom) ? $user->prenom : ''}}" placeholder="Enter le prenom">
                                        {!! $errors->first('prenom', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="required form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                        <label for="email" class="control-label obligatoire">{{ 'Email' }}</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ isset($user->email) ? $user->email : ''}}" required placeholder="Enter l'email">
                                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                                        <label for="password" class="control-label obligatoire">{{ 'Password' }}</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            value="{{ isset($user->password) ? $user->password : ''}}" placeholder="Enter le mot de passe">
                                        <span>Votre mot de passe par default est 000000</span>
                                        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('avatar') ? 'has-error' : ''}}">
                                        <label for="avatar" class="control-label">{{ 'Avatar' }}</label>
                                        <input type="file" class="form-control" name="avatar" id="avatar"
                                            value="{{ isset($user->avatar) ? $user->avatar : ''}}" accept="image/*">
                                        {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('od') ? 'has-error' : ''}}">
                                        <label for="od" class="control-label">{{ 'OD' }}</label>
                                        <input type="text" class="form-control" name="od" id="od" value="{{ isset($user->od) ? $user->od : ''}}"
                                            placeholder="Enter l'od">
                                        {!! $errors->first('od', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('probleme') ? 'has-error' : ''}}">
                                        <label for="probleme" class="control-label">{{ 'Probleme' }}</label>
                                        <input type="text" class="form-control" name="probleme" id="probleme"
                                            value="{{ isset($user->probleme) ? $user->probleme : ''}}" placeholder="Enter le probleme">
                                        {!! $errors->first('probleme', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('lieu_naissance') ? 'has-error' : ''}}">
                                        <label for="lieu_naissance" class="control-label">{{ 'Lieu de naissance' }}</label>
                                        <input type="text" class="form-control" name="lieu_naissance" id="lieu_naissance"
                                            value="{{ isset($user->lieu_naissance) ? $user->lieu_naissance : ''}}" placeholder="Enter le lieu de naissance">
                                        {!! $errors->first('lieu_naissance', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('date_naissance') ? 'has-error' : ''}}">
                                        <label for="date_naissance" class="control-label">{{ 'Date de naissance' }}</label>
                                        <input type="date" class="form-control" name="date_naissance" id="date_naissance"
                                            value="{{ isset($user->date_naissance) ? $user->date_naissance : ''}}" placeholder="Enter la date de naissance">
                                        {!! $errors->first('date_naissance', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('sexe') ? 'has-error' : ''}}">
                                        <label for="sexe" class="control-label">{{ 'Sexe' }}</label>
                                        <select class="form-control" name="sexe" id="sexe">
                                        <option value="" disabled selected>Sexe</option>
                                            <option value="Masculin">Masculin</option>
                                            <option value="Feminin">Feminin</option>
                                        </select>
                                        {!! $errors->first('sexe', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="form-group {{ $errors->has('formation_id') ? 'has-error' : ''}}">
                                        <label for="formation_id" class="control-label">{{ 'Idp' }}</label>
                                        <select class="form-control" name="formation_id" id="formation_id" required>
                                            <option value="" disabled selected>Selectionner une formation</option>
                                            @foreach($formation as $item)
                                            <option @if(isset($user->formation_id) && $user->formation_id == $item->id)
                                                selected
                                                @endif value=" {{ $item->id }}">{{$item->nom}}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('formation_id', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    
                                    <div class="form-group {{ $errors->has('roles') ? 'has-error' : ''}}">
                                        <label style='visibility:hidden;display:none' for="roles" class="control-label">{{ 'Role' }}</label>
                                        <input type="hidden" class="form-control" name="roles" id="roles" value="user">
                                        {!! $errors->first('roles', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    <div class="social-auth-links mb-3">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-person-booth mr-2"></i>
                                            s'iscrire
                                        </button>
                                    </div>
                                    <div style="height:100%"></div>
                                    <div>
                                        <a class="btn btn-link" href="{{ url('/') }}">connectez-vous</a>
                                    </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery -->
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('dist/js/adminlte.min.js')}}"></script>         
    </body>

</html>