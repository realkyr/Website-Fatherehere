<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calories extends Model
{

    protected $fillable = ['sex', 'age', 'activity', 'weight', 'height', 'breakfast', 'lunch', 'dinner'];

    public function getBMR($sex, $age, $weight, $height, $activity, $breakfast, $lunch, $dinner) {

        if ($sex == "male") {
            $bmr = 66 + (13.7 * $weight) + (5 * $height) - (6.8 * $age);
        }else{
            $bmr = 665 + (9.6 * $weight) + (1.8 * $height) - (4.7 * $age);
        }
        $calories = $bmr*$activity;

        $food_cal = $breakfast + $lunch + $dinner;

        if ($food_cal > $calories) {
            $text = "กินเยอะเกินไปแล้วจ้า";
        }
        elseif ($food_cal < $bmr){
            $text = "กินน้อยเกินไปแล้วววว";
        }

        return [$bmr, $calories, $food_cal, $text];
    }
}
