<!DOCTYPE html>
<html>
<head>
    <title>Banana Cake System</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.png">
    <style>
        body {
            margin: 0;
            font-family: Arial;
        }

        /* TOP MENU */
        .navbar {
            background: #3490dc;
            padding: 10px;
            display: flex;
            gap: 20px;
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