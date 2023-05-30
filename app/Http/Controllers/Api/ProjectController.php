<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with(['technology', 'types'])->paginate(6); //->get();
        
        return response()->json([
            'susccess'=> true,
            'results'=> $projects

        ]);
    }
}
