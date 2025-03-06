<?php
namespace App\Console\Commands;
use App\Models\Course;
use App\Models\GiftCard;
use App\Models\Lottery;
use App\Models\Product;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Blog;
use App\Models\Store;
class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create();
        Course::get()->each(function (Course $course) use ($sitemap) {
            $sitemap->add(
                Url::create("/course/{$course->slug}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });
        Blog::get()->each(function (Blog $blog) use ($sitemap) {
            $sitemap->add(
                Url::create("/blog-detail/{$blog->url}")
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        });
        Product::get()->each(function (Product $product) use ($sitemap) {
            $sitemap->add(
                Url::create("/product/{$product->url}")
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        });
        Product::get()->each(function (Product $product) use ($sitemap) {
            $sitemap->add(
                Url::create("/product/{$product->slug}")
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        });
        Lottery::get()->each(function (Lottery $lottery) use ($sitemap) {
            $sitemap->add(
                Url::create("/lottery/{$lottery->slug}")
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        });
        GiftCard::get()->each(function (GiftCard $item) use ($sitemap) {
            $sitemap->add(
                Url::create("/gift-card/{$item->slug}")
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        });


        $sitemap->writeToFile(public_path('sitemap.xml'));
    }



}
