<?php 
Route::group(["prefix" => "questions", "namespace" => "Devson\Questionaire\Controllers"], function() {
    Route::get("/", "QuestionaireController@index");
});

Route::group(["prefix" => "api", "namespace" => "Devson\Questionaire\Controllers\Api"/*, "middleware" => "auth:api"*/], function() {
    Route::post("questionaire", "QuestionaireApiController@store");
});
?>