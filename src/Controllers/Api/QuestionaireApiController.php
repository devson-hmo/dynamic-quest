<?php 
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Devson\Questionaire\Models\Questionaires;
use Devson\Questionaire\Models\QuestionaireSection;
use Devson\Questionaire\Models\QuestionaireSectionQuestion;

class QuestionaireApiController extends Controller {

    public function store(Request $request) {
        $user_id = Auth::user()->id; 

        $validator = \Validator::make($request->all(), [
            "questionaireName" => "required"
        ]);

        $customErrors = [];
        if(empty($request->input("sections"))) 
            $customErrors[] = "Sections is empty";

        if($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 400);
        }

        if(!empty($customErrors)) {
            return response()->json(["errors" => $customErrors], 400);
        }

        $questionaire = Questionaires::create([
            "name"      => $request->input("questionaireName"),
            "user_id"   => $user_id,
        ]);

        if($questionaire) {
            
            foreach($request->input("sections") as $_section) {
                $section = QuestionaireSection::create([
                    "user_id"           => $user_id,
                    "questionaire_id"   => $questionaire->id,
                    "name"              => $_section["name"]
                ]);
                
                foreach($_section["questions"] as $question) {
                    QuestionaireSectionQuestion::create([
                        "section_id"=> $section->id,
                        "question"  => $question["question"],
                        "type"      => $question["type"],
                        "answers"   => json_encode($question["answers"])
                    ]);
                }
            }
        }

        return response()->json($questionaire, 200);
    }
}
?> 