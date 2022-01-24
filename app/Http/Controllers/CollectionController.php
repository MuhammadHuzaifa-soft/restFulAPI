<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
    private $posts;

    public function __construct(){
        $json = Http::get('https://www.reddit.com/r/MechanicalKeyboards.json')->json();
        //  dd($json);
        $this->posts = collect($json['data']['children']);
        // dd($collect);
    }

    public function index(){
        // return $this->posts;

        return view('colection.index' , ['posts' => $this->posts]);
    }

    public function filter(){

        // dd($posts['data']['post_hint'] = 'image');
        $posts = $this->posts->filter(function ($post , $key){

            return $post['data']['post_hint'] == 'image';

           });
//  if($post['data']['post_hint'] != 'image'){
        //      return \Str::contains($post['data']['url'] , 'i.redd.it');


         return view('colection.filter' , ['posts' => $posts]);

    }

}
