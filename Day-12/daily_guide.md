1. **File operations**
2. **Session management**
3. **Cookies**
4. **Password hashing**
5. **Basic security functions**

---

# 1️⃣ File Operations (Read, Write, Upload)

| Function               | Syntax                                        | Explanation & Theory                                                                                                                       | Example                                                               |
| ---------------------- | --------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------ | --------------------------------------------------------------------- |
| `fopen()`              | `fopen(filename, mode)`                       | Opens a file and returns a **file handle**. Modes: `"r"`=read, `"w"`=write (overwrite), `"a"`=append, `"x"`=create new, `"r+"`=read/write. | `$file = fopen("diary.txt", "a");`                                    |
| `fwrite()`             | `fwrite(handle, string)`                      | Writes string content to an open file handle.                                                                                              | `fwrite($file, "Hello\n");`                                           |
| `fread()`              | `fread(handle, length)`                       | Reads `length` bytes from a file handle.                                                                                                   | `$content = fread($file, filesize("diary.txt"));`                     |
| `fclose()`             | `fclose(handle)`                              | Closes an open file handle to free resources. Always use after fopen.                                                                      | `fclose($file);`                                                      |
| `file_get_contents()`  | `file_get_contents(filename)`                 | Reads the entire file content into a string. Simplest way to read a small file.                                                            | `$entries = file_get_contents("diary.txt");`                          |
| `file_put_contents()`  | `file_put_contents(filename, data [, flags])` | Writes data to a file in one step. `LOCK_EX` flag ensures exclusive write (avoid race conditions).                                         | `file_put_contents("users.json", json_encode($users), LOCK_EX);`      |
| `pathinfo()`           | `pathinfo(path, options)`                     | Returns info about file path: dirname, basename, extension, filename. Used for uploads.                                                    | `$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);`      |
| `move_uploaded_file()` | `move_uploaded_file(temp_name, dest)`         | Moves uploaded file from temporary location to permanent folder. Ensures file is safely uploaded.                                          | `move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$name);` |
| `strtolower()`         | `strtolower(string)`                          | Converts string to lowercase. Useful for comparing extensions case-insensitively.                                                          | `$ext = strtolower($ext);`                                            |
| `in_array()`           | `in_array(needle, haystack)`                  | Checks if a value exists in an array.                                                                                                      | `if(in_array($ext, $allowed))`                                        |
| `date()`               | `date(format)`                                | Returns formatted current date/time.                                                                                                       | `$date = date("Y-m-d H:i:s");`                                        |
| `empty()`              | `empty(var)`                                  | Checks if variable is empty (`null`, `""`, `0`, `false` all count as empty).                                                               | `if(!empty($_FILES['image']['name']))`                                |
| `isset()`              | `isset(var)`                                  | Checks if variable exists and is not null.                                                                                                 | `isset($_SESSION['user'])`                                            |

**Key concepts for file uploads:**

* Always check file **extension** AND **MIME type**.
* Always check **`$_FILES['file']['error']`**.
* Always handle **file collisions** (unique filename).
* Use **`LOCK_EX`** when writing files that may be accessed simultaneously.

---

# 2️⃣ Session Management

| Function                  | Syntax                         | Explanation & Theory                                                                        | Example                          |
| ------------------------- | ------------------------------ | ------------------------------------------------------------------------------------------- | -------------------------------- |
| `session_start()`         | `session_start();`             | Starts a new session or resumes an existing one. Must be called **before any HTML output**. | `session_start();`               |
| `$_SESSION`               | `$_SESSION['key'] = value;`    | Superglobal array used to store session data on the server.                                 | `$_SESSION['user'] = $username;` |
| `isset()`                 | `isset($_SESSION['user'])`     | Checks if session key exists.                                                               | `if(!isset($_SESSION['user']))`  |
| `session_unset()`         | `session_unset();`             | Clears all session variables (but doesn’t destroy session data).                            | `session_unset();`               |
| `session_destroy()`       | `session_destroy();`           | Destroys the session completely (server storage). Cookie still exists unless cleared.       | `session_destroy();`             |
| `session_regenerate_id()` | `session_regenerate_id(true);` | Generates new session ID. Helps prevent **session fixation attacks**.                       | `session_regenerate_id(true);`   |

**Theory Notes:**

* Sessions store user-specific data on the server.
* Session ID is stored in a **cookie (`PHPSESSID`)** on the client.
* Always regenerate session after login for security.
* Always destroy session on logout.

---

# 3️⃣ Cookies

| Function             | Syntax                                                            | Explanation & Theory                                                                | Example                                               |
| -------------------- | ----------------------------------------------------------------- | ----------------------------------------------------------------------------------- | ----------------------------------------------------- |
| `setcookie()`        | `setcookie(name, value, expire, path, domain, secure, httponly);` | Sends a cookie to client. Must be **before any HTML output**.                       | `setcookie("user", $username, time() + 604800, "/");` |
| `$_COOKIE`           | `$_COOKIE['name']`                                                | Superglobal array containing cookies sent by client.                                | `$savedUser = $_COOKIE['user'];`                      |
| `time()`             | `time()`                                                          | Returns current Unix timestamp. Used to set cookie expiry.                          | `time() + 604800` (7 days)                            |
| `htmlspecialchars()` | `htmlspecialchars(string, ENT_QUOTES, 'UTF-8')`                   | Escapes HTML special characters to prevent XSS. Always use when echoing user input. | `echo htmlspecialchars($_COOKIE['user']);`            |

**Notes:**

* Cookies live on **client-side**.
* Sensitive info (like passwords) should **never** be stored in cookies.
* Use flags: `Secure`, `HttpOnly`, `SameSite` in production.

---

# 4️⃣ Password Hashing & Verification

| Function                  | Syntax                                               | Explanation & Theory                                                     | Example                                                    |
| ------------------------- | ---------------------------------------------------- | ------------------------------------------------------------------------ | ---------------------------------------------------------- |
| `password_hash()`         | `password_hash(password, algorithm [, options])`     | Hashes a password securely (bcrypt/argon2). Auto-generates salt.         | `$hash = password_hash($password, PASSWORD_DEFAULT);`      |
| `password_verify()`       | `password_verify(password, hash)`                    | Compares a plaintext password with stored hash. Returns `true` if match. | `if(password_verify($password, $hash))`                    |
| `password_needs_rehash()` | `password_needs_rehash(hash, algorithm [, options])` | Checks if hash algorithm/cost has changed, needs rehash.                 | `if(password_needs_rehash($hash, PASSWORD_DEFAULT)) {...}` |

**Theory Notes:**

* Never store plaintext passwords.
* `PASSWORD_DEFAULT` ensures future-proof algorithm.
* Salting is automatic.
* Use `password_needs_rehash()` after login if algorithm or cost has changed.

---

# 5️⃣ Basic Security Functions / Practices

| Function / Concept                      | Explanation                                                    |
| --------------------------------------- | -------------------------------------------------------------- |
| `htmlspecialchars()`                    | Escape user input to prevent **XSS**.                          |
| `trim()`                                | Remove extra spaces from user input (before saving).           |
| `isset()` / `empty()`                   | Check existence and validity of user input.                    |
| `in_array()`                            | Validate input against allowed values (e.g., file extensions). |
| `flock()`                               | File locking to prevent simultaneous writes corrupting file.   |
| `session_regenerate_id()`               | Prevent **session fixation attacks**.                          |
| `setcookie('httponly')`                 | Prevent JS from accessing cookie (security).                   |
| `setcookie('secure')`                   | Send cookie only over HTTPS.                                   |
| `password_hash()` + `password_verify()` | Protects against password leakage.                             |

---

# 🔹 Summary / Daily Notes

1. **File Operations**

   * `fopen`, `fread`, `fwrite`, `fclose` → core file handling.
   * `file_get_contents`, `file_put_contents` → simple read/write.
   * `move_uploaded_file`, `pathinfo`, `strtolower`, `in_array` → for file uploads.

2. **Sessions**

   * `session_start()`, `$_SESSION`, `session_unset()`, `session_destroy()`, `session_regenerate_id()` → track users safely.

3. **Cookies**

   * `setcookie()`, `$_COOKIE` → remember user preferences or "Remember Me".

4. **Password Hashing**

   * `password_hash()`, `password_verify()`, `password_needs_rehash()` → protect passwords.

5. **Security Practices**

   * Escape HTML, validate inputs, use secure session and cookie flags, limit file upload types, check file errors.

---

✅ After studying this table and explanations **you now know:**

* Every built-in function we used.
* Why we used it, its parameters, common gotchas.
* How it relates to **security and best practices**.

---

If you want, I can make a **single combined diagram/table** that shows **all exercises with functions used, purpose, security notes** in **one page**, so you can memorize and revise fast.

Do you want me to do that next?


# File Operations (Read, Write, Upload)

**What I did today:** practiced reading a whole file, reading line-by-line, writing (overwrite + append), and safely importing an uploaded `.txt` file into the main notes file.

**Read (whole file)**

```php
<?php
// read_full.php
$content = file_get_contents('notes.txt');    // easiest for small files
echo "<pre>" . htmlspecialchars($content) . "</pre>";
?>
```

**Key:** `file_get_contents()` is simple and good for small files. Always escape output for HTML (`htmlspecialchars`).

**Read (line-by-line)**

```php
<?php
$h = fopen('notes.txt', 'r');
while (!feof($h)) {
    $line = fgets($h);
    if ($line !== false) echo htmlspecialchars(trim($line)) . "<br>";
}
fclose($h);
?>
```

**Key:** `fgets()` is memory-efficient for large files.

**Write (overwrite)**

```php
<?php
$h = fopen('notes.txt','w');  // WARNING: overwrites
fwrite($h, "Start of new notes\n");
fclose($h);
?>
```

**Append (safe diary-style)**

```php
<?php
$note = "Today I learned file ops.";
file_put_contents('notes.txt', date('Y-m-d H:i:s') . " - $note\n", FILE_APPEND);
?>
```

**Upload + import (safe)**

```php
<?php
// upload_notes.php (POST form with enctype="multipart/form-data")
if (!empty($_FILES['notesfile']) && is_uploaded_file($_FILES['notesfile']['tmp_name'])) {
    // Basic validation
    if ($_FILES['notesfile']['size'] > 2 * 1024 * 1024) { die('Too big'); } // 2MB
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($_FILES['notesfile']['tmp_name']);
    if ($mime !== 'text/plain') { die('Only plain text allowed'); }

    // Move to safe folder (outside webroot if possible)
    $target = __DIR__ . '/uploads/' . basename($_FILES['notesfile']['name']);
    if (move_uploaded_file($_FILES['notesfile']['tmp_name'], $target)) {
        $content = file_get_contents($target);
        file_put_contents('notes.txt', "\n--- Imported ---\n" . $content, FILE_APPEND);
        echo "Imported";
    }
}
?>
```

**Security tips:** check MIME with `finfo`, limit size, store uploads outside webroot or with .htaccess denying PHP execution, and never trust file name or content.

---

# Session Management 

**What I did today:** built a simple login flow using sessions, added session regeneration and timeout.

**Start session + set user data**

```php
<?php
// login_success.php
session_start();

// after verifying credentials:
$_SESSION['user_id'] = $userId;
$_SESSION['username'] = $username;
$_SESSION['last_activity'] = time();

// Prevent session fixation
session_regenerate_id(true);
?>
```

**Session timeout + check on each page**

```php
<?php
session_start();
$timeout = 30 * 60; // 30 minutes
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > $timeout) {
    // timeout: destroy
    session_unset();
    session_destroy();
    setcookie(session_name(), '', time() - 3600, '/');
    header('Location: login.php');
    exit;
}
$_SESSION['last_activity'] = time(); // refresh activity
?>
```

**Logout**

```php
<?php
session_start();
session_unset();
session_destroy();
setcookie(session_name(), '', time()-3600, '/');
header('Location: login.php');
exit;
?>
```

**Key points:**

* Always call `session_start()` before output.
* Use `session_regenerate_id(true)` after login to prevent fixation.
* Store minimal sensitive data (user id, role).
* Use HTTPS so the session cookie is not exposed.

**Tiny practice:** Implement a dummy login (hardcoded user) that creates `$_SESSION['username']`, test that regenerating ID changes the session id, and test the 30-minute timeout (reduce to 30 seconds for testing).

---

# Cookies

**What I did today:** made a “remember me” cookie and learned secure cookie options.

**Set cookie (preferred modern API)**

```php
<?php
// set_cookie.php
setcookie('remember_user', 'aesha_token_value', [
  'expires' => time() + 60*60*24*30, // 30 days
  'path' => '/',
  'domain' => '',      // set domain if needed
  'secure' => true,    // only send over HTTPS
  'httponly' => true,  // not accessible to JS
  'samesite' => 'Lax'  // 'Strict'|'Lax'|'None'
]);
?>
```

**Read cookie**

```php
if (isset($_COOKIE['remember_user'])) {
    $token = $_COOKIE['remember_user'];
    // verify token in DB, log user in
}
```

**Delete cookie**

```php
setcookie('remember_user', '', time() - 3600, '/');
```

**Important notes:**

* Use `HttpOnly` to prevent JS access.
* Use `Secure` if your site uses HTTPS (must).
* `SameSite` helps mitigate CSRF for cross-site requests. For third-party cookie flows use `SameSite=None` and `Secure`.
* Do not store plaintext user credentials in cookies — store a random token that you map to server data (rotate and delete tokens on logout).

**Tiny practice:** Implement a “Remember me” checkbox that sets a cookie token and uses it to auto-login (store token+user\_id in DB).

---

# Password Hashing 

**What I did today:** registered a password with `password_hash`, verified with `password_verify`, and added rehash logic.

**Register (hash password)**

```php
$password = $_POST['password']; // plaintext from form (validate)
$hash = password_hash($password, PASSWORD_DEFAULT);
// store $hash in DB
```

**Login (verify)**

```php
$entered = $_POST['password'];
$hashFromDb = /* fetch from DB */;
if (password_verify($entered, $hashFromDb)) {
    // success
    // check if rehash is needed (algorithm changed / cost changed)
    if (password_needs_rehash($hashFromDb, PASSWORD_DEFAULT)) {
        $newHash = password_hash($entered, PASSWORD_DEFAULT);
        // update DB with $newHash
    }
} else {
    // wrong password
}
```

**Pepper (optional extra defense)**

* **Salt**: `password_hash` automatically salts.
* **Pepper**: a site-wide secret kept outside DB (e.g., in env variable) that you HMAC with password before hashing:

```php
$pepper = getenv('PASSWORD_PEPPER'); // secret on server
$hash = password_hash(hash_hmac('sha256', $password, $pepper), PASSWORD_DEFAULT);
```

**Note:** If you use pepper, you must store it safely (not in source code) and accept the tradeoff: site compromise + pepper leak is catastrophic.

**Tiny practice:** Implement register & login with `password_hash` + `password_needs_rehash`. Try increasing the cost (if using bcrypt) or switch to different algorithm and see `password_needs_rehash()` return true.

---

# Basic Security Practices

**What I did today:** created a checklist and small examples for common web attacks and protections.

**1. Prevent SQL Injection — use prepared statements (PDO example)**

```php
$stmt = $pdo->prepare('SELECT id, email FROM users WHERE email = ?');
$stmt->execute([$email]);
$user = $stmt->fetch();
```

**2. Prevent XSS — escape output**

```php
echo htmlspecialchars($user_input, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
```

**3. CSRF — token pattern**

```php
// create token
if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
// in form
<input type="hidden" name="csrf" value="<?=htmlspecialchars($_SESSION['csrf'])?>">
// verify on POST
if (!hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) die('Invalid CSRF');
```

**4. Secure File Uploads**

* Validate MIME using `finfo`.
* Validate extension.
* Reject executables (.php, .phtml).
* Store outside webroot or force download headers.
* Set proper permissions (uploads not writable by webserver beyond what's needed).

**5. Sessions & Cookies**

* Use `session_regenerate_id(true)` after login.
* Set session cookie params to `Secure`, `HttpOnly`, `SameSite`.
* Store minimal session data.

**6. Error handling & info leaks**

* Never show internal errors to users. Log them to a secure log (not webroot).
* Configure `display_errors = Off` on production.

**7. Transport & headers**

* Use HTTPS only.
* Add security headers: `Strict-Transport-Security`, `X-Frame-Options: DENY`, `Content-Security-Policy` (CSP) — reduces XSS + clickjacking.

**8. Principle of Least Privilege**

* Files: correct file permissions (e.g., PHP files 644, private keys 600).
* DB: app users with only needed privileges.

**Daily security checklist (quick):**

* [ ] Is HTTPS enabled?
* [ ] Are cookies `HttpOnly` + `Secure`?
* [ ] Are DB queries prepared?
* [ ] Are outputs escaped?
* [ ] Are uploads validated and stored safely?
* [ ] Are session IDs regenerated on login?
* [ ] Are error messages hidden from users?

**Tiny practice:** Build a small login + notes app and deliberately try to exploit one vulnerability (e.g., XSS by submitting `<script>alert(1)</script>` as a note). Then fix it with `htmlspecialchars` and confirm the exploit no longer runs.
