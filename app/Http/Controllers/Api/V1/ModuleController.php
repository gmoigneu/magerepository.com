<?php

namespace App\Http\Controllers\Api\V1;

use App\Entities\Module;
use App\Entities\NewModule;
use App\Http\Transformers\ModuleTransformer;
use Dingo\Api\Contract\Http\Request;
use Exception;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Facades\Log;
use League\Uri\Schemes\Http as HttpUri;
use RuntimeException;
use Symfony\Component\VarDumper\VarDumper;

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

        $count = ($request->has('count')) ? $request->get('count') : 15;

        $modules = $modules->paginate($count);
        return $this->response->paginator($modules, new ModuleTransformer);
    }

    public function show($id)
    {
        $module = Module::findOrFail($id);
        return $this->response->item($module, new ModuleTransformer);
    }

    public function add(Request $request)
    {
        if(!$request->has('uri')) {
            return response()->json([
                'error' => "Missing URI"
            ], 422);
        }

        try {
            $uri = HttpUri::createFromString(
                $request->input('uri')
            );

            if($uri->getHost() != "github.com") {
                return response()->json([
                    'error' => "We only support GitHub for now :/"
                ], 422);
            }
            
            // Save the new module URL
            $newModule = new NewModule;
            $newModule->uri  = $uri->__toString();
            $newModule->user_ip = $request->ip();
            $newModule->save();
            
            return response()->json([
                'uri' => $uri->__toString()
            ]);

        } catch(Exception $e) {
            return response()->json([
                'error' => "Malformed URI"
            ], 422);
        }
    }
}
