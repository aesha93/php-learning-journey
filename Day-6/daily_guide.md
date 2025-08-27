

# **PHP Step: Strings and Basic Operations **

## **Concepts Explained**

### 1️⃣ **String Concatenation**

* **Definition:** Joining two or more strings together using the `.` operator.
* **Example:**

```php
$productName = "Laptop";
$productType = "Gaming";
$fullName = $productName . " - " . $productType;
echo $fullName; // Output: Laptop - Gaming
```

* **Common Mistakes:**

  * Forgetting the `.` operator and using `+` (PHP does not add strings with `+`).
  * Forgetting spaces if needed for readability.

* **Best Practice:** Always add spaces manually if you want them in the final string.

---

### 2️⃣ **String Interpolation**

* **Definition:** Embedding variables directly inside double-quoted strings.
* **Example:**

```php
$productName = "Laptop";
$productPrice = 1200;
echo "The product $productName costs $$productPrice"; 
// Output: The product Laptop costs $1200
```

* **Common Mistakes:**

  * Using single quotes `'...'` will **not** interpolate variables.
  * Confusing `$` inside strings for variable names. Use curly braces if needed:

```php
echo "Price: ${productPrice}USD"; // Output: Price: 1200USD
```

* **Best Practice:** Use interpolation for readability, especially in templates.

---

### 3️⃣ **`strlen()`**

* **Definition:** Returns the length (number of characters) of a string.
* **Example:**

```php
$productName = "Laptop";
echo strlen($productName); // Output: 6
```

* **Common Mistakes:** Counting spaces; spaces **do count** in length.

---

### 4️⃣ **`substr()`**

* **Definition:** Extract a part of a string.
* **Syntax:** `substr(string, start, length)`

  * `start` can be negative (counting from the end)
  * `length` is optional
* **Example:**

```php
$productName = "Laptop";
echo substr($productName, 0, 3); // Output: Lap
echo substr($productName, -3);   // Output: top
```

* **Best Practice:** Use for previews, abbreviations, or SKU truncation.

---

### 5️⃣ **`strpos()`**

* **Definition:** Finds the position of the first occurrence of a substring.
* **Syntax:** `strpos(haystack, needle)`

  * Returns **false** if not found.
* **Example:**

```php
$productName = "Laptop";
echo strpos($productName, "top"); // Output: 3
```

* **Common Mistakes:** Using `== false` to check for "not found" – it fails if substring is at position `0`.

  * **Better:** `=== false`

---

### 6️⃣ **`str_replace()`**

* **Definition:** Replaces all occurrences of a substring with another string.
* **Syntax:** `str_replace(search, replace, subject)`
* **Example:**

```php
$productName = "Old Laptop";
$newName = str_replace("Old", "New", $productName);
echo $newName; // Output: New Laptop
```

* **Best Practice:** Can replace product names, tags, or status labels.

---

### 7️⃣ **Pattern Matching / Validation**

* **Definition:** Checking or validating strings based on content patterns (basic example with `strpos`).
* **Example:** Check if a product SKU contains "VIP":

```php
$sku = "VIP1234";
if (strpos($sku, "VIP") !== false) {
    echo "Special product!";
}
// Output: Special product!
```

* **Best Practice:** Always use strict comparison (`!== false`) with `strpos`.

---

### 8️⃣ **Replacement**

* Already covered with `str_replace()` for simple string substitution.
* In real Magento use: updating product names, tags, or user input sanitization.

---

Perfect! Let’s start **Regular Expressions (RegEx) in PHP** step by step. Since you already know `strpos`/`stripos`, this will be a natural progression. We’ll cover **preg\_match**, **preg\_match\_all**, and **preg\_replace** with clear examples.

---

# **1️⃣ preg\_match** – Check if a pattern exists

**Syntax:**

```php
preg_match("/pattern/", $string, $matches);
```

* `/pattern/` → your RegEx pattern (between slashes `/`)
* `$string` → the string to search in
* `$matches` → (optional) array to store the matched part

**Example 1: Check if string contains a number**

```php
$text = "My age is 30";

if (preg_match("/\d+/", $text, $matches)) {
    echo "Found a number: " . $matches[0];
} else {
    echo "No number found.";
}
```

**Output:**

```
Found a number: 30
```

✅ **Explanation:**

* `\d+` → matches **one or more digits**
* `preg_match` stops at the **first match**

---

# **2️⃣ preg\_match\_all** – Find all matches

**Syntax:**

```php
preg_match_all("/pattern/", $string, $matches);
```

* Returns **all matches**, not just the first one.

**Example 2: Find all numbers in a string**

```php
$text = "I have 2 cats, 3 dogs, and 1 parrot";

preg_match_all("/\d+/", $text, $matches);
print_r($matches[0]);
```

**Output:**

```
Array
(
    [0] => 2
    [1] => 3
    [2] => 1
)
```

✅ **Explanation:**

* `$matches[0]` contains all matched numbers
* Useful for extracting multiple pieces of data

---

# **3️⃣ preg\_replace** – Advanced replacements

**Syntax:**

```php
preg_replace("/pattern/", "replacement", $string);
```

* Replaces parts of a string that match the pattern

**Example 3: Replace all numbers with `#`**

```php
$text = "My phone numbers are 12345 and 67890";
$newText = preg_replace("/\d+/", "#", $text);
echo $newText;
```

**Output:**

```
My phone numbers are # and #
```

✅ **Explanation:**

* `\d+` matches numbers
* `preg_replace` replaces them with `#`

---

# **Basic RegEx Patterns to Remember**

| Pattern  | Meaning                                |
| -------- | -------------------------------------- |
| `\d`     | Any digit (0-9)                        |
| `\D`     | Non-digit                              |
| `\w`     | Any word character (a-z, A-Z, 0-9, \_) |
| `\W`     | Non-word character                     |
| `\s`     | Whitespace (space, tab, newline)       |
| `\S`     | Non-whitespace                         |
| `.`      | Any character except newline           |
| `+`      | One or more times                      |
| `*`      | Zero or more times                     |
| `?`      | Zero or one time                       |
| `[abc]`  | Any one of a, b, or c                  |
| `[^abc]` | Any character except a, b, or c        |

---

Perfect! Since you want to **deeply master string handling in PHP**, we’ll create a **step-by-step learning path** from basic to advanced. We’ll include **string functions, manipulation, and RegEx**. I’ll also suggest **mini exercises** so you can practice after each topic.

---

# **PHP String Handling – Deep Dive**

---

## **1️⃣ Basic String Operations**

### **Topics**

* Creating strings: single `' '` vs double quotes `" "`
* Concatenation: `.` operator
* String length: `strlen()`
* Accessing characters: `$str[0]`
* Case functions: `strtolower()`, `strtoupper()`, `ucfirst()`, `ucwords()`

### **Exercise**

```php
$text = "hello world";
```

1. Make the string uppercase.
2. Make the first letter of each word uppercase.
3. Print the first 5 characters.
4. Count total characters.

---

## **2️⃣ Searching & Checking in Strings**

### **Topics**

* `strpos()`, `stripos()` → find position of a substring
* `str_contains()` (PHP 8+) → check if substring exists
* `str_starts_with()`, `str_ends_with()`
* `strcmp()`, `strcasecmp()` → compare strings

### **Exercise**

```php
$text = "PHP is fun!";
```

1. Check if "PHP" exists in the string.
2. Find the position of "fun".
3. Compare "php" and "PHP" (case-insensitive).

---

## **3️⃣ Extracting & Modifying Strings**

### **Topics**

* `substr()` → extract part of string
* `str_replace()`, `str_ireplace()` → replace substring
* `trim()`, `ltrim()`, `rtrim()` → remove spaces
* `explode()` → convert string to array
* `implode()` → convert array to string

### **Exercise**

```php
$text = "  PHP, JavaScript, Python  ";
```

1. Remove extra spaces at both ends.
2. Replace "Python" with "Java".
3. Convert string to an array of languages.
4. Join the array back into a string separated by `;`.

---

## **4️⃣ Advanced String Functions**

### **Topics**

* `str_repeat()` → repeat a string
* `str_shuffle()` → randomize characters
* `str_pad()` → pad string to certain length
* `wordwrap()` → wrap long strings

### **Exercise**

```php
$text = "Hello";
```

1. Repeat the string 3 times.
2. Shuffle the string randomly.
3. Pad the string to 10 characters with `*` on the right.

---

## **5️⃣ Regular Expressions (RegEx)**

### **Topics**

* `preg_match()` → find if pattern exists
* `preg_match_all()` → find all matches
* `preg_replace()` → replace pattern
* Common patterns: `\d`, `\w`, `\s`, `+`, `*`, `?`, `[abc]`, `[^abc]`

### **Exercise**

```php
$text = "My email is test@example.com and phone 123-456-7890";
```

1. Extract the email.
2. Extract all numbers.
3. Replace all numbers with `#`.

---

## **6️⃣ Multi-step String Challenges** (Mini Projects)

1. **Validate a string**: check if a password contains uppercase, lowercase, digit, and special character.
2. **Word frequency counter**: count how many times each word appears in a paragraph.
3. **Mask sensitive data**: replace part of email or phone with `*`.
4. **Extract hashtags**: from a social media sentence, extract all words starting with `#`.

---
Absolutely! Let’s create a **comprehensive summary of PHP string functions** with **purpose and syntax** so you have a ready reference. I’ll organize them by category for clarity.

---

# **PHP String Functions – Summary**

---

## **1️⃣ Basic String Operations**

| Function          | Purpose                              | Syntax / Example                         |
| ----------------- | ------------------------------------ | ---------------------------------------- |
| `strlen()`        | Get string length                    | `strlen("Hello") → 5`                    |
| `strtoupper()`    | Convert string to uppercase          | `strtoupper("hello") → "HELLO"`          |
| `strtolower()`    | Convert string to lowercase          | `strtolower("HELLO") → "hello"`          |
| `ucfirst()`       | Capitalize first letter of string    | `ucfirst("hello world") → "Hello world"` |
| `ucwords()`       | Capitalize first letter of each word | `ucwords("hello world") → "Hello World"` |
| Concatenation `.` | Combine strings                      | `$a . $b`                                |
| Access characters | Access individual characters         | `$str[0] → first character`              |

---

## **2️⃣ Searching & Checking Strings**

| Function            | Purpose                                             | Syntax / Example                           |
| ------------------- | --------------------------------------------------- | ------------------------------------------ |
| `strpos()`          | Find first occurrence of substring (case-sensitive) | `strpos("PHP is fun", "fun") → 7`          |
| `stripos()`         | Find first occurrence (case-insensitive)            | `stripos("PHP is fun", "php") → 0`         |
| `strrpos()`         | Find last occurrence                                | `strrpos("PHP PHP", "PHP") → 4`            |
| `str_contains()`    | Check if substring exists (PHP 8+)                  | `str_contains("PHP is fun", "fun") → true` |
| `str_starts_with()` | Check if string starts with substring               | `str_starts_with("Hello", "He") → true`    |
| `str_ends_with()`   | Check if string ends with substring                 | `str_ends_with("Hello", "lo") → true`      |
| `strcmp()`          | Compare two strings (case-sensitive)                | `strcmp("a", "b") → negative`              |
| `strcasecmp()`      | Compare two strings (case-insensitive)              | `strcasecmp("a", "A") → 0`                 |

---

## **3️⃣ Modifying Strings**

| Function               | Purpose                              | Syntax / Example                                          |
| ---------------------- | ------------------------------------ | --------------------------------------------------------- |
| `substr()`             | Extract part of string               | `substr("Hello World", 6, 5) → "World"`                   |
| `str_replace()`        | Replace substring (case-sensitive)   | `str_replace("World","PHP","Hello World") → "Hello PHP"`  |
| `str_ireplace()`       | Replace substring (case-insensitive) | `str_ireplace("world","PHP","Hello World") → "Hello PHP"` |
| `trim()`               | Remove spaces from both ends         | `trim("  Hello  ") → "Hello"`                             |
| `ltrim()`              | Remove spaces from left              | `ltrim("  Hello") → "Hello"`                              |
| `rtrim()`              | Remove spaces from right             | `rtrim("Hello  ") → "Hello"`                              |
| `explode()`            | Split string into array by delimiter | `explode(",","a,b,c") → ["a","b","c"]`                    |
| `implode()` / `join()` | Join array into string               | `implode("-",["a","b","c"]) → "a-b-c"`                    |

---

## **4️⃣ Advanced String Functions**

| Function             | Purpose                               | Syntax / Example                                          |
| -------------------- | ------------------------------------- | --------------------------------------------------------- |
| `str_repeat()`       | Repeat string                         | `str_repeat("Hi", 3) → "HiHiHi"`                          |
| `str_shuffle()`      | Shuffle characters                    | `str_shuffle("Hello") → random`                           |
| `str_pad()`          | Pad string to specific length         | `str_pad("Hi",5,"*") → "Hi***"`                           |
| `wordwrap()`         | Wrap long strings                     | `wordwrap("Hello World",5,"\n")`                          |
| `substr_count()`     | Count occurrences of substring        | `substr_count("PHP PHP", "PHP") → 2`                      |
| `str_split()`        | Split string into array of characters | `str_split("Hello") → ["H","e","l","l","o"]`              |
| `addslashes()`       | Escape quotes                         | `addslashes("O'Reilly") → "O\'Reilly"`                    |
| `htmlspecialchars()` | Convert special chars to HTML         | `htmlspecialchars("<b>Hi</b>") → "&lt;b&gt;Hi&lt;/b&gt;"` |
| `nl2br()`            | Convert newlines to `<br>`            | `nl2br("Hi\nHello") → "Hi<br>Hello"`                      |

---

## **5️⃣ Regular Expressions (RegEx) Functions**

| Function           | Purpose                      | Syntax / Example                                 |
| ------------------ | ---------------------------- | ------------------------------------------------ |
| `preg_match()`     | Match pattern once           | `preg_match("/\d+/","Age 30",$matches)`          |
| `preg_match_all()` | Match pattern multiple times | `preg_match_all("/\d+/","1,2,3",$matches)`       |
| `preg_replace()`   | Replace pattern              | `preg_replace("/\d+/","#","Age 30") → "Age #"`   |
| `preg_split()`     | Split string by pattern      | `preg_split("/[\s,]+/","a b,c") → ["a","b","c"]` |

---

## **6️⃣ Conversion Functions**

| Function | Purpose           | Syntax / Example |
| -------- | ----------------- | ---------------- |
| `chr()`  | ASCII → character | `chr(65) → "A"`  |
| `ord()`  | Character → ASCII | `ord("A") → 65`  |

---