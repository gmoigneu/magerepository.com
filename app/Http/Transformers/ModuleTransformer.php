<?php

namespace App\Http\Transformers;

use App\Entities\Module;
use League\Fractal;

class ModuleTransformer extends Fractal\TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'author'
    ];

    protected $defaultIncludes = [
        'author'
    ];

    public function transform(Module $module)
    {
        return [
            'id'                        => (int) $module->id,
            'name'                      => $module->name,
            'description'               => $module->description,
            'license'                   => $module->license,
            'stars'                     => $module->stars,
            'forks'                     => $module->forks,
            'watchers'                  => $module->watchers,
            'url'                       => $module->url,
            'github_url'                => $module->github_url,
            'repository_pushed_at'      => $module->repository_pushed_at,
            'repository_created_at'     => $module->repository_created_at,
            'clone_url'                 => $module->clone_url,
            'ssh_url'                   => $module->ssh_url,
            'git_url'                   => $module->git_url,
            'open_issues'               => $module->open_issues,
            'links'   => [
                [
                    'rel' => 'self',
                    'uri' => '/api/v1/modules/'.$module->id,
                ],
                [
                    'rel' => 'author',
                    'uri' => '/api/v1/author/'.$module->author->id,
                ]
            ],
        ];
    }

    /**
     * Include Author
     *
     * @return League\Fractal\ItemResource
     */
    public function includeAuthor(Module $module)
    {
        return $this->item($module->author, new AuthorTransformer);
    }
}