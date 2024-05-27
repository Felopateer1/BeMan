<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeMan</title>
    <style>
          body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            color: #003366;
            
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            text-align: center;
            color: #003366;
        }
        #timer {
            text-align: center;
            background-color: #e6f2ff;
            padding: 20px;
            border: 2px solid #003366;
            border-radius: 30px;
            box-shadow: 0 0 10px rgba(0, 51, 102, 0.5);
            max-width: 300px;
            margin-top: 20px;
            justify-content:center;
            margin:0 auto;
        }
        #timer p {
            margin: 10px 0;
            font-size: 1.5em;
            font-weight: bold;
        }
        #startButton {
            margin: auto;
            background-color: #0073e6;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align:center;
            font-size: 1em;
            display:block;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        #startButton:hover {
            background-color: #005bb5;
        }
     .othertime{
        display:flex;
     }.days{
        font-size:40px;
     }
    </style>
</head>
<body><br>
    <div id="timer">
        <div class="days">
        <p id="days">0 Days</p>
        </div>
        <div class="othertime">
        <p id="hours">0 Hours</p>
        <p id="minutes">0 Minutes</p>
        <p id="seconds">0 Seconds</p>
        </div>
    
    </div><br>
    <div class="buttonstart">
    <button id="startButton">Re/Start Timer</button>

    </div>


    <script>
        document.getElementById('startButton').addEventListener('click', function() {
            fetch('start.php')
                .then(response => response.json())
                .then(data => console.log(data));
        });

        function updateElapsedTime() {
            fetch('elapsed.php')
                .then(response => response.json())
                .then(data => {
                    let totalSeconds = data.elapsedTime;
                    let days = Math.floor(totalSeconds / (24 * 3600));
                    totalSeconds %= (24 * 3600);
                    let hours = Math.floor(totalSeconds / 3600);
                    totalSeconds %= 3600;
                    let minutes = Math.floor(totalSeconds / 60);
                    let seconds = totalSeconds % 60;

                    document.getElementById('days').innerText = days + ' Days';
                    document.getElementById('hours').innerText = hours + ' Hours';
                    document.getElementById('minutes').innerText = minutes + ' Minutes';
                    document.getElementById('seconds').innerText = seconds + ' Seconds';
                });
        }

        setInterval(updateElapsedTime, 1000);
    </script>
</body>
</html>
