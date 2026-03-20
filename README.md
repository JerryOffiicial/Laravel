# Chirper App 🐦

A simple Laravel-based microblogging application where users can post short messages called "chirps".

---

## 🚀 Features

- Display chirps in a clean card-based UI
- User avatars generated dynamically
- Anonymous chirp support
- Human-readable timestamps (e.g. "2 minutes ago")
- Database seeding with sample users and chirps

---

## 🧩 Tech Stack

- Laravel
- Blade Components
- Tailwind CSS
- Eloquent ORM

---

## 📂 Components

### Chirp Component

- Displays:
  - User avatar (or anonymous avatar)
  - Username (or "Anonymous")
  - Message content
  - Timestamp

- Uses conditional rendering:
  ```blade
  @if($chirp->user)