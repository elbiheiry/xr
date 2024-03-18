<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Solution $slug
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $solution = Solution::whereSlug($slug)->firstOrFail();
        $related_solutions = Solution::all()->where('id' , '!=' , $solution->id)->sortByDesc('id');
        $content = Home::firstOrFail();

        return view('site.pages.solutions.index' ,compact('solution' , 'related_solutions' , 'content'));
    }
}
