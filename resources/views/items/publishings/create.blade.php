<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить издательский дом</title>
</head>
<body>
    <h1>Добавить издательский дом</h1>
    <form action="{{ route('items.publishings.store') }}" method="post">
        @csrf
        <label for="name">Название Издательства</label>
        <input type="text" name="name" id="name" required>
        <input type="submit" value="Создать">
    </form>
</body>
</html>
