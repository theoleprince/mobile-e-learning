@extends('layouts.app')

@section('content')

    <div class="content-fluid mx-2">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="row col-sm-10">
                    <div class="row col-5">
                        <h1>Forum de Discussion</h1>
                        <span class="ml-3">
                            <a data-toggle="modal" data-target="#bd-example-modal-lg" class="btn btn-success btn-sm" title="Poster un nouveau commentaire" href="{{ url('admin/forum') }}"><i class="fas fa-plus"
                                aria-hidden="true"></i></a>
                            </i></span>
                    </div>
<!------------------- Modal du Forum -------------->
                        <div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Poster Votre commentaire</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ url('/admin/forum') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}" hidden>
                                                <label for="user_id" class="control-label">{{ 'user_id' }} <span class="text-red">*</span></label>
                                                <input class="form-control" name="user_id" type="text" id="user_id"
                                                    value="{{Auth::user()->id}}" readonly>
                                                {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                                            </div>
                                            <div class="form-group {{ $errors->has('phase_id') ? 'has-error' : ''}}" hidden>
                                                <label for="phase_id" class="control-label">{{ 'phase_id' }} <span class="text-red">*</span></label>
                                                <input class="form-control" name="phase_id" type="text" id="phase_id"
                                                    value="Administrateur" readonly>
                                                {!! $errors->first('phase_id', '<p class="help-block">:message</p>') !!}
                                            </div>
                                            <div class="form-group {{ $errors->has('commentaire') ? 'has-error' : ''}}">
                                                <label for="commentaire" class="control-label">{{ 'Commentaire' }} <span class="text-red">*</span></label>
                                                <textarea class="form-control" required rows="5" name="commentaire" type="textarea"
                                                    id="commentaire"></textarea>
                                                {!! $errors->first('commentaire', '<p class="help-block">:message</p>') !!}
                                            </div>
                                            <div class="modal-footer">
                                                <div class="form-group">
                                                    <input class="btn btn-primary" type="submit" value="Poster">
                                                </div>
                                            </div>




                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<!------------------- Modal du Forum -------------->
                    <div class="row col-6">
                        <div class="col-5">
                            <!-- SEARCH FORM -->
                            <form method="GET" action="{{ url('/admin/forum') }}" class="form-inline pl-2 pr-2" role="trie">
                                <div class="input-group input-group-sm">
                                <select class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="trie" required>
                                    <option disabled selected>--none--</option>
                                    <option value="tous">Tous</option>
                                    <option value="participants">Participant</option>
                                    <option value="inconnu">inconnu</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-7">
                            <!-- SEARCH FORM -->
                            <form method="GET" action="{{ url('/admin/forum') }}" class="form-inline ml-3" role="search">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" value="{{ request('search') }}" name="search" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row col-sm-2">
                    <div class="col-3">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link" data-toggle="dropdown" href="#">
                                    <i class="fas fa-th-large"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-item dropdown-header">Statistique</span>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-envelope mr-2"></i> {{$inconnu}} Inconnus
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-users mr-2"></i> {{$participants}} Participants
                                </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-9">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Forum</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Timelime example  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- The time line -->
                        <div class="timeline">
                            @forelse ($commentaire as $item)
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        @php
                                            $phase = $item->phase_id;
                                        @endphp
                                        @if ($phase  == "0")
                                            <span class="bg-secondary time"><i class="fas fa-clock"></i> {{ $item->created_at }}</span>
                                            <h3 class="timeline-header"><a href="#"><a href="mailto:{{ $item->user_id }}" style="color: blue;">{{ $item->user_id }}</a></a> Visitor</h3>
                                            <div class="timeline-body">
                                                {{$item->commentaire}}
                                            </div>
                                            <div class="timeline-footer">
                                                <a hidden data-toggle="modal" data-target="#bd-example-modal-repondre" class="btn btn-primary btn-sm" title="Répondre le commentaire"><i class="fas fa-pen"
                                                    aria-hidden="true"></i></a>
                                                <form method="POST" action="{{ url('admin/forum' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Supprimer le commentaire"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash"
                                                            aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="time"><i class="fas fa-clock"></i>  {{ $item->created_at }}</span>
                                            <h3 class="timeline-header"><a href="#"><a href="mailto:{{ $item->email }}" style="color: blue;">{{ $item->email }}</a></a> {{ $item->name }} {{ $item->prenom }}</h3>
                                            <div class="timeline-body">
                                                {{$item->commentaire}}
                                            </div>
                                            <div class="timeline-footer">
                                                <a hidden data-toggle="modal" data-target="#bd-example-modal-repondre" class="btn btn-primary btn-sm" title="Répondre le commentaire"><i class="fas fa-pen"
                                                    aria-hidden="true"></i></a>
                                                <form method="POST" action="{{ url('admin/forum' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Supprimer le commentaire"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash"
                                                            aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                            <span class="time"><i class="fas fa-clock"></i> Aujourd'hui</span>
                                            <h3 class="timeline-header"><a href="">Robot</a> Soyer le premier à poster</h3>

                                            <div class="timeline-body">
                                                Acun commentaire déjà posté dans le forum
                                            </div>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                <!-- /.col -->
                </div>
            </div>
        <!-- /.timeline -->

        </section>
        <!-- /.content -->
    </div>
@endsection
