@extends('layouts.app')
@section('title', 'Новая мебель')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <h5>Новая мебель</h5>
                        <hr />
                        
                        {{ Form::open([
                            'route' => ['furniture.store'],
                            'class'  => 'form-bordered',
                        ]) }}
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Название (slug)') !!}
                            {!! Form::text('name', old('name'), [
                                'class'       => 'form-control',
                                'placeholder' => 'Название',
                            ]) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                   {{ $errors->first('name') }}
                                </span>
                            @endif
                        </div>
                        
                        <hr />
                        <div class="form-group">
                            {!! Form::submit('Добавить', ['class' => 'btn btn-dark']) !!}
                        </div>
                        
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
