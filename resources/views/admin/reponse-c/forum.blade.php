@extends('layouts.app')

@section('content')

    <div class="content-fluid mx-2">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Forum de Discussion</h1>
            </div>
            <div class="col-sm-6">
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
                                        @if ( {{ $item->phase_id }} != 0)
                                            <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                                            <h3 class="timeline-header"><a href="#"><a href="mailto:{{ $item->email }}" style="color: blue;">{{ $item->email }}</a></a> {{ $item->name }} {{ $item->prenom }}</h3>
                                            <div class="timeline-body">
                                                {{$item->commentaire}}
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-sm" href="{{ url('admin/forum' . '/' . $item->id) }}"><i class="fas fa-trash"
                                                    aria-hidden="true"></i> Repondre</a>
                                                <form method="POST" action="{{ url('admin/forum' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete type category"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash"
                                                            aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        @else
                                            <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                                            <h3 class="timeline-header"><a href="#"><a href="mailto:{{ $item->email }}" style="color: blue;">{{ $item->email }}</a></a> Visitor</h3>
                                            <div class="timeline-body">
                                                {{$item->commentaire}}
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-sm" href="{{ url('admin/forum' . '/' . $item->id) }}"><i class="fas fa-trash"
                                                    aria-hidden="true"></i> Repondre</a>
                                                <form method="POST" action="{{ url('admin/forum' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete type category"
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
