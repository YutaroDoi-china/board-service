<?php

namespace App\Http\Controllers;

use App\Board;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function sort_gone(){
        $boards = Board::where('delete_at', '>', time())->orderBy('delete_at', 'asc')->get();
        return view('ajax_sort', ['boards' => $boards]);
    }
    public function sort_new(){
        $boards = Board::where('delete_at', '>', time())->orderBy('created_at', 'desc')->get();
        return view('ajax_sort', ['boards' => $boards]);
    }
    public function sort_fav(){
        $fav_ids = array();
        foreach($_POST as $k=>$fav_id){
            $fav_ids[] = $fav_id;
        }
        $boards = Board::where('delete_at', '>', time())->whereIn('id', $fav_ids)->orderBy('delete_at', 'asc')->get();
        return view('ajax_sort', ['boards' => $boards]);
    }
}
