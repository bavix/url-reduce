<!DOCTYPE HTML>
<html>
<head>
    <meta content="charset=utf-8"/>
    <title>ОБРАЩЕНИЕ ГРАЖДАНИНА(КИ) {{ $name }}</title>
    <style type="text/css">
        @page {
            margin-left: 1.18in;
            margin-right: 0.59in;
            margin-top: 0.79in;
            margin-bottom: 0.79in
        }

        p {
            margin-bottom: 0.08in;
            direction: ltr;
            widows: 2;
            orphans: 2
        }
    </style>
</head>
@php($carbon = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $created_at))
<body lang="ru-RU" link="#0000ff" dir="LTR">
    <p style="margin-bottom: 0.14in"><strong>ОБРАЩЕНИЕ ГРАЖДАНИНА(КИ):</strong> {{ $name }}</p>
    <p style="margin-bottom: 0.14in"><strong>ОБРАЩЕНИЕ ПОДАНО:</strong> {{ $carbon->format('d.m.Y H:i') }}</p>
    <p style="margin-bottom: 0.14in"><strong>КОНТАКТНЫЕ ДАННЫЕ:</strong> {{ $communication }}</p>
    <p style="margin-bottom: 0.14in"><strong>ТЕКСТ ОБРАЩЕНИЯ:</strong></p>
    <p style="margin-bottom: 0.14in">{{ $content }}</p>
    <script>window.print()</script>
</body>
</html>
