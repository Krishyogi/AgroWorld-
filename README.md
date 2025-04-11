# 🌾 AgroWebsite

AgroWebsite is a full-stack web application tailored for agricultural services and information. It features a user-friendly frontend interface and a backend powered by PHP to enable chatbot interactions and content delivery.

---

## 📌 Features

- Informative static pages (Home, About, Services, News, Contact)
- Integrated Chatbot functionality powered by OpenAI
- Organized frontend and backend structure
- Environment variable support via `.env`
- Modular and extendable PHP backend

---

## 🧰 Tech Stack

**Frontend:**
- HTML5
- CSS3 (assumed external or inline)
- JavaScript

**Backend:**
- PHP
- OpenAI API (chatbot integration)
- Dotenv (for secure API keys and configurations)

---

## 📂 Folder Structure

```
AgroWebsite/
├── backend/
│   ├── .env                  # Environment variables
│   ├── config.php            # API key config
│   ├── chatbot.php           # Chatbot logic
│   └── test_openai.php       # Test endpoint for OpenAI
├── frontend/
│   ├── Index.html            # Home page
│   ├── about.html
│   ├── Services.html
│   ├── news.html
│   ├── contact.html
│   ├── chatbot.html          # Chat interface
│   └── chatbot.js            # Chat interaction logic
```

---

## 🚀 Setup Instructions

### 1. Clone or Extract

```bash
git clone <repo_url>
# or extract AgroWebsite.zip
```

### 2. Backend Setup

- Create a `.env` file inside `/backend/` with your OpenAI API key:

```env
OPENAI_API_KEY=your_openai_key_here
```

- Ensure your server supports PHP and has access to internet for API calls.

### 3. Frontend Usage

Open `frontend/Index.html` in any modern browser. Navigate to other pages via links.

### 4. Chatbot Functionality

- Open `frontend/chatbot.html`
- The chatbot uses `backend/chatbot.php` for API interaction.

Ensure your server allows CORS and PHP execution.

---

## 🛰️ Deployment Notes

- Host frontend on any static site host (e.g., GitHub Pages, Netlify)
- Backend requires a PHP-compatible server (Apache, Nginx + PHP-FPM)
- Protect your `.env` from public access

---

## 👨‍🌾 Author & License

Developed as part of an agricultural web service demo.

Feel free to extend it under [MIT License](LICENSE).
