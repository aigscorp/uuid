<?php

namespace App\Http\Controllers;

use App\Models\UUID;
use Illuminate\Http\Request;



class MainController extends Controller
{

    private $cstr = 10;
    /**
     * Display a listing of the uuid.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $value = session('test');
//        dd($request);
//        var_dump($request->query('page'));
        $pag = false;
        $page = 0;
        if($request->has('id')){
            $uuids[] = UUID::all()->find($request->query('id'));
        }else{
            $uuids = UUID::paginate($this->cstr);
            $pag = true;
            $page = $request->query('page');
        }
        $count = 1;
        if($page > 1) $count = $count + $page * $this->cstr;
        $result = ['status' => '', 'msg' => ''];
        $query = $request->query();

        if((count($query) > 0 && $pag == false) || $request->has('method')){//
            $result = [
                'status' => $query['status'],
                'msg' => $query['msg'] ?? '',
                'id'  => $query['id'] ?? ''
            ];
        }
//        session(['test' => '']);
        return view('main', compact('uuids', 'count', 'result'));
    }

    /**
     * Display a form for api.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiForm(){
        $lists = [
            ['title' => 'Список всех uuid', 'data' => 'get', 'id' => 1],
            ['title' => 'Генерировать новый uuid', 'data' => 'post', 'id' => 2],
            ['title' => 'Получить uuid по id', 'data' => 'post', 'id' => 3],
            ['title' => 'Удалить uuid по id', 'data' => 'delete', 'id' => 4],
        ];
        return view('apiform', compact('lists'));
    }
}
