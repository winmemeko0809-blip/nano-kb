# ThoughtCache 🧠

A minimalist, high-performance personal Wiki and Knowledge Base built with **PHP**. 

This project is designed for developers who want a fast, database-free way to document their coding journey, store snippets, and organize thoughts using simple **Markdown** files.

## 🚀 Features
- **Flat-File System:** No MySQL required. Your notes are stored as simple `.md` files.
- **Markdown Support:** Write in clean Markdown and view in beautiful HTML.
- **Categorization:** Organize notes into folders (e.g., `/Java`, `/PHP`, `/Ideas`).
- **Fast & Lightweight:** Zero bloat, instant loading.
- **Mobile Friendly:** Fully responsive UI for reading notes on the go.

## 🛠️ Tech Stack
- **Language:** PHP 8.x
- **Parsing:** [Parsedown](https://parsedown.org/) (Fast Markdown to HTML conversion)
- **Frontend:** HTML5, CSS3 (Custom-built or Bootstrap)
- **Server:** Apache/Nginx

## 📂 Project Structure
```text
/notes          <-- Your Markdown (.md) files go here
/public         <-- CSS, JS, and Images
index.php       <-- The core engine that routes and renders files
README.md       <-- You are here!
