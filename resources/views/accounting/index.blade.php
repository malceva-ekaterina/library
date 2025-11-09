<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Журнал выдачи</title>
</head>
<body>
    <h1>Журнал выдачи</h1>
    <table>
        <tr>
            <th>Экземпляр</th>
            <th>Читатель</th>
            <th>Дата выдачи</th>
            <th>Дата возрата</th>
            <th>Выданое кол-во экземпляров</th>
        </tr>
        @foreach ($collection as $item)

        @endforeach
    </table>
</body>
</html>
