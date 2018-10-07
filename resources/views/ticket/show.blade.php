@extends('layouts.app')
@section('title', $ticket->title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">#{{ $ticket->id }} - {{ $ticket->title }}</h5>
                        <hr />
                        
                        <dl class="row">
                            <dt class="col-sm-2">Статус:</dt>
                            <dd class="col-sm-10">
                                @status(['id' => $ticket->status_id])
                                //
                                @endstatus
                            </dd>
                            
                            <dt class="col-sm-2">Процесс:</dt>
                            <dd class="col-sm-10">
                                @process(['id' => $ticket->process_id])
                                //
                                @endprocess
                            </dd>
                            
                            <dt class="col-sm-2">Юзер:</dt>
                            <dd class="col-sm-10">
                                {{ $ticket->user->name }}
                            </dd>
                            
                            <dt class="col-sm-2">Мебель:</dt>
                            <dd class="col-sm-10">
                                <ul class="pl-3">
                                    @foreach ($ticket->furniture as $row)
                                        <li>{{ $row->title }}</li>
                                    @endforeach
                                </ul>
                            </dd>
                        </dl>
                        
                        <hr />
                        <div class="btn-group pull-right">
                            @can('update', $ticket)
                                <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-secondary">
                                    Редактировать
                                </a>
                            @endcan
                            @can('delete', $ticket)
                                <a href="{{ route('ticket.delete', $ticket->id) }}" class="btn btn-dark"
                                   onclick="event.preventDefault();
                                   document.getElementById('ticket-delete-form').submit();">
                                    Удалить
                                    <form id="ticket-delete-form" action="{{ route('ticket.delete', $ticket->id) }}"
                                          method="POST" style="display: none;">
                                        <input name="_method" type="hidden" value="DELETE">
                                        @csrf
                                    </form>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
