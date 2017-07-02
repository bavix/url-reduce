<!DOCTYPE html>
<html>
    <head>
        <title>Заявление от {{ $parentName }}</title>
        <meta charset="utf-8" />

        <link href="{{ asset2('node_modules/bootstrap/dist/css/bootstrap.min.css')  }}" rel="stylesheet"/>
        <style>
            p {
                margin: 0;
                text-indent: 2rem;
                text-align: justify;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">

            <div class="row">
                <div class="col-1"></div>
                <div class="col-11">

                    <header class="row">
                        <div class="col-6"></div>
                        <div class="col-6">
                            <div class="row">
                                <span>Директору&nbsp;МБУ&nbsp;ДО&nbsp;СЮТ</span>
                            </div>
                            <div class="row"><span>М.Ю.&nbsp;Беспалову</span></div>
                            <div class="row">
                                <span>родителя (законного представителя)</span>
                            </div>
                            <div class="row">
                                <span><strong>{{ $parentName }}</strong></span>
                            </div>
                            <div class="row">
                                <span>проживающего по адресу: <strong>{{ $residentialAddress }}</strong></span>
                            </div>
                            <div class="row">
                                <span>зарегистрированного по адресу: <strong>{{ $registrationAddress }}</strong></span>
                            </div>
                            <div class="row">
                                <span>паспорт серия <strong>{{ $passportSerial }}</strong> № <strong>{{ $passportNumber }}</strong></span>
                            </div>
                            <div class="row">
                                <span>дата выдачи: <strong>{{ $passportDate }}</strong></span>
                            </div>
                            <div class="row">
                                <span>кем выдан: <strong>{{ $passportFrom }}</strong></span>
                            </div>
                            <div class="row">
                                <span>код подразделения: <strong>{{ $passportDivision }}</strong></span>
                            </div>
                            <div class="row">
                                <span>телефон: <strong>{{ $phone }}</strong></span>
                            </div>
                        </div>
                    </header>

                    <br/>
                    <br/>

                    <main class="row">
                        <div class="col-12 text-center">
                            <p></p>
                            <h5>ЗАЯВЛЕНИЕ</h5>
                            <br/>
                        </div>
                        <p class="col-12">
                            <span>Прошу зачислить моего ребенка <strong>{{ $childrenName }}</strong>
                            документ <strong>{{ $childrenDocType }}</strong> серия <strong>{{ $childrenDocSerial }}</strong>
                            № <strong>{{ $childrenDocNumber }}</strong>
                            обучающегося школы <strong>{{ $childrenSchool }}</strong>
                            класса <strong>{{ $childrenClass }}</strong>
                            в объединение «<strong>{{ $type }}</strong>» МБУ&nbsp;ДО&nbsp;СЮТ.</span>
                        </p>
                        <p class="col-12">
                            <span>Обязуюсь контролировать посещение моим ребенком объединения МБУ ДО СЮТ.</span>
                        </p>
                        <p class="col-12">
                            <span>С расписанием кружка, Уставом организации, режимом работы и
                                правилами внутреннего распорядка ознакомлен(а).</span>
                        </p>
                    </main>

                    <br/>
                    <br/>

                    <footer class="row">
                        <div class="col-9">
                            «_____» ______________ г.
                        </div>
                        <div class="col-3 float-right">
                            _____________________
                            (подпись)
                        </div>
                    </footer>

                </div>
            </div>

        </div>
    </body>
</html>
