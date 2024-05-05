<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voice Recorder</title>
</head>
<body>
    <div>

        <button id="startBtn">Start Recording</button>
        <button id="stopBtn" disabled>Stop Recording</button>
        <p id="recordingTime">Recording Time: 0 seconds</p>
        <p id="messesge" style="display: none; color:green;">Your File is Saved Success full!</p>
    </div>
    <div>
        <!-- reload page using onclick -->
        <button onclick="location.reload();">Record Another</button>
    </div>
        
    <script src="script.js"></script>
</body>
</html>