<?php

namespace App\Http\Controllers;

use App\Calories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CaloriesController extends Controller
{
    protected $calories;

    public function __construct(Calories $calories) {
        $this->calories = $calories;
    }

    public function count() {
        $amount = DB::table('calories')->count();
        return view('home', ['amount' => $amount]);
    }

    public function index() {
        $foods = DB::table('foods')->get();
        return view('calories', ['foods' => $foods]);
    }

    public function show($id) {
        return view('result')->with('data', Calories::find($id));
    }

    public function store(Request $request) {
        $calories = new Calories;
        $calories->fill($request->all());
        $result = $this->calories->getBMR(
            $request->input('sex'),
            $request->input('age'),
            $request->input('weight'),
            $request->input('height'),
            $request->input('activity'),
            $request->input('breakfast'),
            $request->input('lunch'),
            $request->input('dinner')
        );
        $calories->bmr = $result[0];
        $calories->calories = $result[1];
        $calories->food_cal = $result[2];
        $calories->text = $result[3];
        $calories->save();
        $id = Calories::orderBy('created_at', 'desc')->first()->id;

        return redirect("/result/$id");
    }
}
