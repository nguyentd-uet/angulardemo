<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Category;
use App\Item;

class DashboardController extends Controller
{
    public function index() 
    {
    	$countUser = User::all()->count();
    	$countCate = Category::all()->count();
    	$countItem = Item::all()->count();
    	return response()->json([
    		'countUser'=>$countUser,
    		'countCate'=>$countCate,
    		'countItem'=>$countItem,
    		]);
    } 
}
