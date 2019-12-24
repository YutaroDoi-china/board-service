@extends('layouts.app')

@section('content')

    <div class="container">
        @if(isset($boards[0]))
            <div class="dashboard cf">
                <div class="create-new"><a href="new-board">新しいボードを作る</a></div>
                <div class="filters">
                    <a class="sort-btn" data-sort="gone">消える順</a>
                    <a class="sort-btn" data-sort="new">新着</a>
                    <a class="sort-btn" data-sort="favorite">お気に入り</a>
                </div>
            </div>
            
        @endif
		<div id="sort-content" class="article-wrapper">
            @if(!isset($boards[0]))
                <div class="no-content">
                    <p>告知・募集中の投稿が見当たりません。<br>新しくボードを作りましょう！</p>
                    <div class="create-new-first"><a href="new-board">新しいボードを作る</a></div>
                </div>
            @else
                @foreach($boards as $board)
                    <div class='article-box'>
                        <a class="article-link" href="/article/{{$board->id}}">
                            <div class='article-header'>
                                {{ type_color($board->kind) }}
                                <time>{{ count_gone_time($board->delete_at) }}</time>                            
                            </div>
                            <p class="article-title">{{ $board->title }}</p>
                            <div class='article-views'>
                                <p>5 views</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
		</div>
	</div>
@endsection