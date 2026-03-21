# Chirper 🐦

A simple Laravel-based microblogging app where users can post short messages ("chirps"), edit them, and manage their account.

---

## 🚀 Features

### 📝 Chirp CRUD

* Create a chirp
* View latest chirps
* Edit existing chirps
* Delete chirps
* Validation with error messages

### 🔐 Authentication

* User registration
* Password hashing
* Auto login after registration
* Logout functionality
* Auth-based UI rendering

---

## 🧠 Key Concepts Learned

### 1. Routing

* Defined routes manually for CRUD operations
* Used REST-style endpoints (`POST`, `PUT`, `DELETE`)

### 2. Controllers

* Handled logic for creating, updating, and deleting chirps
* Used validation with custom error messages

### 3. Route Model Binding

* Automatically injected model instances into controller methods

```php
public function edit(Chirp $chirp)
```

---

### 4. Forms & Security

* Used `@csrf` to prevent CSRF attacks
* Used `@method('PUT')` and `@method('DELETE')` for HTTP method spoofing

---

### 5. Validation

* Server-side validation using:

```php
$request->validate([...])
```

* Displayed errors using Blade `@error`

---

### 6. Old Input Handling

* Preserved form input after validation errors:

```php
old('message')
```

---

### 7. Authentication

* Registered users with validation
* Hashed passwords using:

```php
Hash::make()
```

* Logged users in with:

```php
Auth::login($user)
```

* Logged users out with:

```php
Auth::logout()
```

---

### 8. Sessions & Flash Messages

* Used session flash messages for success alerts:

```php
return redirect('/')->with('success', '...');
```

---

### 9. Blade Templating

* Layout system using `<x-layout>`
* Conditional rendering:

```blade
@auth
@guest
```

---

### 10. UI Styling

* Built UI using Tailwind CSS
* Simple and clean form design
* Animated success messages

---

## 📂 Project Structure (Simplified)

```
app/
 └── Http/Controllers/
      ├── ChirpController.php
      └── Auth/
          ├── Register.php
          └── Logout.php

resources/views/
 ├── home.blade.php
 ├── chirps/
 │    └── edit.blade.php
 ├── components/
 │    └── chirp.blade.php
 └── auth/
      └── register.blade.php
```

---

## 🔄 Flow Example

### Create Chirp

```
Form → POST /chirps → validate → save → redirect with success
```

### Register User

```
Form → POST /register → validate → create user → login → redirect
```

### Logout

```
POST /logout → Auth::logout() → redirect
```

---

## 🧩 Future Improvements

* Login system (email + password)
* Authorization (only owner can edit/delete)
* Likes / comments
* Pagination
* Profile pages

---

## ⚡ Summary

This project covers the fundamentals of Laravel:

* MVC structure
* CRUD operations
* Authentication
* Validation
* Blade templating
* Session handling

A solid foundation for building full-stack Laravel apps 🚀
