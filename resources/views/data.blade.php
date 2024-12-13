<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица данных</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Сохраненные данные</h1>

        <div class="table-responsive card p-3 shadow">
            <table class="table table-striped table-hover text-center table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Имя</th>
                        <th>Email</th>
			<th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
			    <td>{{ $item->email }}</td>
			    <td>
    				<a href="{{ route('data.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

    				<form action="{{ route('data.destroy', $item->id) }}" method="POST" style="display:inline;">
        			    @csrf
        			    @method('DELETE')
        			    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
    				</form>
			    </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="{{ url('/') }}" class="btn btn-primary">Вернуться к форме</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



