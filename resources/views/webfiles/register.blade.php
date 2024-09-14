<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        html {
            width:100%;
            height:100vh;
            overflow: hidden;
        }
        body {
            position: relative;
            background-image: linear-gradient(to right, rgb(59, 131, 238), rgb(170, 38, 247));
            background-repeat: no-repeat;
            padding-bottom: 12%;
            overflow: hidden;
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
            font-weight: bold;
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

        button , .login {
            background-color: red;
            text-align: center;
            border: #fff 5px solid;
            height: 50px;
            width: 20%;
            color: #fff;
            font-weight: 600;
            font-size: 90%;
            border-radius: 10px;
            letter-spacing: 0.5px;
        }

        .login {
            background-color: green;
            text-decoration: none;
            padding:12px 42px;
        }

        input:hover::placeholder {
            color: white;
        }

        input::placeholder {
            color: rgb(54, 51, 51);
        }

    </style>
</head>

<body>
    <!-- <img src="{{URL::asset('3.jpeg')}}"  height="200px" width="200px"> -->
    <p class="event">REGISTER</p>
    <form action="{{route('register')}}" method="post">
        @csrf
        <div class="Content">
            <br>
            <br>
            <br>
            <span class="email">email</span>
            <input type="email" name="email" class="email" required  placeholder="Please enter your email" >
            <br>
            <br>
            <span class="email">password</span>
            <input type="password" name="password" min="8" max="25" class="password" required placeholder="Please enter password">

            <br>
            <br>
            <button class="register" type="submit">Register</button>
            <a class="login" href="{{route('LoginView')}}">Login</a>
            <br>
        </div>
    </form>

</body>

<!-- .............................................. -->


</html>