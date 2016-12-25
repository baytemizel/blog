@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('statusMsg'))
        <div class="alert alert-info">
            {{ session('statusMsg') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(count($pages) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Slug</th>
                                    <th>Başlık</th>
                                    <th>Taglar</th>
                                    <th>Durum</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <td>{{ $page->slug }}</td>
                                        <td>{{ $page->title }}</td>
                                        <td>{{ $page->tags }}</td>
                                        <td>{{ $page->status }}</td>
                                        <td>
                                            <a href="{{ url('page/edit/'.$page->id) }}"></a>
                                        </td>
                                    </tr>

                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
             @else
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted text-center">Henüz bir sayfa bulunmamaktadır. <a href="{{ url('page/create') }}" class="btn btn-link">Yeni oluşturmak için tıklayın</a></p>
                            </div>
                        </div>
                    </div>
                </div>
             @endif
        </div>
    </div>
</div>
@endsection
