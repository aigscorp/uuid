<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UUIDResource;
use App\Models\UUID;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class UUIDApiController extends Controller
{
    private $status = 'ok';

    /**
     * отображает список всех UUID
     * @return json
     */
    public function list(){
        $uuid = UUID::all();
        return ['status' => $this->status, 'uuid' => UUIDResource::collection($uuid)];
    }

    /**
     * генерирует новый UUID
     * @return json
     */
    public function generate(){
        $str = (string) Str::uuid();
        $uuid = UUID::create(['uuid' => $str, 'del' => 0, 'created' => now('Europe/Moscow')->toDateTime()]);
        if(!$uuid) $this->status = 'error';
        return ['status' => $this->status, 'uuid' => $uuid, 'msg' => 'создан новый uuid'];
    }

    /**
     * получить UUID по id
     * @param int $id
     * @return json
     */
    public function retrieve($id){
        $uuid = UUID::all()->find($id);
        $res = ['status' => $this->status, 'msg' => '', 'uuid' => $uuid];
        if(!$uuid){
            $res['status'] = 'error';
            $res['msg'] = 'не найден такой id';
        }else{
            $res['msg'] = 'найден: ' . $uuid['uuid'] ;
        }
        return $res;
    }
    /**
     * удалить UUID по id
     * @param int $id
     * @return json
     */
    public function delete($id){
        $uuid = UUID::all()->find($id);
        $res = ['status' => $this->status, 'msg' => "", 'uuid' => $uuid, 'method' => 'delete'];

        if($uuid != null){
            $res['msg'] = "запись удалена uuid: " . $uuid['uuid'];
            UUID::destroy($id);
        }else{
            $res['msg'] = "не найден такой id";
            $res['status'] = 'error';
        }
        return $res;
    }
}
