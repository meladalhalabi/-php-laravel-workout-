<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="التمارين المدفوعة.css">
    <title>التمارين المدفوعة</title>
</head>

<body>
    <header>
        <ul>
            <li><a href="home.html">Homepage</a></li>
            <li><a href="paid.html">Paid Services</a></li>
            <li><a href="tabel.html">Food</a></li>
            <li><a href="reports.html">Reports</a></li>
            <li><a href="settings.html">Settings</a></li>
        </ul>
    </header>
    <a class="all tbody " href="الخدمات المدفوعة.html">
        تخفيف الوزن
    </a>
    <a href="الخدمات المدفوعة.html" class="tbody">
        زيادة الطول
    </a>
</body>


<style>
    body {
        width: 99%;
        background-image: linear-gradient(60deg, rgb(8, 187, 157), rgb(123, 6, 190));
        background-repeat: no-repeat;
        display: flex;
        flex-direction: column;
        margin-top: 0px;
        flex-wrap: wrap;
        margin-left: 0px;
    }

    .tbody {
        width: 600px;
        padding: 50px 20px;
        background-image: linear-gradient(to left, rgb(20, 252, 252), rgb(255, 30, 217));
        background-repeat: no-repeat;
        border-radius: 12px;
        margin-left: auto;
        text-decoration: none;
        text-align: center;
        font-size: 30px;
        color: black;
        margin-right: auto;
        margin-bottom: 20px;
        margin-top: 100px;
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        -ms-border-radius: 12px;
        -o-border-radius: 12px;
    }

    .tbody:hover {
        background-image: linear-gradient(260deg, rgb(253, 93, 1), rgb(238, 255, 0));
        background-repeat: no-repeat;
        color: black;
    }

    header {
        background-color: white;
        list-style: none;
        width: 100vw;
        height: 55px;
        position: fixed;
        margin-bottom: 30px;
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
</style>

</html>