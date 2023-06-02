<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with(['technologies', 'type'])->paginate(6);

        return response()->json([
            'susccess'=> true,
            'results'=> $projects

        ]);
    }

    public function show($slug) {
        $project = Project::where('slug', $slug)->with(['technologies', 'type'])->first();

       if($project) {
        return response()->json([
            'susccess'=> true,
            'results'=> $project
         ]);
       } else {
         return response()->json([
            'susccess'=> false,
            'error'=> 'Project non trovato!'
         ]);
       }

    }


}
