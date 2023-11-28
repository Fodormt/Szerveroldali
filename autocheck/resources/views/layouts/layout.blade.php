<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        /* Reset some default styles */
        body,
        h1,
        h2,
        p,
        a,
        ul,
        li,
        form,
        button {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        /* Navbar styles */
        .navbar {
            background-color: #333;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: #eee;
            text-decoration: none;
            margin-right: 15px;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #4CAF50;
        }

        /* Navbar - Left Side */
        .left-side ul {
            list-style: none;
            display: flex;
        }

        .left-side li {
            margin-right: 15px;
        }

        /* Navbar - Right Side */
        .right-side ul {
            list-style: none;
            display: flex;
        }

        .right-side li {
            margin-right: 15px;
        }

        .error {
            color: red;
        }

        /* Content styles */
        .content {
            max-width: 800px;
            margin: 20px auto;
            padding: 50px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Header styles */
        h1 {
            color: #333;
        }

        /* Title styles */
        h2 {
            color: #4CAF50;
            margin-top: 20px;
        }

        /* Body text styles */
        p {
            color: #666;
            margin-bottom: 15px;
        }

        /* Link styles */
        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Button styles */
        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Form styles */
        form {
            display: flex;
            flex-direction: column;
            max-width: 100%;
        }

        label {
            margin-bottom: 5px;
            color: #333;
        }

        input,
        textarea,
        select {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            border: none;
            /* Remove border for file input */
        }

        /* Error message styles */
        .error {
            color: red;
            margin-top: -10px;
            margin-bottom: 15px;
        }

        /* Button styles */
        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        /* File input error message styles */
        .invalid-feedback {
            color: red;
            font-size: 14px;
            display: block;
            margin-top: -10px;
            margin-bottom: 15px;
        }

        .w-5 {
            width: 30px;
            height: 30px;
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 20px 0;
        }

        .pagination-item {
            margin-right: 10px;
        }

        .pagination-link {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }

        .pagination-link:hover {
            text-decoration: underline;
        }

        .histories {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Styles for history details */
        .history_details {
            margin-bottom: 10px;
            width: 50%;
            float: left;
        }

        .container {
            height: 100px;
        }

        /* Styles for the "Search again" link */
        .history_details a {
            color: #4CAF50;
            text-decoration: none;
            margin-left: 10px;
        }

        /* Vehicle styles */
        .car_image {
            margin-top: 10px;
            width: 50%;
            float: right;
        }

        /* Styles for car image */
        .car_image img {
            width: 100px;
            height: auto;
            float: right;
            margin-left: 10px;
        }

        .vehicle_info {
            width: 50%;
            float: left;
        }

        /* Styles for the vehicles container */
        .vehicles {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 20px;
            overflow: hidden;
            height: 100px;
            /* Clear the float */
        }

        /* Styles for vehicle details */
        .vehicle_details {
            float: left;
            width: 50%;
        }

        .events {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Styles for event details */
        .events div {
            margin-bottom: 10px;
        }

        /* List styles */
        .events ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        /* List item styles */
        .events li {
            margin-left: 10px;
        }

        /* Horizontal rule styles */
        .events hr {
            margin-top: 10px;
            margin-bottom: 10px;
            border: 0;
            border-top: 1px solid #ddd;
        }



        .events2 div {
            margin-bottom: 10px;
        }

        .vehicle_info2 {
            float: left;
            width: 50%;
            display: block;
        }

        .car_image2 {
            float: right;
            width: 50%;
            display: block;
        }

        .car_image2 img {
            width: 100px;
            height: auto;
            float: right;
            margin-left: 10px;
            display: block;
        }

        /* Additional styling for spacing */
        .car_image2 {
            margin-top: 10px;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }


        /* Responsive styles */
        @media only screen and (max-width: 600px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar a,
            .navbar ul {
                margin-top: 10px;
            }

            .left-side ul,
            .right-side ul {
                flex-direction: column;
                align-items: flex-start;
            }

            .left-side li,
            .right-side li {
                margin: 0;
                margin-bottom: 10px;
            }

            .car_image img {
                width: 100%;
                /* Make the image fill the container */
                float: none;
                margin-left: 0;
            }

            .events {
                padding: 10px;
            }
        }
    </style>
    <title>Auto-check</title>
</head>

<body>
    <div class="navbar">
        <div class="left-side" id="main-navbar">
            <ul>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('histories.index') }}">Home</a>
                </li>
                @auth
                    @if (Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vehicles.index') }}">Vehicles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('events.index') }}">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vehicles.create') }}">Add vehicle</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('events.create') }}">Add event</a>
                        </li>
                    @endif
                @endauth


            </ul>
        </div>
        <div class="right-side">
            <ul>
                @auth
                    {{-- <li>{{ Auth::user()->is_premium ? 'Premium account' : '' }}</li> --}}
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a class="nav-link" onclick="event.preventDefault(); this.closest('form').submit()"
                            href="{{ route('logout') }}">Log out</a>
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Log in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
    <div class="content">
        <h1>Vehicle damage history management system</h1>
        @auth
            <h3>Welcome {{ Auth::user()->name }}</h3>
        @endauth
        <div>
            This Laravel-based system manages basic vehicle insurance information. Users can perform searches, view
            detailed event histories, access search logs, add new vehicles, edit existing vehicle details, and handle
            premium user management.
        </div>
        <h2>@yield('title')</h2>
        <div>@yield('content')</div>
    </div>
</body>

</html>
