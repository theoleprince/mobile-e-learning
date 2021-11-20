@extends('layouts.appClient')

@section('content')
<div class="card">
    @if(isset($formation))
    <div class="row">
        @foreach($formation as $item)
        <div class="col-md-6">
            <a href="{{ url('/video/Idp/'.$item->id) }}">
                <div style=" height:50px; with:50px; padding:50px; margin:100px ">
                    {{$item->nom}}
                </div>
            </a>

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


    @if(isset($types))
    @if(isset($types['0']->categories))


    <div class="card-body">

        <div class="row">
            @foreach($types['0']->categories as $item)
            <div class="col-md-6">
                <a href="{{ url('/video/'.$item->id) }}">
                    <div
                        style="background-image:{{url('storage/'.$item->image)}}; height:50px; with:50px; padding:50px; margin:100px ">
                        {{$item->nom}}
                        <img height=50 src="{{url('storage/'.$item->image)}}" alt="">
                    </div>
                </a>

            </div>

            @endforeach
        </div>
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
                Pas de commentaire pour cette video
            </b>
        </div>
        <!-- /.direct-chat-text -->
    </div>
    @endif
</div>

@endsection