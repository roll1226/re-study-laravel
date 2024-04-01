<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TasksList</title>
</head>

<body>
    @foreach ($tasks as $task)
        <p>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">
                {{ $task->name }}
            </a>
        </p>
    @endforeach
</body>

</html>
