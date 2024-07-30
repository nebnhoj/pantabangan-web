<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create('/')->setLastModificationDate(now()))
            ->add(Url::create('/about')->setLastModificationDate(now()))
            ->add(Url::create('/blogs')->setLastModificationDate(now()))
            ->add(Url::create('/attractions')->setLastModificationDate(now()))
            ->add(Url::create('/news')->setLastModificationDate(now()));

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }
}
