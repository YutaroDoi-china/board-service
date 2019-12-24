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