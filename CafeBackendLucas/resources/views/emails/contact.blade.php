<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $contact->subject }}</title>
</head>
<body>
    <h1>Nieuw contactbericht</h1>
    <p><strong>Naam:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Onderwerp:</strong> {{ $contact->subject }}</p>
    <p><strong>Bericht:</strong></p>
    <p>{{ $contact->message }}</p>
</body>
</html>
