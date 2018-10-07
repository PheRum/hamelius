@extends('layouts.app')
@section('title', 'Новая заявка')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <h5>Новая заявка</h5>
                        <hr />
                        
                        {{ Form::open([
                            'route' => ['ticket.store'],
                            'class'  => 'form-bordered',
                        ]) }}
                        
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::label('title', 'Заголовок') !!}
                            {!! Form::text('title', old('title'), [
                                'class'       => 'form-control',
                                'placeholder' => 'Заголовок',
                            ]) !!}
                            @if ($errors->has('title'))
                                <span class="help-block">
                                   {{ $errors->first('title') }}
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('process') ? ' has-error' : '' }}">
                            {!! Form::label('process', 'Процесс') !!}
                            {!! Form::select('process', $processFileds, null, [
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('process'))
                                <span class="help-block">
                                   {{ $errors->first('process') }}
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('furniture') ? ' has-error' : '' }}">
                            {!! Form::label('furniture', 'Мебель') !!}
                            {!! Form::select('furniture[]', $furnitureFileds, null, [
                                'class'       => 'form-control',
                                'data-style' => 'btn-info',
                                'multiple'
                            ]) !!}
                            @if ($errors->has('furniture'))
                                <span class="help-block">
                                   {{ $errors->first('furniture') }}
                                </span>
                            @endif
                        </div>
                        
                        <hr />
                        <div class="form-group">
                            {!! Form::submit('Создать', ['class' => 'btn btn-dark']) !!}
                        </div>
                        
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
