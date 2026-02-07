@props([
  'title' => 'default value'
])

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Christmas List App - {{ $title }}</title>
</head>
<body>
  <x-nav />
  <main>
    {{ $slot }}
  </main>
</body>
</html>