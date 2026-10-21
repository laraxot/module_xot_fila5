<?php

declare(strict_types=1);
?>
@extends('pub_theme::layouts.app')
@section('title', 'Error log')
@section('content')
<div class="text-center">
    <h3>Error log</h3>
</div>

<ul>
    @foreach ($files as $file)
    <li><a href="{{ request()->fullUrlWithQuery(['log' => $file->getFilename()]) }}">{{ $file->getFilename() }}</a></li>
    @endforeach
</ul>

@if ($urls !== [])
<h4>URLs</h4>
<ul>
    @foreach ($urls as $url)
    <li>{{ stripslashes($url) }}</li>
    @endforeach
</ul>
@endif

@if ($content !== '')
<pre style="white-space: pre-wrap;">{{ $content }}</pre>
@endif
@endsection
