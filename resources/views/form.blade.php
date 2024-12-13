<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма ввода данных</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Форма для ввода данных</h1>

        @if (session('success'))
            <div class="alert alert-success text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="card p-4 shadow">
            <form action="{{ route('data.store') }}" method="POST">
                @csrf
                <div class="mb-3 form-group">
                    <label for="name" class="form-label">Имя:</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="mb-3 form-group">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Отправить</button>
            </form>
        </div>

        <div class="text-center mt-4">
            <a href="{{ url('/data') }}" class="btn btn-secondary">Перейти к таблице с данными</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


