Install composer require devson/questionnaire


Ir al archivo config/app.php y agregar en ServiceProvider

Devson\Questionnaire\QuestionaireServiceProvider::class,

php artisan vendor:publish --tag=assets --force

php artisan migrate 
