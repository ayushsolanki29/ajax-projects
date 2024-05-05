let mediaRecorder;
let chunks = [];
let startTime;
let recordingInterval;

const startBtn = document.getElementById("startBtn");
const stopBtn = document.getElementById("stopBtn");
const recordingTime = document.getElementById("recordingTime");
const messesge = document.getElementById("messesge");

startBtn.addEventListener("click", startRecording);
stopBtn.addEventListener("click", stopRecording);

function startRecording() {
  startTime = new Date().getTime(); // Record the start time
  recordingInterval = setInterval(updateRecordingTime, 1000); // Update recording time every second

  navigator.mediaDevices
    .getUserMedia({ audio: true })
    .then((stream) => {
      mediaRecorder = new MediaRecorder(stream);
      mediaRecorder.ondataavailable = (e) => {
        chunks.push(e.data);
      };
      mediaRecorder.onstop = () => {
        clearInterval(recordingInterval); // Stop updating recording time
        updateRecordingTime(); // Update one last time to display accurate recording time
        const blob = new Blob(chunks, { type: "audio/wav" });
        chunks = [];
        const formData = new FormData();
        const fileName = `${Date.now()}.wav`; // Unique file name based on current time
        formData.append("audio", blob, fileName);

        // Send the audio blob to PHP using AJAX
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "save_audio.php");
        xhr.onload = () => {
          if (xhr.status === 200) {
            console.log("Audio file saved successfully");
            //add style on messesge display none
            messesge.style.display = "block";
            setTimeout(() => {
              messesge.style.display = "none";
            }, 2000);
          } else {
            console.error("Failed to save audio file");
          }
        };
        xhr.send(formData);
      };
      mediaRecorder.start();
      startBtn.disabled = true;
      stopBtn.disabled = false;
    })
    .catch((err) => console.error("Error accessing microphone:", err));
}

function stopRecording() {
  clearInterval(recordingInterval); // Stop updating recording time
  if (mediaRecorder && mediaRecorder.state !== "inactive") {
    mediaRecorder.stop();
    startBtn.disabled = false;
    stopBtn.disabled = true;
  }
}

function updateRecordingTime() {
  const currentTime = new Date().getTime();
  const elapsedSeconds = Math.floor((currentTime - startTime) / 1000);
  recordingTime.textContent = `Recording Time: ${elapsedSeconds} seconds`;
}
