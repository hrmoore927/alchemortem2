<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ApiSearchController extends Controller
{
//    public function search(Request $request) {
//        // First we define the error message we are going to show if no keywords
//        // existed or if no results found.
//        $error = ['error' => 'No results found, please try with different keywords.'];
//
//        // Making sure the user entered a keyword.
//        if($request->has('q')) {
//
//            // Using the Laravel Scout syntax to search the products table.
//            $posts = Product::search($request->get('q'))->get();
//
//            // If there are results return them, if none, return the error message.
//            return $posts->count() ? $posts : $error;
//
//        }
//
//        // Return the error message if no keywords existed
//        return $error;
//    }
    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function getSearch(Request $request)
    {
    	if($request->has('titlesearch')){
    		$items = Item::search($request->titlesearch)
    			->paginate(6);
    	}else{
    		$items = Item::paginate(6);
    	}
    	return view('item-search',compact('items'));
    }


    /**
     * Get the index name for the model.
     *
     * @return string
    */
    public function postSearch(Request $request)
    {
    	$this->validate($request,['title'=>'required']);


    	$items = Item::create($request->all());
    	return back();
    }
}
