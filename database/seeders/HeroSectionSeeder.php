<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSection;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $heroSections = [
            [
                'page_identifier' => 'home',
                'page_name' => 'Home Page',
                'title' => 'Premium mobile car detailing. Perfection delivered to your door.',
                'subtitle' => null,
                'media_type' => 'video',
                'background_image' => 'assets/img/hero-bg1.png',
                'background_video' => 'https://www.youtube.com/embed/VzyFqwlDWDg?autoplay=1&mute=1&controls=0&showinfo=0&rel=0&loop=1&playlist=VzyFqwlDWDg&modestbranding=1',
                'background_color' => 'bg-transparent',
                'show_social_icons' => true,
                'is_active' => true,
            ],
            [
                'page_identifier' => 'about',
                'page_name' => 'About Us Page',
                'title' => 'About Us',
                'subtitle' => null,
                'media_type' => 'image',
                'background_image' => 'assets/img/bg-hero.png',
                'background_video' => null,
                'background_color' => 'bg-transparent',
                'show_social_icons' => false,
                'is_active' => true,
            ],
            [
                'page_identifier' => 'services-subscriptions',
                'page_name' => 'Services & Subscriptions Page',
                'title' => 'Services & Subscriptions',
                'subtitle' => null,
                'media_type' => 'image',
                'background_image' => 'assets/img/bg-hero.png',
                'background_video' => null,
                'background_color' => 'bg-[#ededed]',
                'show_social_icons' => false,
                'is_active' => true,
            ],
            [
                'page_identifier' => 'contact',
                'page_name' => 'Contact Us Page',
                'title' => 'Contact Us',
                'subtitle' => null,
                'media_type' => 'image',
                'background_image' => 'assets/img/bg-hero.png',
                'background_video' => null,
                'background_color' => 'bg-transparent',
                'show_social_icons' => false,
                'is_active' => true,
            ],
            [
                'page_identifier' => 'gallery',
                'page_name' => 'Gallery Page',
                'title' => 'Our Work Speaks for Itself',
                'subtitle' => null,
                'media_type' => 'image',
                'background_image' => 'assets/img/bg-hero.png',
                'background_video' => null,
                'background_color' => 'bg-[#ededed]',
                'show_social_icons' => false,
                'is_active' => true,
            ],
            [
                'page_identifier' => 'blog',
                'page_name' => 'Blog Page',
                'title' => 'Latest News & Tips',
                'subtitle' => 'Expert advice and updates from our detailing professionals',
                'media_type' => 'image',
                'background_image' => 'assets/img/bg-hero.png',
                'background_video' => null,
                'background_color' => 'bg-transparent',
                'show_social_icons' => false,
                'is_active' => true,
            ],
        ];

        foreach ($heroSections as $heroSection) {
            HeroSection::create($heroSection);
        }
    }
}
