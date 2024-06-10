<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function _invoke()
    {
        $job = Job::with(['employer', 'tags'])->where('title', 'like', '%' . request('q') . '%')->get();

        return view('results', ['jobs' => $job]);
    }
}