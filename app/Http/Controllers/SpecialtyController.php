<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;

class SpecialtyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    public function create(){
        return view('specialties.create');
    }

    public function sendData(Request $request){
        $specialty = new Specialty();
        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();

        return redirect('/especialidades');
    }
}
