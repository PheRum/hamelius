@extends('layouts.app')
@section('title', $furniture->title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ $furniture->title }}</h5>
                        <hr />
                        
                        {{ Form::model($furniture, [
                            'route' => ['furniture.update', $furniture->id],
                            'class'  => 'form-bordered',
                            'method'  => 'PATCH',
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
                            {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
                        </div>
                        
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
