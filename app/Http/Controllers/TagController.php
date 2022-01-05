<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function create()
    {
        return Topic::firstOrCreate([
            'name' => 'php',
            'topic_id' => 1,
            'user_id' => 1
        ]);
    }
}
