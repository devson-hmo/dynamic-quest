<?php 
namespace Devson\Questionaire\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class QuestionaireSectionQuestion extends Eloquent {
    protected $table = "questions";
    protected $fillable = [
        "section_id",
        "question",
        "type",
        "answers"
    ];
}
?>