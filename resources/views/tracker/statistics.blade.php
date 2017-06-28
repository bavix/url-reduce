@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Статистика</h1>
                </div>

                <div class="panel-body">

                    <h2>Посещаемость сайта</h2>

                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <td>Всего посещений</td>
                            <td class="text-right">{{ \App\Models\TrackerModel::hostAllCount() }}</td>
                        </tr>
                        <tr>
                            <td>Посещений сегодня</td>
                            <td class="text-right">{{ \App\Models\TrackerModel::hostCount() }}</td>
                        </tr>

                        <tr>
                            <td>Всего визитов</td>
                            <td class="text-right">{{ \App\Models\TrackerModel::hitAllCount() }}</td>
                        </tr>
                        <tr>
                            <td>Визитов сегодня</td>
                            <td class="text-right">{{ \App\Models\TrackerModel::hitCount() }}</td>
                        </tr>

                        <tr>
                            <td>Сейчас онлайн</td>
                            <td class="text-right">{{ \App\Models\TrackerModel::onlineCount() }}</td>
                        </tr>
                        </tbody>
                    </table>

                </div>

                <div class="panel-body">

                    <h2>Контент сайта</h2>

                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Всего новостей</td>
                                <td class="text-right">{{ $newCount }}</td>
                            </tr>
                            <tr>
                                <td>Всего страниц</td>
                                <td class="text-right">{{ $pageCount }}</td>
                            </tr>
                            <tr>
                                <td>Всего альбомов</td>
                                <td class="text-right">{{ $albumCount }}</td>
                            </tr>
                            <tr>
                                <td>Всего опросов</td>
                                <td class="text-right">{{ $pollCount }}</td>
                            </tr>
                            <tr>
                                <td>Всего ссылок</td>
                                <td class="text-right">{{ $linkCount }}</td>
                            </tr>
                            <tr>
                                <td>Всего заявлений</td>
                                <td class="text-right">{{ $statementCount }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
@endsection
