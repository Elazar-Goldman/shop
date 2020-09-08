<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{
    public function displayPage($slug){
        $data['page'] = Page::getPageBySlug($slug);
        
        return view('pageTemplate', $data);
    }
}
