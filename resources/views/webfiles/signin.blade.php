<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        html {
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        body {
            background-image: linear-gradient(to right, rgb(59, 131, 238), rgb(170, 38, 247));
            background-repeat: no-repeat;
            padding-bottom: 12%;
            overflow: hidden;
            height: 100%;
            font-weight: bold;
        }

        P.event {
            text-align: center;
            font-size: 30px;
            color: #fff;
            background-color: black;
            width: 60%;
            margin: auto;
            height: fit-content;
            padding-top: 1.5%;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding-bottom: 5px;
            margin-top: 100px;
            padding-right: 10px;
        }

        .Content {
            width: 60%;
            background-color: #fff;
            margin: auto;
            margin-top: auto;
            padding-right: 10px;
            padding-bottom: 15px;
            text-align: center;
        }

        span {
            font-size: 20px;
            margin-right: 25px;
        }

        input {
            background: rgb(226, 225, 225);
            padding: 5px 25px 5px;
            overflow: auto;
        }

        input {
            border-radius: 10px;
            border: 5px solid rgb(238, 42, 3);
            color: blue;
            padding: 7px 20px;
            margin: 20px;
            font-weight: bold;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            -ms-border-radius: 10px;
            -o-border-radius: 10px;
        }

        input:hover {
            background-color: rgb(255, 0, 0);
            color: white;
            font-weight: bold;

        }

        input.email {
            padding: 5px 25px 5px;
            color: black;
            margin-left: 50px;
        }

        .Username {
            display: flex;
        }

        .p {
            margin-left: 19%;
            font-weight: 700;
        }

        .login {
            text-align: center;
            border: #fff 5px solid;
            height: 50px;
            width: 20%;
            color: #fff;
            font-weight: 600;
            font-size: 90%;
            border-radius: 10px;
            letter-spacing: 0.5px;
            background-color: green;
        }

        input:hover::placeholder {
            color: white;
        }

        input::placeholder {
            color: rgb(54, 51, 51);
        }

        a {
            text-decoration: none;
            text-align: center;
            border: #fff 5px solid;
            height: 50px;
            width: 20%;
            color: #fff;
            font-weight: 600;
            font-size: 90%;
            border-radius: 10px;
            letter-spacing: 0.5px;
            background-color: red;
            padding : 10px;
            margin-left: 50px
        }
    </style>
</head>

<body>
    <p class="event">LOGIN</p>
    <form action="{{route('login')}}" method="get">
        @csrf
        <div class="Content">
            <br>
            <br>
            <br>
            <span class="email">Email</span>
            <input type="email" name="email" class="email" required placeholder="Please enter your email">
            <br>
            <br>
            <!-- <br> -->
            <span class="email">Password</span>
            <input type="password" name="password" min="8" max="25" class="password" required placeholder="Please enter password">
            <br>
            <br>
            <!-- <br> -->
            <button class="login" type="submit">Login</button>
            <a href="{{url('/')}}"> return </a>
            <br>
        </div>
    </form>

</body>

</html>