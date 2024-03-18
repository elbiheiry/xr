<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\Member;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    //
    public function index()
    {
        $members = Member::all()->sortByDesc('id');
        $content = Home::firstOrFail();

        return view('site.pages.team.index' ,compact('members' , 'content'));
    }
}
