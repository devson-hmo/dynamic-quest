<?php 
namespace Devson\Questionnaire;

use Illuminate\Support\ServiceProvider;

class QuestionaireServiceProvider extends ServiceProvider {

    public function boot()
    {
        //$this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'questionaire');

        $this->publishes([
            __DIR__."/views/assets" => base_path("resources/assets/js/components")
        ], 'assets');

        $this->publishes([
            __DIR__."/routes.php" => base_path("routes/questionaire.php")
        ], 'assets');

         $this->publishes([
            __DIR__."/Controllers" => base_path("app/Http/Controllers")
        ], 'assets');
    }

    public function register() 
    {
        $this->app->bind("questionaire", function($app){
            return new Questionaire;
        });
    }
}
?>
