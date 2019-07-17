<?php
$id = 'carousel-' . str_random(10);
?>

<div id="{{ $id }}" class="carousel slide" data-ride="carousel" style="max-width: 100%">
    

    <div class="carousel-inner" style="max-width: 100%">
        @for($i = 0; $i < count($images); $i++)
            <div class="carousel-item {{ $i === 0 ? ' active': ''}}">
                <img style="max-width: 100%;" src="{{ Storage::url($images[$i]->path) }}">
            </div>
        @endfor

        @if(count($images) > 1)
            <ul class="carousel-indicators">
                @for($i = 0; $i < count($images); $i++)
                    <li data-target="#{{ $id }}" data-slide-to="{{ $i }}" class="{{ $i === 0 ? 'active' : '' }}"></li>        
                @endfor
            </ul>
            <a class="carousel-control-prev" href="#{{ $id }}" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>

            <a class="carousel-control-next" href="#{{ $id }}" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        @endif
    </div>
</div>