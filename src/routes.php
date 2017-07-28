<?php 
Route::group(["prefix" => "questions"], function() {
    Route::get("/", "QuestionaireController@index");
});

Route::group(["prefix" => "api"/*, "middleware" => "auth:api"*/], function() {
    Route::post("questionaire", "Api\QuestionaireApiController@store");
});
?>