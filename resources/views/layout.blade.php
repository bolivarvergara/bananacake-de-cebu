<!DOCTYPE html>
<html>
<head>
    <title>Banana Cake System</title>

    <link rel="icon" type="image/x-icon" href="/images/favicon.png">

    <style>
        body {
            margin: 0;
            font-family: Arial;

            /* IMPORTANT for background layering */
            position: relative;
            min-height: 100vh;
            background-color: white;
        }

        /* FADED BACKGROUND LOGO (WATERMARK STYLE) */
        body::before {
            content: "";
            position: fixed;
            inset: 0;

            background-image: url('/images/logo.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 40%;

            opacity: 0.75;   /* 👈 recommended fade */
            z-index: -1;

            pointer-events: none;
        }

        /* TOP MENU */
        .navbar {
            background: #3490dc;
            padding: 10px;
            display: flex;
            gap: 20px;

            position: relative;
            z-index: 1;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .content {
            padding: 20px;

            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>

<!-- MENU -->
<div class="navbar">
    <a href="/dashboard">Dashboard</a>
    <a href="/products">Products</a>
    <a href="/contact">Contact</a>
    <a href="/logout">Logout</a>
</div>

<!-- PAGE CONTENT -->
<div class="content">
    @yield('content')
</div>

</body>
</html>