@extends('layouts.app')
@section('title', 'Категории')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <h5>Категории</h5>
                        <div class="dd" id="nestable_list_1">
                            <ol class="dd-list">
                                @foreach($categories as $cat)
                                    <li class="dd-item dd3-item" data-id="{{ $cat->id }}">
                                        <div class="dd-handle dd3-handle"></div>
                                        <div class="dd3-content">{{ $cat->title }}</div>
                                        @if (count($cat->children))
                                            @include('categories.children', ['categories' => $cat->children])
                                        @endif
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
