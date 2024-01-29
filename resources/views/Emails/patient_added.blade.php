<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My clinic</title>
</head>
<body>
    <h1>Welcome, {{ $userEmail }}!</h1>
    <p>Thank you for joining our Clinic. We are excited to have you as a member of our community.</p>
    <p>Your login credentials:</p>
    <p>Email: {{ $userEmail }}</p>
    <p>Password: {{ $userPassword }}</p>
    <p>Please keep your credentials secure and do not share them with anyone.</p>
    <p>Feel free to explore all the features and services we offer. If you have any questions or need assistance, please don't hesitate to reach out to our support team.</p>
    <p>Once again, welcome aboard!</p>
    <p>Sincerely,</p>
    <p>The {{ config('app.name') }} Team</p>
</body>
</html>
