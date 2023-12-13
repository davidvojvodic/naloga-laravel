<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Izberi naključno ime</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f7f7f7;
        }

        .container {
            padding-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .table {
            margin-top: 20px;
            background-color: #fff;
        }

        .table thead th {
            background-color: #eee;
        }

        .btn-primary {
            background-color: #0056b3;
            border: none;
        }

        .btn-primary:hover {
            background-color: #003d82;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Izberi naključno ime</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/names/select') }}">
                            @csrf
                            <div class="form-group">
                                <label for="names">Vpišite ime (vsako ime je naj v svoji vrstici):</label>
                                <textarea class="form-control" id="names" name="names" rows="10">{{ old('names') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Izberi naključno</button>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h2 class="card-title">Izbrana imena</h2>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ime</th>
                                    <th>Ustvarjeno</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($selectedNames as $name)
                                    <tr>
                                        <td>{{ $name->name }}</td>
                                        <td>{{ $name->created_at->format('Y-m-d H:i:s') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
