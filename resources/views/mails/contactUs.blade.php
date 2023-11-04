<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
    <h2>Someone contacted you!</h2>
    <p><strong>Name:</strong> {{ $mail->name }}</p>
    <p><strong>Email:</strong> {{ $mail->email }}</p>
    <p><strong>Subject:</strong> {{ $mail->subject }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $mail->message }}</p>
</body>
</html>
