# Avyas Quiz

Avyas Quiz is a web application built with Laravel to help users practice multiple-choice questions (MCQs) related to Nepalese university entrance exams. Users can attempt mock tests, monitor their progress, and enhance their exam preparation.

## Features

-   User registration and login system
-   Browse and attempt MCQs by subject category
-   Track quiz history and performance analytics
-   Admin panel to manage quizzes, questions, and user accounts

## Technology Stack

-   Backend: Laravel (PHP Framework)
-   Frontend: Blade templates, HTML, CSS, JavaScript
-   Database: MySQL
-   Authentication: Laravel built-in auth system

## Installation

1.Clone the Repository

```
git clone https://github.com/Li-Yann/Avyas
cd avyas-quiz
```

2.Install Dependencies

```
composer install
npm install
```

3.Copy Environment File

```
cp .env.sample .env
```

4.Run Migrations

```
php artisan migrate
```

5.Start Development Server

```
php artisan serve
```

6.Open your browser at: http://127.0.0.1:8000

##Snapshots

<img width="1900px" height="912px" src="assets\Home.png">
<img width="1900px" height="912px" src="assets\Signup.png">
<img width="1900px" height="912px" src="assets\Categories.png">
<img width="1900px" height="912px" src="assets\Mcq.png">
<img width="1900px" height="912px" src="assets\Result.png">
