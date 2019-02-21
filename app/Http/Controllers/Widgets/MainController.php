<?php

namespace App\Http\Controllers\Widgets;

use App\Server;
use App\Widget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function add()
    {
        $widget =  new Widget(request()->all());
        $widget->save();
        return respond('Widget Eklendi',200);
    }

    public function settings()
    {
        $widgets = Widget::all();
        foreach ($widgets as $widget){
            $widget->server_name = Server::where('_id',$widget->server_id)->first()->name;
        }
        return view('widgets.settings',[
            "widgets" => $widgets
        ]);
    }
}
