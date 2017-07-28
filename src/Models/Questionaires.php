<?php 
namespace Devson\Questionaire\Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Questionaires extends Eloquent {
    protected $table = "questionaires";

    protected $fillable = ["name", "user_id"];
}
?>