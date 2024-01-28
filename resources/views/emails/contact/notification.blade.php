<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Notification</title>
</head>
<body>
    <p>Новый пользователь:</p>
    <p>Имя: {{ $contact->name }}</p>
    <p>Телефон: {{ $contact->phone }}</p>
    <p>Почта: {{ $contact->email }}</p>
</body>
</html>
