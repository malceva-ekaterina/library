<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить группу</title>
</head>
<body>
    <h1>Добавить группу</h1>
    <form action="{{ route('readers.groups.store') }}" method="post">
        @csrf
        <label for="name">Название группы</label>
        <input type="text" name="name" id="name" required>
        <input type="submit" value="Создать">
    </form>
</body>
</html>
