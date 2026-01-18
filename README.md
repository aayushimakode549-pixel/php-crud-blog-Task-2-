# 📝 PHP CRUD Blog Application – ApexPlanet Internship Task 2

## 🚀 Objective

Develop a **simple web application** to perform **CRUD operations** (Create, Read, Update, Delete) with **basic user authentication**.  
This project demonstrates practical web development skills using **PHP, MySQL, HTML, and CSS**.

---

## 🛠 Features & Steps

### 1️⃣ Database Setup
- Create a **MySQL database** named `blog`.  
- Create **two tables**:  
  - `users` → stores user credentials (id, username, password, created_at)  
  - `posts` → stores blog posts (id, user_id, title, content, created_at)  

### 2️⃣ CRUD Operations
- **Create 🆕**: Add new posts through a PHP form.  
- **Read 📖**: Display a list of all posts in a structured format.  
- **Update ✏️**: Edit existing posts securely.  
- **Delete 🗑️**: Remove posts safely, with database integrity.  

### 3️⃣ User Authentication
- **Registration 📝**: New users can sign up with a unique username.  
- **Login 🔑**: Secure login using hashed passwords.  
- **Session Management 🛡️**: Maintain user login states and prevent unauthorized access.  

---

## 💾 Database Schema

### `users` Table
| Column      | Type                         | Description                 |
|------------|-------------------------------|-----------------------------|
| id         | INT AUTO_INCREMENT PRIMARY KEY | Unique user ID              |
| username   | VARCHAR(50) UNIQUE            | User login name             |
| password   | VARCHAR(255)                  | Hashed password             |
| created_at | TIMESTAMP DEFAULT CURRENT_TIMESTAMP | Account creation timestamp |

### `posts` Table
| Column      | Type                         | Description                 |
|------------|-------------------------------|-----------------------------|
| id         | INT AUTO_INCREMENT PRIMARY KEY | Unique post ID              |
| user_id    | INT                           | References `users.id`       |
| title      | VARCHAR(255)                  | Post title                  |
| content    | TEXT                          | Post content                |
| created_at | TIMESTAMP DEFAULT CURRENT_TIMESTAMP | Post creation timestamp     |

---

## 💻 Technologies Used

- **Backend:** PHP  
- **Database:** MySQL  
- **Frontend:** HTML, CSS  
- **Version Control:** Git/GitHub  
- **Local Server:** XAMPP  

---

## ⚡ How to Run

1. Install **XAMPP** or any PHP + MySQL environment.  
2. Place the project folder in `htdocs` (e.g., `C:\xampp\htdocs\my_php_project\blog`).  
3. Start **Apache** and **MySQL** from XAMPP Control Panel.  
4. Create a database named `blog` in **phpMyAdmin** and import the tables.  
5. Open your browser and navigate to:  
