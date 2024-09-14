<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tabel.css">
    <title>Diet List</title>
</head>

<body>
    <header>
        <ul>
            <li><a href="Home.html">Homepage</a></li>
            <li><a href="التمارين  المدفوعة.html">Paid Services</a></li>
            <li><a href="tabel.html">Food</a></li>
            <li><a href="bhg">Reports</a></li>
            <li><a href="hgy">Settings</a></li>
        </ul>
    </header>
    </header>
    <table class="food_table">
        <thead>
            <tr>
                <th>Foods</th>
                <th>Quantities</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>orange</td>
                <td>2 peice</td>
            </tr>
            <tr>
                <td>apple</td>
                <td>1 apple</td>
            </tr>
            <tr>
                <td>milk</td>
                <td>1 liter</td>
            </tr>
            <tr>
                <td>banana</td>
                <td>800g</td>
            </tr>
        </tbody>
    </table>
</body>

<style>
    body {
        background-image: linear-gradient(130deg, rgb(8, 187, 157), rgb(123, 6, 190));
        background-repeat: no-repeat;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: start;
        margin: 0px !important;
    }

    thead {
        background-image: linear-gradient(260deg, rgb(255, 0, 0), rgb(139, 10, 245));
    }

    tbody {
        background-image: linear-gradient(260deg, rgb(253, 93, 1), rgb(238, 255, 0));
    }

    .food_table {
        text-align: center;
        margin: auto;
        border-collapse: collapse;
    }

    th {
        color: white;
        border: 2px solid rgb(3, 6, 202);
    }

    td,
    th {
        border: 2px black solid;
        width: 400px;
        height: 50px;
        margin: 0;
        font-size: 20px;
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
        justify-content: space-between;
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