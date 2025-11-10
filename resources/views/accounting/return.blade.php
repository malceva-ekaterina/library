<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Оформить возрат</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <main>
        <h1>возврат книг</h1>
        <p>Экземпляры: {{ $books_action->book->fullname }}</p>
        <p>Читатель: {{ $books_action->reader->lastname }}</p>
        <p>Кол-во выданных экземпляров : {{ $books_action->count }}</p>
        <form action="{{ route('accounting.returnBooks', $books_action->id) }}" method="post">
            @csrf
            <div>
                <label for="return_date">Дата возврата</label>
                <input type="date" name="return_date" id="return_date">
            </div>
            <div>
                <label for="count">Кол-во экземпляров</label>
                <input type="number" name="count" id="count">
            </div>
            <input type="submit" value="Вернуть">
        </form>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </main>
</body>
</html>
