<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul }}</title>
</head>
<body style="margin: 0; padding: 0">
    <iframe src="{{ asset('file/'.$pdf_file) }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
</body>
</html>