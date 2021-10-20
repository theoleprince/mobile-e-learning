@extends('layouts.app')

@section('content')
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{ url(isset($user->photo) ? 'storage/'.$user->photo : 'photo.jfif') }}">
                </div>

                <h3 class="profile-username text-center"> {{ Auth::user()->name }} </h3>

                <p class="text-muted text-center">Utilisatreur</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Utilisateur(s) :</b> <a class="float-right">{{ Auth::user()->name }} {{ Auth::user()->prenom }}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">A Propos De Moi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Informations</strong>

                <p class="text-muted">
                    {{ $user->email }} , {{ $user->telephone1 }}
                </p>

                <hr>

                <strong><i class="fas fa-calendar mr-1"></i> Date Naissance</strong>

                <p class="text-muted">{{ Auth::user()->date_naissance }}</p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Lieu Naissance</strong>

                <p class="text-muted">{{ Auth::user()->lieu_naissance }}</p>

                <hr>
                <strong><i class="fas fa-file-alt mr-1"></i> Poste</strong>

                @foreach($user->roles as $item)
                    <p class="text-muted">
                        {{ isset($item->display_name) ? $item->display_name : $item->name }}
                    </p>
                    @endforeach

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Mes Droits D'acces</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Modifier Mes Données</a></li>
                  <li class="nav-item"><a class="nav-link" href="#update" data-toggle="tab">Autres Modification</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nom Role</th><th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($user->roles) === 0)
                                    <tr>
                                        <td colspan="3">
                                            <h3 align="center">Aucun Role</h3>
                                        </td>
                                    </tr>
                                @else
                                @foreach($user->roles as $item)
                                    <tr>
                                        <td>{{ isset($item->display_name) ? $item->display_name : $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.post -->

                    <div class="post">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nom Permission</th><th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($user->permissions) === 0)
                                    <tr>
                                        <td colspan="3">
                                            <h3 align="center">Aucune permission speciale</h3>
                                        </td>
                                    </tr>
                                @else
                                @foreach($user->permissions as $item)
                                    <tr>
                                        <td>{{ isset($item->display_name) ? $item->display_name : $item->name }}</td>
                                        <td>{{ isset($item->description) ? $item->description : 'Aucune Description... ' }}</td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                    <form method="POST" action="{{ url('/admin/user/edit') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="inputPhoto" class="col-sm-2 col-form-label">Photo De Profil</label>
                                <div class="col-sm-10">
                                  <input type="file" class="form-control" name="photo" value="{{ $user->avatar }}">
                                </div>
                              </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Noms</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Prénom</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="prenom" value="{{ isset($user->prenom) ? $user->prenom : '' }}" placeholder="Prénom">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email" readonly disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Lieu De Naissance</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" value="{{ $user->lieu_naissance }}" placeholder="Lieu de naissance">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Date De Naissance</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="date_naissance" name="date_naissance" value="{{ $user->date_naissance}}" placeholder="Date de naissance">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Sexe</label>
                        <div class="col-sm-10">
                            <input type="radio" name="sexe" type="text" class="form-control" id="sexe">
                                ra
                            @if (($user->sexe)=="Masculin")
                                <span><i class="fas fa-male fa-5x mr-2"></i></span>
                            @else
                                <span><i class="fas fa-female fa-5x mr-2"></i></span>
                            @endif
                          <input type="text" class="form-control" id="adresse" name="adresse" value="{{$user->adresse}}" placeholder="adresse">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-dark">Modifier</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="update">
                    <form method="post" action="{{ url('/admin/user/password') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                      <div class="modal-body">
                      {{ csrf_field() }}

                      <div class="form-group required {{ $errors->has('email') ? 'has-error' : ''}}">
                              <label for="{{$item->id}}quantite" class="control-label">Email</label>
                              <input class="form-control" type="email" name="email" value="{{$user->email}}" required>
                              {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="form-group required {{ $errors->has('oldpass') ? 'has-error' : ''}}">
                              <label for="{{$item->id}}prix" class="control-label">Mot De Passe Actuelle</label>
                              <input class="form-control" type="password" name="oldpass" required value="{{ old('oldpass') }}">
                              {!! $errors->first('oldpass', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="form-group required {{ $errors->has('password') ? 'has-error' : ''}}">
                              <label for="{{$item->id}}prix" class="control-label">Nouveau Mot De Passe</label>
                              <input class="form-control" type="password" name="password" value="{{ old('password') }}" required>
                              {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div class="form-group required {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                              <label for="{{$item->id}}prix" class="control-label">Confirmer Le Mot De Passe</label>
                              <input class="form-control" type="password" name="password_confirmation" required value="{{ old('password_confirmation') }}">
                              {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
                      </div>
                      <div>
                          <button type="submit" class="btn btn-primary ml-4">Modifier</button>
                      </div>
                    </form>
                  </div>



                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection
