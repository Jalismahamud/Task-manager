<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Tasks-Management</title>
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css')}}">

</head>
<body class="bg-slate-200">
<h2 class="text-6xl py-6 bg-gray-100 font-serif hover:font-serif text-center text-green-600">Task Management</h2>

{{$slot}}
</body>
</html>

