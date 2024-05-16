<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Ruangan</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div id="app">
        <h1>Peminjaman Ruangan di FILKOM UB</h1>
        
        <!-- Komponen Vue untuk daftar ruangan -->
        <ruangan-list></ruangan-list>
        
        <!-- Komponen Vue untuk formulir peminjaman -->
        <peminjaman-form></peminjaman-form>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
