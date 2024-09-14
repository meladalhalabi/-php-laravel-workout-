<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="الخدمات المدفوعة.css">
    <title>الخدمات المدفوعة</title>
</head>

<body>
    <header>
        <ul>
            <li><a href="Home.html">Homepage</a></li>
            <li><a href="التمارين  المدفوعة.html">Paid Services</a></li>
            <li><a href="tabel.html" مات>Food</a></li>
            <li><a href="bhg">Reports</a></li>
            <li><a href="hgy">Settings</a></li>
        </ul>
    </header>
    <p class="event">REGISTER</p>
    <form action="التمارين  المدفوعة.html" method="post">
        <div class="Content">
            <br>
            <br>
            <br>
            <span class="email">Email</span>
            <input type="email" class="email" required placeholder="Please enter your email">
            <br>
            <br>
            <span class="email">Password</span>
            <input type="password" class="password" required placeholder="Please enter password">
            <br>
            <br>
            <span class="email">poket value</span>
            <input title="Please enter poket value" type="number" min="1000" max="2000" class="password poket" required placeholder="Please enter poket value">
            <br>
            <br>
            <button class="register" type="submit">Register</button>
            <br>
        </div>
    </form>
</body>

<style>
    header {
        background-color: white;
        list-style: none;
        width: 100vw;
        height: 55px;
        position: fixed;
        margin-bottom: 30px;
        margin-top: -100px;
    }

    ul {
        list-style: none;
        display: flex;
        justify-content: space-around;
    }

    header ul li a {
        text-decoration: none;
        font-weight: bold;
        font-size: 25px;
        color: black;
        padding: 45px 45px 7px 45px;
    }

    ul li a:hover {
        color: red;
        background-image: linear-gradient(to left, rgb(190, 252, 20), rgb(30, 255, 165));
        background-repeat: no-repeat;
    }

    body {
        background-image: linear-gradient(60deg, rgb(8, 187, 157), rgb(123, 6, 190));
        background-repeat: no-repeat;
        padding-bottom: 12%;
        background-size: 100%;
        width: 99%;
        height: 100%;
        overflow: hidden;
        margin: 0px !important;
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

    button {
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
    }

    input:hover::placeholder {
        color: white;
    }

    input::placeholder {
        color: rgb(54, 51, 51);
    }

    .pocet {
        padding-left: 200px !important;
    }
</style>

</html>