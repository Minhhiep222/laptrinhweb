<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">description</th>
    </tr>
  </thead>
  <tbody>
    @foreach($favorities as $favorite)
    <tr>
      <th scope="row">{{ $favorite->name }}</th>
      <td>{{ $favorite->description }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>