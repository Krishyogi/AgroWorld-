# 🌾 AgroWorld – AI-Powered Agriculture Platform

AgroWorld is a responsive, AI-driven web platform that empowers farmers by delivering personalized agricultural insights, multilingual support, smart weather alerts, and voice-activated AI interaction. Designed with rural accessibility and digital transformation in mind, AgroWorld bridges the gap between modern technology and traditional farming.

---

## 📌 Project Highlights

- 🤖 Voice-Enabled AI Chatbot (AgriBot) with text-to-speech + multilingual support.
- 🌧️ Hyper-local weather alerts, rainfall prediction & drought warnings.
- 🌾 AI-generated fertilizer and pest control guidance tailored to each location.
- 📈 Government schemes and agriculture news integrated in a newsroom UI.
- 🌐 Fully responsive UI for mobile, tablet, and desktop users.
- 🧠 Dropdown-powered advisory system per city and category.
- 🗣️ Language options include English, Hindi, Gujarati, and Spanish.

---

## 📁 Project Structure

```
AgroWebsite/
├── index.html              # Landing page with hero section & 'Explore More' content
├── about.html              # Mission, team, and methodology of AgroWorld
├── news.html               # Latest agriculture news + Government schemes in modern layout
├── contact.html            # Contact form with thank-you logic and embedded chatbot
├── services.html           # Dropdown-based AI Advisory (City + Category)
├── chatbot.html            # Voice-enabled, multilingual chatbot
├── css/
│   └── style.css           # Stylesheet for consistent design (optional)
├── js/
│   └── lang.js             # Language preference and dynamic switching
├── backend/
│   └── chatbot.php         # Server-side chatbot logic (PHP backend)
└── assets/
    └── images/             # Agriculture illustrations, team photos, etc.
```

---

## ⚙️ Technologies Used

| Stack         | Tech                                                         |
|---------------|--------------------------------------------------------------|
| Frontend      | HTML5, CSS3, Vanilla JS                                      |
| Fonts & Icons | Google Fonts (Quicksand, Inter), Unicode/Emoji               |
| Backend       | PHP (for chatbot communication)                              |
| APIs          | Formspree (contact form), Web Speech API, SpeechRecognition |
| Tools         | Git, VS Code, Live Server, Chrome DevTools                   |

---

## 🚀 Getting Started

### 1️⃣ Setup

> You can run this project either by opening `index.html` in a browser or by launching a local server for chatbot backend.

#### Option A: Open Static Pages

- Simply double-click `index.html`
- All static features (dropdown, contact, news, chatbot UI) will function

#### Option B: Run Chatbot Locally

If you want to simulate the chatbot backend:

```bash
cd backend
php -S localhost:8000
```

> Update the `fetch()` URL in `chatbot.html` if needed:
```js
fetch("http://localhost:8000/chatbot.php", { ... });
```

---

## 🌐 Features by Page

### 📄 index.html
- Hero section with background image + animated heading
- Explore section with AI services overview
- Smooth scroll behavior and responsive navbar

### 📄 services.html
- Smart dropdown with city + advisory category
- Dynamic result generation from JS object
- Styled output box with adaptive message

### 📄 news.html
- Latest agriculture headlines
- Government schemes in card layout
- Hover effects, mobile responsive design

### 📄 contact.html
- Fully styled contact form (Formspree API)
- Voice/chat-integrated chatbot embedded
- Success message appears only after submission

### 📄 chatbot.html
- Modern interface for AI assistant
- Voice input (Web Speech API) and language dropdown
- Text and voice output with neat message bubbles

---

## 🎨 Design System

| Element       | Style                        |
|---------------|------------------------------|
| Font          | `'Inter'` & `'Quicksand'`     |
| Primary Color | `#002E10` (Dark Green)       |
| Accent Color  | `#eafbe3`, `#f0fdf4` (Soft)  |
| Radius        | `8px–16px` rounded corners    |
| Effects       | Smooth fade animations       |

---

## 🧑‍🤝‍🧑 Team and Contribution

AgroWorld is built with care for communities that grow the world’s food 🌱  
To contribute:

```bash
# Fork the repo
git clone 
cd AgroWorld

# Make changes and push
git checkout -b feature/my-feature
git commit -m "Added new advisory card"
git push origin feature/my-feature
```

Pull requests are welcome 🙌

---

## 📞 Support

Having issues?

- 🌐 Website: [www.agroworld.in](https://agroworld.in)
- ✉️ Email: support@agroworld.in
- 📱 Twitter: [@AgroWorldTech](https://twitter.com/AgroWorldTech)

---

## 📜 License

This project is licensed under the MIT License.

---

> 🚜 “Sow with knowledge. Grow with confidence. Harvest with AgroWorld.”