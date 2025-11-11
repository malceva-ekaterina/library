<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Журнал выдачи</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <x-header></x-header>
    <main>
        <h1>Журнал выдачи</h1>
        <a href="{{ route('accounting.issuance') }}">Создать выдачу</a>
        <table border="1" style="border-collapse: collapse">
            <tr>
                <th>Экземпляр ID</th>
                <th>Экземпляр</th>
                <th>Читатель</th>
                <th>Дата выдачи</th>
                <th>Дата возврата</th>
                <th>Выданое кол-во экземпляров</th>
                <th>Оформить возврат</th>
            </tr>
            @foreach ($books_actions as $books_action)
                <tr>
                    <td>{{ $books_action->book->id }}</td>
                    <td>{{ $books_action->book->fullname }}</td>
                    <td>{{ $books_action->reader->lastname . ' ' . $books_action->reader->firstname  . ' ' . $books_action->reader->patronymic }}</td>
                    <td>{{ $books_action->get_date}}</td>
                    <td>{{ $books_action->return_date ?? '-' }}</td>
                    <td>{{ $books_action->count }}</td>
                    <td>
                        @if ($books_action->count == 0)
                            возврат не требуется
                        @else
                            <a href="{{ route('accounting.return', $books_action->id) }}">возврат</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </main>
</body>
</html>
