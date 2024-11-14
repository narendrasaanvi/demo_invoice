<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body>
    <h1>New Contact Form Submission</h1>
    <p><strong>Name:</strong> {{ $request->name }}</p>
    <p><strong>Email:</strong> {{ $request->email }}</p>
    <p><strong>Message:</strong> {{ $request->message }}</p>
</body>
</html>
