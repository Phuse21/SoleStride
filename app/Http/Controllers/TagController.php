<?php

namespace App\Http\Controllers;

use App\Models\Tag;


class TagController extends Controller
{
    public function show(Tag $tag)
    {
        return view('tagJobs', ['tag' => $tag]);
    }
}