<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Bus\DispatchesJobs;

class DatabaseSeeder extends Seeder
{
    use DispatchesJobs;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);

        $modules = [
            'https://github.com/ashsmith/magento2-controller-module',
            'https://github.com/ashsmith/magento2-blog-module-tutorial',
            'https://github.com/UltimateModuleCreator/Umc_Base',
            'https://github.com/Magestore/Bannerslider-Magento2',
        ];

        foreach($modules as $module) {
            $this->dispatch(new \App\Jobs\InsertModule($module));
        }
    }
}
