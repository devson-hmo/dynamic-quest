<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionaireController extends Controller {

    public function index() {
        return view("questionaire::questionaire.index");   
    }
}
?> 