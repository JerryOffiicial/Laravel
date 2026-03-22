# Chirper 🐦 — Laravel Learning Project

This project is a simple Twitter-like app built with Laravel.
It demonstrates **authentication, authorization, CRUD operations, and security concepts like CSRF**.

---

# 🚀 What You Will Learn

* Laravel routing and controllers
* Blade templating
* CRUD operations
* Authentication (login/register/logout)
* Authorization (policies & permissions)
* Middleware (auth & guest)
* CSRF protection
* Sessions and security basics

---

# 🧩 1. Basic Flow of Laravel

Every request follows this flow:

```
Route → Controller → Model → View
```

### Example:

* Route receives request
* Controller handles logic
* Model interacts with database
* View displays data

---

# 🛣️ 2. Routing

```php
Route::get('/', [ChirpController::class, 'index']);
Route::post('/chirps', [ChirpController::class, 'store']);
```

### Key Idea:

* Routes define **what happens when a URL is visited**
* You can either:

  * return a view directly
  * or use a controller

---

# 🎮 3. Controllers

Controllers handle logic.

Example:

```php
public function store(Request $request)
{
    $validated = $request->validate([
        'message' => 'required|string|max:255',
    ]);

    auth()->user()->chirps()->create($validated);

    return redirect('/');
}
```

### What happens:

1. Validate input
2. Save to database
3. Redirect

---

# 🗃️ 4. CRUD Operations

| Action | Method | Description   |
| ------ | ------ | ------------- |
| Create | POST   | Add new chirp |
| Read   | GET    | Show chirps   |
| Update | PUT    | Edit chirp    |
| Delete | DELETE | Remove chirp  |

---

# 🔐 5. Authentication (Auth)

Authentication = **Who are you?**

Laravel uses sessions to remember users.

---

## 📝 Register

```php
$user = User::create([
    'name' => $validated['name'],
    'email' => $validated['email'],
    'password' => Hash::make($validated['password']),
]);

Auth::login($user);
```

👉 Creates user and logs them in immediately

---

## 🔑 Login

```php
Auth::attempt($credentials);
```

### What happens:

1. Check email
2. Verify password
3. Store user in session

---

## 🚪 Logout

```php
Auth::logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
```

### Why:

* Removes user from session
* Destroys old session
* Creates new secure token

---

# 🧠 6. Sessions

Sessions store data about the user.

Example:

* user ID
* CSRF token

---

# 🛡️ 7. CSRF Protection

CSRF = Cross-Site Request Forgery

---

## How it works:

### 1. Server creates token

Stored in session:

```
session['_token'] = random_string
```

---

### 2. Form includes token

```blade
@csrf
```

---

### 3. Request is sent

```
_token = random_string
```

---

### 4. Laravel verifies

```
request token === session token
```

---

### Result:

| Match | Action            |
| ----- | ----------------- |
| ✅ Yes | Allow request     |
| ❌ No  | Block (419 error) |

---

## 🔁 Token Regeneration

```php
$request->session()->regenerateToken();
```

👉 Creates a new token to:

* prevent reuse
* improve security

---

# 🔒 8. Middleware

Middleware controls access to routes.

---

## auth middleware

```php
Route::middleware('auth')->group(function () {
    // protected routes
});
```

👉 Only logged-in users allowed

---

## guest middleware

```php
->middleware('guest')
```

👉 Only non-logged-in users allowed

---

# 👤 9. Authorization (Policies)

Authorization = **What can you do?**

---

## Chirp Policy Example

```php
public function update(User $user, Chirp $chirp): bool
{
    return $chirp->user()->is($user);
}
```

👉 Only owner can edit/delete

---

# ⚖️ 10. authorize() vs @can

### In Controller:

```php
$this->authorize('update', $chirp);
```

👉 Blocks unauthorized access

---

### In Blade:

```blade
@can('update', $chirp)
```

👉 Shows/hides UI

---

## 🔑 Difference:

| Method      | Purpose              |
| ----------- | -------------------- |
| @can        | UI control           |
| authorize() | Security enforcement |

---

# 🔗 11. Relationships

```php
auth()->user()->chirps()->create($validated);
```

👉 Automatically sets `user_id`

---

# 🔄 12. Route Model Binding

```php
public function edit(Chirp $chirp)
```

Laravel automatically:

* finds chirp by ID
* injects it into function

---

# 🧠 Final Mental Model

* **Auth** → Who are you?
* **Policy** → What can you do?
* **Middleware** → Can you access this route?
* **CSRF** → Is this request safe?

---

# ✅ Summary

You now built a real-world system with:

* Secure authentication
* Protected routes
* Ownership-based permissions
* Safe form handling
* Full CRUD functionality

---

# 🚀 Next Steps

* Add profile system
* Add likes/comments
* API + Sanctum authentication
* Pagination & infinite scroll

---

This project covers the **core foundation of Laravel development** 🎯
