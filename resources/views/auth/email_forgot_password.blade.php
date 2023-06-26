<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>

    <p>Hello {{ $email }},</p>     
    
    <p>
        Click on this link <a href="http://localhost:8000/reset_password?page={{$employee_code}}">CLICK HERE</a> , to reset your password.
    </p>

</body>
</html>