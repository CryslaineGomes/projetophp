<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container text-center mt-5">
    <h1>Bem-vindo, <?= session()->get('user') ?></h1>
    <a href="/logout" class="btn btn-danger mt-3">Sair</a>
</body>
</html>
