<?php

namespace App\Http\Controllers\Api\V1;

use App\Entities\Author;
use App\Http\Transformers\AuthorTransformer;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Dingo\Api\Routing\Helpers;

class AuthorController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Helpers;

    public function index()
    {
        $authors = Author::paginate(20);
        return $this->response->paginator($authors, new AuthorTransformer);
    }

    public function show($id)
    {
        $author = Author::findOrFail($id);
        return $this->response->item($author, new AuthorTransformer);
    }
}
