<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <style>
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .popup {
            background: white;
            padding: 60px 200px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .close-btn {
            margin-top: 40px;
            padding: 8px 25px;
            background: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="overlay" id="popup">
        <div class="popup">
            <h1 id='title'></h1>
            <p id='content'></p>

            <button class="close-btn" onclick="GoBackPage()">OK</button>
        </div>
    </div>

    <script>
        var ErrorMassage = "{{$Msg}}";
        var ErrorCode = "{{$Code}}";
        var Route = "{{$Route}}"
        document.getElementById('content').textContent = ErrorMassage;
        document.getElementById('title').textContent = ErrorCode;

        function GoBackPage() {
            if (Route == '')
                window.location.href = "{{URL('/')}}";
            else if (Route == 'login')
                window.location.href = "{{URL('/loginView')}}";
        }
    </script>
</body>


</html>