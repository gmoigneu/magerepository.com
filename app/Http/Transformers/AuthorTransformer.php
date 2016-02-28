<?php

namespace App\Http\Transformers;

use App\Entities\Author;
use League\Fractal;

class AuthorTransformer extends Fractal\TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'modules'
    ];

    public function transform(Author $author)
    {
        return [
            'id'      => (int) $author->id,
            'username'    => $author->username,
            'links'   => [
                [
                    'rel' => 'self',
                    'uri' => '/api/v1/authors/'.$author->id,
                ]
            ],
        ];
    }

    /**
     * Include Modules
     *
     * @return League\Fractal\ItemResource
     */
    public function includeModules(Author $author)
    {
        return $this->collection($author->modules, new ModuleTransformer);
    }
}