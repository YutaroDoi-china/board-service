@extends('layouts.app')

@section('content')

    <div class="create-wrapper">
        <div class="select-box">
            <div id="contentType" class="article-type">
                {{ type_color($board->kind) }}
            </div>

            <span id="favBtn" class="fav-btn" data-id="{{ $board->id }}"></span>

            <div class="article-text">
                <p>{{ $board->text }}</p>
            </div>

            <div class="article-time">
                <p>Gone Time</p>
                <div>
                    <p>{{ count_gone_time($board->delete_at) }}</p>
                </div>
            </div>

            <div class="article-back"><a href="/">一覧に戻る</a></div>
        </div>		
    </div>
    
@endsection