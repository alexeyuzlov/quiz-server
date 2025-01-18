# Quiz

Quiz is a Laravel-based application designed to manage quizzes with questions and answers, and to calculate the number of correct responses. It provides a simple way to handle quiz creation, management, and evaluation.

## Features
- Store and manage quizzes with multiple questions and possible answers.
- Calculate and display the number of correct responses.
- Support for creating, editing, and deleting quizzes and questions.
- Robust backend implementation using Laravel and Eloquent ORM.

## Prerequisites
To run this project, ensure you have the following installed:
- [PHP](https://www.php.net/) (v8.0 or higher)
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/) (v9 or higher)
- [MySQL](https://www.mysql.com/) or another supported database

## Getting Started
1. Clone the repository:
   ```bash
   git clone https://github.com/alexeyuzlov/quiz-server.git
   cd quiz-server
   ```
2. Install dependencies:
   ```bash
   composer install
   ```
3. Create a `.env` file by copying the example:
   ```bash
   cp .env.example .env
   ```
4. Configure your database in the `.env` file.
5. Run migrations to set up the database:
   ```bash
   php artisan migrate
   ```
6. Seed the database with sample data (optional):
   ```bash
   php artisan db:seed
   ```
7. Start the development server:
   ```bash
   php artisan serve
   ```
8. Access the application at [http://localhost:8000](http://localhost:8000).

## Contributing
We welcome contributions! Follow these steps to contribute:
1. Fork the repository.
2. Create a new branch for your changes:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Add your message here"
   ```
4. Push your branch:
   ```bash
   git push origin feature-name
   ```
5. Submit a pull request.

## License
This project is licensed under the [MIT License](LICENSE).

## Feedback and Support
For issues or suggestions, open an issue on GitHub or contact the maintainers.

---

Enjoy building your quizzes!

