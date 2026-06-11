<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.png">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;

            height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            position: relative;
            background-color: white;
        }

        /* FADED BACKGROUND IMAGE */
        body::before {
            content: "";
            position: absolute;
            inset: 0;

            background-image: url('/images/logo.png');
            background-size: 50%;
            background-position: center;
            background-repeat: no-repeat;

            opacity: 0.75;
            z-index: 0;
        }

        /* WELCOME TEXT (ADDED) */
        .header-title {
            position: absolute;
            top: 20px;
            left: 25px;

            font-size: 18px;
            font-weight: bold;
            color: #333;

            z-index: 2;

            /* optional for better visibility */
            background: rgba(255, 255, 255, 0.6);
            padding: 6px 10px;
            border-radius: 6px;
        }

        /* LOGIN BOX */
        .login-box {
            position: relative;
            z-index: 1;

            background: rgba(255, 255, 255, 0.92);
            padding: 30px;
            border-radius: 12px;
            width: 320px;
            text-align: center;

            box-shadow: 0px 0px 20px rgba(0,0,0,0.3);
        }

        h2 {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #3490dc;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #2779bd;
        }

    </style>
</head>

<body>

<!-- ADDED WELCOME TEXT -->
<div class="header-title">
    Welcome to Banana Cake De Cebu
</div>

<div class="login-box">
    <h2>Login</h2>

    <form method="POST" action="/login">
        @csrf

        <input type="text" name="username" value="Guest" placeholder="Username">
        <input type="password" name="password" value="guest" placeholder="Password">

        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>