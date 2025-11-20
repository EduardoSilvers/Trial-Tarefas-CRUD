<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TarefaCollection extends ResourceCollection{

    public static $wrap = 'tarefas';

    public function toArray($request) {
        return TarefaResource::collection($this->collection);
    }

}
