@extends('layout')

@section('content')
    <div class="content-wrapper" style="min-height: 1000px; margin-left: 150px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{route('main')}}"><h1>Список UUID</h1></a>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if ($result['status'] === 'ok')
                            <div class="alert alert-success">
                                {{$result['msg']}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </section>

        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">UUIDs</h3>

                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 5%">
                                №
                            </th>
                            <th style="width: 20%">
                                ID
                            </th>
                            <th style="width: 50%">
                                UUID
                            </th>
                            <th style="width: 25%">
                                дата генерации
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($uuids as $uuid)
                            <tr>
                                <td>
                                    {{$count++}}
                                </td>
                                <td>
                                    <a>
                                        {{$uuid['id']}}
                                    </a>
                                </td>
                                <td>
                                    <p>{{$uuid['uuid']}}</p>
                                </td>
                                <td>
                                    <p>{{$uuid['created']}}</p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="card-footer clearfix">
                @if(count($uuids) > 1)
                    {{$uuids->links()}}
                @endif
            </div>
        </section>

    </div>
@endsection
