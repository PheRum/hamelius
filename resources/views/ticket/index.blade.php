@extends('layouts.app')
@section('title', 'Заявки')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('ticket.create') }}" class="btn btn-dark mb-2">
                            Новая заявка
                        </a>
                        
                        @if (count($data))
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <tr>
                                        <th class="text-center" style="width: 5%;">#</th>
                                        <th class="text-center">Статус</th>
                                        <th class="text-center">Процесс</th>
                                        <th class="text-center">Заявка</th>
                                        <th class="text-center">Юзер</th>
                                        <th class="text-center" style="width: 15%;"></th>
                                    </tr>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td class="text-center">{{ $row->id }}</td>
                                            
                                            <td class="text-center" style="font-size: 16px;">
                                                @status(['id' => $row->status_id])
                                                //
                                                @endstatus
                                            </td>
                                            
                                            <td>
                                                @process(['id' => $row->process_id])
                                                //
                                                @endprocess
                                            </td>
                                            
                                            <td>
                                                <a href="{{ route('ticket.show', $row->id) }}">
                                                    {{ $row->title }}
                                                </a>
                                            </td>
                                            
                                            <td>{{ $row->user->name }}</td>
                                            
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('ticket.edit', $row->id) }}"
                                                       class="btn btn-primary btn-sm">
                                                        Edit
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            
                            <div class="row justify-content-center">
                                {{ optional($data)->links() }}
                            </div>
                        @else
                            <p><b>Информация отсутствует</b></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
