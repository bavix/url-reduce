@extends('layouts.app')

@section('content')
    <article class="row">
        <div class="col-md-12">

            <h1>Обратная связь</h1>

            <form method="POST">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Фамилия Имя Отчество</label>
                    <input required type="text" class="form-control" id="name" name="name" placeholder="Иванов Иван Иванович">
                </div>

                <div class="form-group">
                    <label for="communication">Электронный адрес / Телефон / Адрес проживания</label>
                    <input required type="text" class="form-control" id="communication" name="communication" placeholder="Поле обратной связи">
                </div>

                <div class="form-group">
                    <label for="content">Текст</label>
                    <textarea required class="form-control" id="content" rows="9" name="content" placeholder="Введите текст"></textarea>
                </div>

                <div class="form-check">
                    <label class="form-check-label">
                        <input id="personal-data" type="checkbox" class="form-check-input" />
                        Разрешить обработку персональных данных
                    </label>
                </div>

                <button type="submit" class="btn btn-secondary" disabled data-personal>Отправить</button>

            </form>

        </div>
    </article>
@endsection
