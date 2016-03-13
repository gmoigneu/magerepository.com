<?php

namespace App\Http\Controllers\Api\V1;

use App\Entities\Module;
use App\Http\Transformers\ModuleTransformer;
use Dingo\Api\Contract\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Dingo\Api\Routing\Helpers;

class ModuleController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Helpers;

    public function index(Request $request)
    {
        $modules = Module::query();

        $order = $request->input('order');
        if($order) {
            switch($order) {
                case 'popular':
                    $modules->orderBy('stars', 'desc');
                    break;
                case 'new':
                    $modules->orderBy('repository_created_at', 'desc');
                    break;
                case 'updated':
                    $modules->orderBy('repository_pushed_at', 'desc');
                    break;
            }
        };

        $count = ($request->has('count')) ? $request->get('count') : 20;

        $modules = $modules->paginate($count);
        return $this->response->paginator($modules, new ModuleTransformer);
    }

    public function show($id)
    {
        $module = Module::findOrFail($id);
        return $this->response->item($module, new ModuleTransformer);
    }
}
