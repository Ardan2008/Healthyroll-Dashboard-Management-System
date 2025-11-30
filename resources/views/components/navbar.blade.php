<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('image/lg.png') }}">
    <title>Healthyroll Indonesia</title>
</head>
<body>
    <!-- Navbar -->
    <div class="container">
        <div class="navigation">
            <ul>
                <!-- Logo -->
                <li>
                    <a href="#">
                        <span class="icon-logo">
                            <img src="../../image/lg.png" alt="logo" class="user">
                        </span>
                        <span class="title-logo"><strong>Healthyroll Indonesia</strong></span>
                    </a>
                </li>

                <!-- Home -->
                <li>
                    <a href="/home">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Home</span>
                    </a>
                </li>

                <!-- About -->
                <li>
                    <a href="/about">
                        <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                        <span class="title">About</span>
                    </a>
                </li>

                <!-- Product -->
                <li>
                    <a href="/product">
                        <span class="icon"><ion-icon name="cube-outline"></ion-icon></span>
                        <span class="title">Product</span>
                    </a>
                </li>

                <!-- Order -->
                <li>
                    <a href="/order">
                        <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                        <span class="title">Order</span>
                    </a>
                </li>

                <!-- Messages -->
                <li>
                    <a href="/messages">
                        <span class="icon"><ion-icon name="chatbubble-outline"></ion-icon></span>
                        <span class="title">Messages</span>
                    </a>
                </li>

                <!-- Sign Out -->
                <li>
                    <a href="/login">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
