<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Читатели</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <main>
        <h1>Добавить читателя</h1>
        <form action="{{ route('readers.readers.store') }}" method="post">
            @csrf
            <div>
                <label for="lastname">Фамилия</label>
                <input type="text" name="lastname" id="lastname" required>
            </div>
            <div>
                <label for="firstname">Имя</label>
                <input type="text" name="firstname" id="firstname" required>
            </div>
            <div>
                <label for="patronymic">Отчество</label>
                <input type="text" name="patronymic" id="patronymic">
            </div>
            <div>
                <label for="type_of_reader">Тип читателя</label>
                <select name="type_of_reader" id="type_of_reader">
                    <option value="teacher" selected>Учитель</option>
                    <option value="student">Студент</option>
                    <option value="other">Другое</option>
                </select>
            </div>
            <div id="group" style="display: none">
                <label for="group_id">Группа</label>
                <select name="group_id" id="group_id">
                    @foreach ($groups as $group )
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
                <script>
                    document.getElementById('type_of_reader').addEventListener('change',
                    function() {
                        let group = document.getElementById('group');
                        let group_id = document.getElementById('group_id');
                        if (this.value === 'student') {
                            group.style.display = 'block';
                            group_id.disabled = false;
                        } else {
                            group.style.display = 'none';
                            group_id.disabled = true;
                        }
                    })
                </script>
            </div>
            <input type="submit" value="Добавить">
        </form>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </main>
</body>
</html>
