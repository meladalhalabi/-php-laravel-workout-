<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('../../../../css/user.css')}}">
    <title>user</title>
    <style>
        body {
            background-image: linear-gradient(to right, rgb(59, 131, 238), rgb(170, 38, 247));
            background-repeat: no-repeat;
            padding-bottom: 9%;
            background-size: 100%;
            width: 99%;
            height: 100%;
            overflow: hidden;
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
            margin-top: 137px;
            padding-right: 10px;
        }

        .Content {
            width: 60%;
            background-color: #fff;
            margin: auto;
            margin-top: auto;
            padding-right: 10px;
            padding-bottom: 15px;
        }

        label {
            font-size: 20px;
            margin-left: 19%;
            margin-right: 25px;
        }

        input {
            background: rgb(226, 225, 225);
            padding: 5px 25px 5px;
            overflow: auto;
            padding: 5px 25px 5px;
            color: black;

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
            margin-left: 40%;
            border: #fff 5px solid;
            height: 50px;
            width: 20%;
            color: #fff;
            font-weight: 600;
            font-size: 90%;
            border-radius: 10px;
            letter-spacing: 0.5px;
        }

        select {
            background-color: rgb(224, 223, 223);
            padding: 5px 25px 5px;
            overflow: auto;
        }

        div.main.goals {
            margin-left: 380px;
            margin-top: -195px;
        }

        span.weight,
        span.height {
            margin-left: 400px;
        }

        option {
            background-color: rgb(0, 0, 0);
            color: white;
        }

        .Gender.and.main.goals,
        .Language.and.weight,
        .focus.area.and.height {
            margin-left: -80px;
            display: flex;
            flex-wrap: nowrap;
            align-items: center;
        }

        .Gender.and.main.goals {
            margin-top: -10px;
        }

        .weight {
            margin-left: 10%;
        }

        .height {
            margin-left: 10%;
        }

        .maingoal {
            margin-left: 12%;
        }

        select,
        input {
            font-weight: bold;
        }

        .levelDiv {
            text-align: center;
        }

        .levelDiv pre {
            margin: 0px 235px -25px 0px;
        }
    </style>
</head>

<body>

    <p class="event">ENTER USER INFORMATION</p>
    <div class="Content">
        <br>
        <br>
        <br>
        <form action="{{route('userInfo')}}" method="post">
        @csrf    
        <div class="Gender and main goals">
                <label class="select" for="Gender">
                    <pre>User Gender </pre>
                </label>
                <select name="Gender" id="Gender">
                    <option value="M">M</option>
                    <option value="F">F</option>
                </select>
                <br>
                <br>
                <br>
                <label class="label maingoal" for="main goals" class="select">
                    <pre>Main Goal</pre>
                </label>
                <select name="main goals" id="main goals">
                    <option value="build the body">build the body</option>
                    <option value="save on the body">save on the body</option>
                    <option value="weight loss">weight loss</option>
                </select>
                <br>
                <br>
                <br>
            </div>
            <div class="Language and weight">
                <label class="select" for="Language">
                    <pre>Language  </pre>
                </label>
                <select name="Language" id="Language">
                    <option value="E">English</option>
                    <option value="A">Arabic</option>
                </select>
                <br>
                <br>
                <br>
                <label class="label weight" for="weight">
                    <pre>Weight</pre>
                </label>
                <input type="number" min="30" max="200" checked name="weight" id="weight">
                <br>
                <br>
                <br>
            </div>
            <div class="focus area and height">
                <label for="focus area" class="select">
                    <pre>Focus Area</pre>
                </label>
                <select name="focus area" id="focus area">
                    <option value="all body">all body</option>
                    <option value="noon">noon</option>
                    <option value="arms">arms</option>
                    <option value="belly">belly</option>
                    <option value="chest">chest</option>
                    <option value="feet">feet</option>
                </select>
                <br>
                <br>
                <br>
                <label class="label height" for="height">
                    <pre>Height</pre>
                </label>
                <input type="number" min="60" max="250" checked name="height" id="height">
                <br>
                <br>
                <br>
            </div>

            <div class="levelDiv">
                <label for="level" class="select">
                    <pre>Level</pre>
                </label>
                <select name="level" id="level">
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </select>
                <br>
                <br>
                <br>
            </div>
            <input type="hidden" id="token"  name="token" value="{{$user['token']}}">
            <input type="hidden" id="pocketNumber" name="pocketNumber" value="{{$user['pocket_number']}}">
            <br>
            <button type="submit">Submit</button>
            <br>
        </form>
</body>

</html>