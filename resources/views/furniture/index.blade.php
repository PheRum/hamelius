@extends('layouts.app')
@section('title', 'Заявки')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('furniture.create') }}" class="btn btn-dark mb-2">
                            Добавить
                        </a>
                        
                        @if (count($data))
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-vcenter">
                                    <tr>
                                        <th class="text-center" style="width: 5%;">#</th>
                                        <th class="text-center">Название</th>
                                        <th class="text-center" style="width: 15%;"></th>
                                    </tr>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td class="text-center">{{ $row->id }}</td>
                                            
                                            <td>{{ $row->title }}</td>
                                            
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('furniture.edit', $row->id) }}"
                                                       class="btn btn-primary btn-sm">
                                                        Edit
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
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
