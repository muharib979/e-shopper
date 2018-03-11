<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class HomeController extends Controller
{
    public function index()
    {


    	 $all_published_product=DB::table('tbl_products')
	         				  ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
	         				  ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
	         				  ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
	         				  ->limit(9)
	                          ->get();
	         $manage_published_product=view('pages.home_content')
	                ->with('all_published_product',$all_published_product);
	                return view('layout')
	                        ->with('pages.home_content',$manage_published_product);

    	//return view('pages.home_content');
    }
}