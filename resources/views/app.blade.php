<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Default Title' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Default description for the Pantabangan website.' }}">
    <link rel="canonical" href="{{ url()->current() }}">
    @vite('resources/js/app.ts')
</head>
<body>
    @inertia
</body>
</html>
