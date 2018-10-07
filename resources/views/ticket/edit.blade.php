@extends('layouts.app')
@section('title', $ticket->title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <h5>#{{ $ticket->id }} - {{ $ticket->title }}</h5>
                        <hr />
                        
                        {{ Form::model($ticket, [
                            'route' => ['ticket.update', $ticket->id],
                            'class'  => 'form-bordered',
                            'method'  => 'PATCH',
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
                            {!! Form::select('process', $processFileds, $ticket->process_id, [
                                'class' => 'form-control',
                            ]) !!}
                            @if ($errors->has('process'))
                                <span class="help-block">
                                   {{ $errors->first('process') }}
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            {!! Form::label('status', 'Статус') !!}
                            {!! Form::select('status', $statusFileds, $ticket->status_id, [
                                'class'       => 'form-control',
                            ]) !!}
                            @if ($errors->has('status'))
                                <span class="help-block">
                                   {{ $errors->first('status') }}
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
                            {!! Form::submit('Сохранить', ['class' => 'btn btn-success']) !!}
                        </div>
                        
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
