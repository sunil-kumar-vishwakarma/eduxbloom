<!-- resources/views/send-otp.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send OTP</title>
</head>
<body>
    <h1>Send OTP</h1>

   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send OTP</title>
</head>
<body>
    <form action="/send-otp" method="POST">
        @csrf
        <label for="phone_number">Enter Phone Number:</label>
        <input type="text" name="phone_number" required>
        <button type="submit">Send OTP</button>
    </form>
</body>
</html>

</body>
</html>
