<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App;
use App\Models\Category;
use App\Models\Dish;
use App\Models\Language;
use App\Models\DishTag;

class CategoryController extends Controller {
    function index(){
        return view('index');
    }
    
    function cat($catID) {
        if ($catID == "null") {
            $dishes = Dish::with('category', 'tags', 'ingredients')->whereNull('category_ID')->get();
        } elseif ($catID == "!null") {
            $dishes = Dish::with('category', 'tags', 'ingredients')->whereNotNull('category_ID')->get();
        } elseif ($catID == "all") {
            $dishes = Dish::with('category', 'tags', 'ingredients')->get();
        } else {
            $dishes = Dish::with('category', 'tags', 'ingredients')->where('category_id', $catID)->get();
        }
        return view('req')->with('dishes', $dishes)->with('pagination',0);
        exit();
    }

    function tag($tagID) {
        if ($tagID == "all") {
            $dishes = Dish::with('category', 'tags', 'ingredients')->get();
        } else {
            $tagID = explode(",",$tagID);
            $dishTag = DB::table('dish_tag')->whereIn('tag_id',$tagID)->get();
            $id = array();
            foreach($dishTag as $tag){
                array_push($id,$tag->dish_id);
            }
            $dishes = Dish::with('category', 'tags', 'ingredients')->whereIn('id', $id)->get();
        }
        return view('req')->with('dishes', $dishes)->with('pagination',0);
        exit();
    }

    function req($cti, $lang, $per_page) {
        App::setLocale($lang);
        
        if($per_page == "all"){
            $per_page= Dish::count(); 
        }
        
        switch ($cti) {
            case "000":
                $dishes = Dish::paginate($per_page);
                break;
            case "001":
                $dishes = Dish::with('ingredients')->paginate($per_page);
                break;
            case "010":
                $dishes = Dish::with('tags')->paginate($per_page);
                break;
            case "100":
                $dishes = Dish::with('category')->paginate($per_page);
                break;
            case "011":
                $dishes = Dish::with('tags', 'ingredients')->paginate($per_page);
                break;
            case "101":
                $dishes = Dish::with('category', 'ingredients')->paginate($per_page);
                break;
            case "110":
                $dishes = Dish::with('category', 'tags')->paginate($per_page);
                break;
            case "111":
                $dishes = Dish::with('category', 'tags', 'ingredients')->paginate($per_page);
                break;
        }
        return view('req')->with('dishes', $dishes)->with('pagination',1);
        exit();
    }
}
