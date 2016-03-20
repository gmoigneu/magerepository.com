<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\Entities\Module;
use App\Entities\Author;
use League\Uri\Schemes\Http as HttpUri;
use Symfony\Component\VarDumper\VarDumper;

class InsertModule extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $uri;

    /**
     * Create a new job instance.
     *
     * @param $uri
     */
    public function __construct($uri)
    {
        $this->uri = $uri;
    }

    /**
     * Execute the job.
     *
     * @throws \Exception
     */
    public function handle()
    {
        $uri = HttpUri::createFromString(
            $this->uri
        );

        $path = $uri->path->toArray();
        if(count($path) < 2 || $uri->host->__toString() != "github.com") {
            throw new \Exception('Github URL malformed');
        } else {
            $username = $path[0];
            $name = $path[1];
        }
        
        $author = Author::firstOrNew(['username' => $username]);
        $author->save();

        $client = new \Github\Client(
            new \Github\HttpClient\CachedHttpClient(array('cache_dir' => sys_get_temp_dir().'/github-api-cache'))
        );

        try {
            $repo = $client->api('repo')->show($username, $name);

            $author->type = $repo['owner']['type'];
            $author->save();

            $module = Module::firstOrNew(['github_id' => $repo['id']]);

            $readme = $client->api('repo')->contents()->readme($username, $name);

            if(array_key_exists('content', $readme)) {
                $module->readme = $readme['content'];
            }

            if($client->api('repo')->contents()->exists($username, $name, 'composer.json')) {
                $composer = json_decode(base64_decode($client->api('repo')->contents()->show($username, $name, '/composer.json')['content']));
                $module->require = $composer->require;
                $module->composer = $composer->name;
            }

            $module->name = $repo['name'];
            $module->description = $repo['description'];
            $module->repository_pushed_at = $repo['created_at'];
            $module->repository_created_at = $repo['pushed_at'];
            $module->stars = $repo['stargazers_count'];
            $module->forks = $repo['forks'];
            $module->watchers = $repo['subscribers_count'];
            $module->github_url = $repo['html_url'];

            $module->clone_url = $repo['clone_url'];
            $module->ssh_url = $repo['ssh_url'];
            $module->git_url = $repo['git_url'];
            $module->open_issues = $repo['open_issues'];
            
            $module->author()->associate($author);
            $module->save();

        } catch (\Github\Exception\RuntimeException $e) {
            // Repository not found
        }
    }
}
