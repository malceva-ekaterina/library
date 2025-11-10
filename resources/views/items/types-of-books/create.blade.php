<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить тип экземпляров</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <main>
        <h1>Добавить тип экземпляров</h1>
        <form action="{{ route('items.types-of-books.store') }}" method="post">
            @csrf
            <label for="name">Название типа экземпляра</label>
            <input type="text" name="name" id="name" required>
            <input type="submit" value="Создать">
        </form>
    </main>
</body>
</html>
