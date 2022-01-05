<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Arr;
use function MongoDB\BSON\fromJSON;

class TopicController extends Controller
{
    public function index(){

        $topic = Topic::all();
        $users = User::find($topic->user_id)->topics;
//
//            $res =  Arr::crossJoin($users, $topic);
//            $arrRes = [];
//            foreach ($res as $item) {
//                $arrRes[] = $item;
//            }
            return $users;

    }
    public function create(){
        Topic::firstOrCreate([
            'user_id' => 1,
            'tags_id' => 0,

        ]);
    }
    public function update(){}
    public function deleted(){}
/*
 *
 *
 *     {
        "id": 1,
        "name": "Sys Admin",
        "email": null,
        "avatar": "https://sun1-24.userapi.com/s/v1/ig2/Ug466xxPPZMgSfBnE2JLzWGep1ocJsdN2hgl_-skG7EgalhLtta_e7K-6sV6IXwcKSK7OjjWzcOiS5NphbTOzACS.jpg?size=200x200&quality=96&crop=177,91,724,724&ava=1",
        "email_verified_at": null,
        "created_at": "2022-01-04T15:35:49.000000Z",
        "updated_at": "2022-01-04T15:35:49.000000Z"



    {
        "id": 1,
        "user_id": 5,
        "tags_id": 1,
        "description": "Ишу партнера для изучения Английского языка :)",
        "created_at": "2022-01-04T15:35:49.000000Z",
        "updated_at": "2022-01-04T15:35:49.000000Z"
    }
    },*/
}

