##Avyas Quiz

Avyas Quiz is a web application built with Laravel for practicing multiple-choice questions (MCQs) related to Nepalese university entrance exams. Users can attempt mock tests, track performance, and improve their preparation.

##Features

-User registration and login
-Browse and attempt MCQs by subject
-Track quiz history and performance
-Admin panel to manage quizzes, questions, and users

##Technology Stack

-Backend: Laravel (PHP Framework)
-Frontend: Blade templates, HTML, CSS, JavaScript
-Database: MySQL
-Authentication: Laravel built-in auth

##Installation

1.Clone the Repository

```
git clone https://github.com/Li-Yann/Avyas
cd avyas-quiz
```

2.Install Dependencies

```
composer installl
```

3.Copy Environment File

```
cp .env.example .env
```

4.Update database credentials in .env

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=quiz_app
DB_USERNAME=root
DB_PASSWORD=
```

5.Run Migrations

```
php artisan migrate
```

6.Start Development Server

```
php artisan serve
```

7.Open your browser at: http://127.0.0.1:8000

##Snapshots

<img width="1900px" height="912px" src="assets\Home.png">
<img width="1900px" height="912px" src="assets\Signup.png">
<img width="1900px" height="912px" src="assets\Categories.png">
<img width="1900px" height="912px" src="assets\Mcq.png">
<img width="1900px" height="912px" src="assets\Result.png">
