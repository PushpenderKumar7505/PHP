<div align="center">

<img src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" alt="PHP Logo" width="130"/>

# 🐘 PHP — Complete Reference & Practice Guide

**A structured PHP learning repository covering core concepts, OOP, forms, sessions, MySQL integration & more**

[![PHP](https://img.shields.io/badge/PHP-69.9%25-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![HTML](https://img.shields.io/badge/HTML-30.1%25-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![MySQL](https://img.shields.io/badge/MySQL-Integrated-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![XAMPP](https://img.shields.io/badge/XAMPP-Server-FB7A24?style=for-the-badge&logo=xampp&logoColor=white)](https://www.apachefriends.org/)
[![Status](https://img.shields.io/badge/Status-Active-22c55e?style=for-the-badge)]()
[![License](https://img.shields.io/badge/License-Open%20Source-3b82f6?style=for-the-badge)]()

<br/>

> A hands-on PHP practice repository — covering PHP fundamentals, OOP, form handling, sessions, file operations, and MySQL database integration with clean, well-commented scripts.

</div>

---

## 📋 Table of Contents

- [Overview](#-overview)
- [Topics Covered](#-topics-covered)
- [Folder Structure](#-folder-structure)
- [Getting Started](#️-getting-started)
- [Quick Cheatsheet](#-quick-php-cheatsheet)
- [Resources](#-resources)
- [Author](#-author)

---

## 🔍 Overview

<img src="https://media.geeksforgeeks.org/wp-content/cdn-uploads/20200930184649/Top-10-PHP-Projects-With-Source-Code.png" width="100%" alt="PHP Web Development"/>

<br/>

This repository is a **complete PHP reference and internship-ready practice kit** — built to strengthen PHP fundamentals from the ground up. The `php_intern/` folder contains topic-wise scripts covering syntax, logic, OOP, web forms, sessions, file handling, and database operations with MySQL — everything needed to build real-world PHP web applications.

---

## 🧠 Topics Covered

---

### 🏗️ PHP Fundamentals — Syntax, Variables & Control Flow

```php
<?php
// Variables & Data Types
$name    = "Pushpender";      // String
$age     = 21;                // Integer
$gpa     = 9.2;               // Float
$isActive = true;             // Boolean
$skills  = ["PHP", "MySQL"]; // Array

// String Operations
echo strlen($name);           // 10
echo strtoupper($name);       // "PUSHPENDER"
echo str_replace("P", "p", $name); // "pushpender"

// Control Flow
if ($age >= 18) {
    echo "Adult";
} elseif ($age >= 13) {
    echo "Teen";
} else {
    echo "Child";
}

// Loops
for ($i = 1; $i <= 5; $i++) echo $i . " ";
foreach ($skills as $skill) echo $skill . " ";
?>
```

---

### 🧩 OOP — Classes, Objects & Inheritance

<img src="https://miro.medium.com/v2/resize:fit:1400/1*8mTB_GfOuI3SRqjEV1JJ1w.png" width="100%" alt="PHP OOP Classes and Objects"/>

<br/>

```php
<?php
// Class & Constructor
class Student {
    public string $name;
    private int $age;

    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age  = $age;
    }

    public function getAge(): int { return $this->age; }

    public function introduce(): string {
        return "Hi, I'm {$this->name}, age {$this->age}.";
    }
}

// Inheritance
class CSEStudent extends Student {
    private string $branch;

    public function __construct(string $name, int $age, string $branch) {
        parent::__construct($name, $age);
        $this->branch = $branch;
    }

    public function introduce(): string {
        return parent::introduce() . " Branch: {$this->branch}.";
    }
}

$s = new CSEStudent("Pushpender", 21, "CSE");
echo $s->introduce();
// Hi, I'm Pushpender, age 21. Branch: CSE.
?>
```

**Topics include:** Constructors & destructors, Access modifiers (`public`, `private`, `protected`), Inheritance & method overriding, Interfaces & abstract classes, Static methods & properties, Traits

---

### 📬 Form Handling — GET, POST, Sessions & Cookies

<img src="https://www.scientecheasy.com/wp-content/uploads/2021/08/php-session.png" width="100%" alt="PHP Sessions GET POST"/>

<br/>

```php
<?php
// ── GET & POST ────────────────────────────────
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $email    = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);

    if (!$email) {
        echo "Invalid email!";
    } else {
        echo "Welcome, $username!";
    }
}

// ── SESSIONS ─────────────────────────────────
session_start();
$_SESSION["user"] = "Pushpender";
$_SESSION["role"] = "admin";

echo $_SESSION["user"];  // Pushpender
session_destroy();       // End session

// ── COOKIES ──────────────────────────────────
setcookie("theme", "dark", time() + 86400, "/");
echo $_COOKIE["theme"];  // dark
?>
```

**HTML Form (contact.html)**

```html
<form action="process.php" method="POST">
    <input type="text"  name="username" placeholder="Your Name" required>
    <input type="email" name="email"    placeholder="Email" required>
    <textarea name="message" rows="4" placeholder="Your Message"></textarea>
    <button type="submit">Submit</button>
</form>
```

---

### 🗄️ MySQL Database Integration — CRUD Operations

<img src="https://miro.medium.com/v2/resize:fit:1400/1*bFa4w0Q1L7tYOdmEmRMwWQ.png" width="100%" alt="PHP MySQL CRUD"/>

<br/>

```php
<?php
// ── CONNECT ──────────────────────────────────
$conn = new mysqli("localhost", "root", "", "mydb");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// ── CREATE ───────────────────────────────────
$stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $email);
$name  = "Pushpender"; $email = "push@mail.com";
$stmt->execute();

// ── READ ─────────────────────────────────────
$result = $conn->query("SELECT * FROM users");
while ($row = $result->fetch_assoc()) {
    echo $row["name"] . " — " . $row["email"] . "<br>";
}

// ── UPDATE ───────────────────────────────────
$conn->query("UPDATE users SET email='new@mail.com' WHERE id=1");

// ── DELETE ───────────────────────────────────
$conn->query("DELETE FROM users WHERE id=1");

$conn->close();
?>
```

**Topics include:** MySQLi & PDO connections, Prepared statements, CRUD operations, Fetch modes (`fetch_assoc`, `fetch_all`), JOIN queries from PHP, Error handling

---

### 📁 File Handling & Includes

```php
<?php
// ── WRITE TO FILE ────────────────────────────
$fp = fopen("log.txt", "a");
fwrite($fp, date("Y-m-d H:i:s") . " — User logged in\n");
fclose($fp);

// ── READ FROM FILE ───────────────────────────
$lines = file("log.txt", FILE_IGNORE_NEW_LINES);
foreach ($lines as $line) echo $line . "<br>";

// ── FILE UPLOAD ──────────────────────────────
if (isset($_FILES["photo"])) {
    $target = "uploads/" . basename($_FILES["photo"]["name"]);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $target);
    echo "File uploaded to $target";
}

// ── INCLUDES ─────────────────────────────────
include  "header.php";   // Warning if not found
require  "db.php";       // Fatal error if not found
include_once "nav.php";  // Include only once
require_once "config.php";
?>
```

---

## 📂 Folder Structure

```
PHP/
│
├── 📁 php_intern/               # All PHP practice scripts
│   ├── 01_basics.php            # Variables, data types, echo, print
│   ├── 02_operators.php         # Arithmetic, comparison, logical operators
│   ├── 03_control_flow.php      # if/else, switch, loops (for, while, foreach)
│   ├── 04_functions.php         # User-defined functions, recursion, closures
│   ├── 05_arrays.php            # Indexed, associative, multidimensional arrays
│   ├── 06_strings.php           # String functions, regex basics
│   ├── 07_oop.php               # Classes, objects, inheritance, interfaces
│   ├── 08_forms.php             # GET/POST form handling, validation
│   ├── 09_sessions.php          # Sessions, cookies, authentication flow
│   ├── 10_file_handling.php     # fopen, fwrite, fread, file upload
│   ├── 11_mysql_connect.php     # MySQLi connection & CRUD operations
│   ├── 12_pdo.php               # PDO-based database operations
│   └── *.html                   # HTML frontend forms for PHP scripts
│
└── 📄 README.md
```

---

## ⚙️ Getting Started

### Prerequisites

| Tool | Version | Download |
|------|---------|----------|
| ![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white) PHP | 7.x or higher | [php.net](https://www.php.net/downloads) |
| ![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=flat&logo=xampp&logoColor=white) XAMPP / WAMP | Latest | [apachefriends.org](https://www.apachefriends.org/) |
| ![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white) MySQL | 5.x or higher | [mysql.com](https://dev.mysql.com/downloads/) |
| ![VS Code](https://img.shields.io/badge/VS_Code-007ACC?style=flat&logo=visualstudiocode&logoColor=white) VS Code | Latest | [code.visualstudio.com](https://code.visualstudio.com/) |

### Setup

**1. Clone the repository**

```bash
git clone https://github.com/PushpenderKumar7505/PHP.git
```

**2. Move to your server root**

```bash
# XAMPP (Windows)
C:/xampp/htdocs/PHP/

# WAMP (Windows)
C:/wamp64/www/PHP/

# Linux
/var/www/html/PHP/
```

**3. Start Apache & MySQL** from your XAMPP/WAMP control panel

**4. Open any script in browser**

```
http://localhost/PHP/php_intern/01_basics.php
```

---

## 📖 Quick PHP Cheatsheet

```php
<?php
// ─── VARIABLES & TYPES ────────────────────────────────
$str   = "Hello";     $int  = 42;
$float = 3.14;        $bool = true;
$arr   = [1, 2, 3];   $null = null;

// ─── STRING FUNCTIONS ─────────────────────────────────
strlen($str);           // 5
strtoupper($str);       // "HELLO"
strtolower($str);       // "hello"
str_replace("l","r",$str); // "Herro"
substr($str, 1, 3);    // "ell"
trim("  hello  ");     // "hello"
explode(",", "a,b,c"); // ["a","b","c"]
implode("-", ["a","b"]); // "a-b"

// ─── ARRAY FUNCTIONS ──────────────────────────────────
count($arr);            // 3
array_push($arr, 4);    // [1,2,3,4]
array_pop($arr);        // removes 4
array_merge($arr,[5]);  // [1,2,3,5]
array_reverse($arr);    // [3,2,1]
sort($arr);             // ascending sort
in_array(2, $arr);      // true
array_key_exists("k",$assoc);

// ─── DATE & TIME ──────────────────────────────────────
date("Y-m-d");          // "2025-08-21"
date("H:i:s");          // "14:30:00"
time();                 // Unix timestamp

// ─── MATH ─────────────────────────────────────────────
abs(-5);    ceil(4.2);  floor(4.9);
round(4.5); pow(2,8);   sqrt(16);
max(1,2,3); min(1,2,3); rand(1,100);

// ─── SUPERGLOBALS ─────────────────────────────────────
$_GET["id"];  $_POST["name"];  $_FILES["photo"];
$_SESSION["user"];  $_COOKIE["theme"];
$_SERVER["REQUEST_METHOD"];  $_SERVER["PHP_SELF"];
?>
```

---

## 📚 Resources

| Resource | Link |
|----------|------|
| 📖 PHP Official Docs | [php.net/docs](https://www.php.net/manual/en/) |
| 🎓 W3Schools PHP Tutorial | [w3schools.com/php](https://www.w3schools.com/php/) |
| 🧠 GeeksForGeeks PHP | [geeksforgeeks.org/php](https://www.geeksforgeeks.org/php/) |
| 🔧 PHP Sandbox (Online) | [onlinephp.io](https://onlinephp.io/) |
| 🔐 PHP Security Best Practices | [owasp.org](https://owasp.org/www-project-php-security-cheat-sheet/) |

---

## 👤 Author

<div align="center">

<img src="https://img.icons8.com/fluency/64/developer-mode.png" width="56"/>

**Pushpender Kumar**

*B.Tech Computer Science & Engineering — GLA University, Mathura*

[![GitHub](https://img.shields.io/badge/GitHub-PushpenderKumar7505-181717?style=for-the-badge&logo=github)](https://github.com/PushpenderKumar7505)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Connect-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/pushpender-kumar-5280b7226/)

*Aspiring DevOps & Cloud Engineer | AWS · Docker · Kubernetes · Jenkins · Terraform · Ansible*

</div>

---

<div align="center">

### ⭐ Found this useful? Give it a star!

<img src="https://img.icons8.com/fluency/48/star.png" width="32"/>

*Fork it, use it, improve it — contributions are welcome!*

</div>
