document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("user-input");
    const chatbox = document.getElementById("chatbox");
  
    input.addEventListener("keypress", (e) => {
      if (e.key === "Enter") {
        sendMessage();
      }
    });
  });
  
  // ✅ Append messages to the chatbox
  function appendMessage(sender, message) {
    const chatbox = document.getElementById("chatbox");
    const msg = document.createElement("p");
    msg.innerHTML = `<strong>${sender}:</strong> ${message}`;
    chatbox.appendChild(msg);
    chatbox.scrollTop = chatbox.scrollHeight;
  }
  
  // ✅ Send user message to backend
  function sendMessage() {
    const input = document.getElementById("user-input");
    const message = input.value.trim();
    const language = document.getElementById("language").value;
  
    if (message === "") return;
  
    appendMessage("🧑‍🌾 You", message);
    input.value = "";
  
    fetch("http://localhost/AgroWebsite/backend/chatbot.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: new URLSearchParams({ message, language }),
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.response) {
          appendMessage("🤖 AgriBot", data.response);
        } else {
          appendMessage("❌ Error", data.error || "No response from server.");
        }
      })
      .catch((err) => {
        appendMessage("⚠️ Network Error", err.message);
      });
  }
  
  // ✅ Start voice input
  function startVoice() {
    const recognition =
      window.SpeechRecognition || window.webkitSpeechRecognition;
  
    if (!recognition) {
      alert("🎤 Your browser does not support voice recognition.");
      return;
    }
  
    const lang = document.getElementById("language").value;
    const recog = new recognition();
  
    recog.lang =
      lang === "hindi"
        ? "hi-IN"
        : lang === "spanish"
        ? "es-ES"
        : lang === "gujarati"
        ? "gu-IN"
        : "en-US";
  
    recog.start();
  
    recog.onresult = function (event) {
      const transcript = event.results[0][0].transcript;
      document.getElementById("user-input").value = transcript;
      sendMessage();
    };
  
    recog.onerror = function (event) {
      appendMessage("🎤 Voice Error", event.error);
    };
    function clearChat() {
        const chatbox = document.getElementById("chatbox");
        chatbox.innerHTML = ""; // Remove all messages
      }
      
  }
  