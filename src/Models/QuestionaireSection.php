<?php 
namespace Devson\Questionaire\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class QuestionaireSection extends Eloquent {
    protected $table = "questionaire_sections";
    protected $fillable = [
        "user_id",
        "questionaire",
        "name"
    ];
}
?>