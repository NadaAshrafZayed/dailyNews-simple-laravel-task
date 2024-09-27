<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    // I want the agencies data to be visible to all functions here.
    // We can use the Constructor
    // Define class properties
    private $ag1, $ag2, $ag3, $allNews;

    public function __construct(){
        // Agency 1
        $this->ag1 = json_decode(
            '{
                "latestnews":[
                    {
                        "title":"Title 1",
                        "content":"content 1",
                        "rating":"5/10",
                        "datetime":"Mon, 14 Dec 2020 2:01:59 +0000"
                    },
                    {
                        "title":"Title 2",
                        "content":"content 2",
                        "rating":"9/10",
                        "datetime":"Mon, 14 Dec 2020 14:02:59 +0000"
                    },
                    {
                        "title":"Title 3",
                        "content":"content 3",
                        "rating":"2/10",
                        "datetime":"Mon, 14 Dec 2020 6:04:59 +0000"
                    }
                ]
            }'
        );

        // Agency 2
        $this->ag2 = json_decode(
            '{
                "latestnews":[
                    {
                        "title":"Title 4",
                        "content":"content 4",
                        "rating":"3/10",
                        "datetime":"Mon, 14 Dec 2020 13:01:59 +0000"
                    },
                    {
                        "title":"Title 5",
                        "content":"content 5",
                        "rating":"9/10",
                        "datetime":"Mon, 14 Dec 2020 00:02:59 +0000"
                    },
                    {
                        "title":"Title 6",
                        "content":"content 6",
                        "rating":"6/10",
                        "datetime":"Mon, 14 Dec 2020 0:00:00 +0000"
                    }
                ]
            }'
        );

        // Agency 3
        $this->ag3 = json_decode(
            '{
                "latestnews":[
                    {
                        "title":"Title 7",
                        "content":"content 7",
                        "rating":"6/10",
                        "datetime":"Mon, 14 Dec 2020 08:01:59 +0000"
                    },
                    {
                        "title":"Title 8",
                        "content":"content 8",
                        "rating":"8/10",
                        "datetime":"Mon, 14 Dec 2020 03:02:59 +0000"
                    },
                    {
                        "title":"Title 9",
                        "content":"content 9",
                        "rating":"1/10",
                        "datetime":"Mon, 14 Dec 2020 12:00:00 +0000"
                    }
                ]
            }'
        );

        // Each news must be related to its source
        foreach ($this->ag1->latestnews as $newsSource) {
            $newsSource->source = 'Agency 1';
        }
        foreach ($this->ag2->latestnews as $newsSource) {
            $newsSource->source = 'Agency 2';
        }
        foreach ($this->ag3->latestnews as $newsSource) {
            $newsSource->source = 'Agency 3';
        }

        // Merge them in one array and send to the blade
        $this->allNews = array_merge($this->ag1->latestnews, $this->ag2->latestnews, $this->ag3->latestnews);
    
    } // End constructor
    


    public function index(){
        return view('news.index', ['allNews' => $this->allNews]);
    }

    public function sort($sortType){
        if($sortType=='DA'){ // Date Ascending
            // dd($this->ag1);
            usort($this->allNews, function($a, $b) {
                return strtotime($a->datetime) - strtotime($b->datetime);
            });
        }else if($sortType=='DD'){ // Date Descending
            usort($this->allNews, function($a, $b) {
                return strtotime($b->datetime) - strtotime($a->datetime);
            });
        }else if($sortType=='RA'){ // Rating Ascending
            usort($this->allNews, function ($a, $b) {
                return (int) filter_var($a->rating, FILTER_SANITIZE_NUMBER_INT) - (int) filter_var($b->rating, FILTER_SANITIZE_NUMBER_INT);
            });
        }else{  // Rating Descending
            usort($this->allNews, function ($a, $b) {
                return (int) filter_var($b->rating, FILTER_SANITIZE_NUMBER_INT) - (int) filter_var($a->rating, FILTER_SANITIZE_NUMBER_INT);
            });
        }

        return view('news.index', ['allNews' => $this->allNews]);
    }
}