<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SeoMeta;

class SeoMetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seoPages = [
            [
                'page_url' => '/',
                'page_name' => 'Home',
                'page_type' => 'home',
                'meta_title' => 'ECD - Premium Mobile Car Detailing Services',
                'meta_description' => 'Expert mobile car detailing delivered to your door. Premium packages, professional care, and guaranteed satisfaction. Book your detailing service today.',
                'meta_keywords' => 'car detailing, mobile car wash, premium detailing, car cleaning, professional detailing',
                'focus_keyword' => 'mobile car detailing',
                'canonical_url' => url('/'),
                'og_title' => 'ECD - Premium Mobile Car Detailing',
                'og_description' => 'Professional mobile car detailing services with premium packages delivered to your location.',
                'og_image' => asset('assets/img/logo.png'),
                'og_type' => 'website',
                'og_locale' => 'en_US',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'ECD - Premium Mobile Car Detailing',
                'twitter_description' => 'Expert mobile car detailing at your doorstep.',
                'twitter_site' => '@ecddetailing',
                'index' => true,
                'follow' => true,
                'is_active' => true,
                'priority' => 100,
                'schema_markup' => json_encode([
                    '@context' => 'https://schema.org',
                    '@type' => 'Organization',
                    'name' => 'ECD',
                    'url' => url('/'),
                    'logo' => asset('assets/img/logo.png'),
                    'description' => 'Premium mobile car detailing services',
                    'address' => [
                        '@type' => 'PostalAddress',
                        'addressCountry' => 'US'
                    ]
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
            ],
            [
                'page_url' => '/about',
                'page_name' => 'About Us',
                'page_type' => 'page',
                'meta_title' => 'About ECD - Professional Car Detailing Experts',
                'meta_description' => 'Learn about ECD, your trusted mobile car detailing service. We deliver premium care with expert technicians and guaranteed satisfaction.',
                'meta_keywords' => 'about ecd, car detailing experts, professional detailing team',
                'focus_keyword' => 'car detailing experts',
                'canonical_url' => url('/about'),
                'og_title' => 'About ECD - Professional Car Detailing Team',
                'og_description' => 'Meet the team behind ECD mobile car detailing services.',
                'og_image' => asset('assets/img/logo.png'),
                'og_type' => 'website',
                'og_locale' => 'en_US',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'About ECD',
                'twitter_description' => 'Professional car detailing experts at your service.',
                'twitter_site' => '@ecddetailing',
                'index' => true,
                'follow' => true,
                'is_active' => true,
                'priority' => 90,
            ],
            [
                'page_url' => '/services',
                'page_name' => 'Services',
                'page_type' => 'page',
                'meta_title' => 'Car Detailing Services - Premium Packages | ECD',
                'meta_description' => 'Explore our premium car detailing packages. From basic wash to full detailing, we offer professional services tailored to your needs.',
                'meta_keywords' => 'car detailing services, detailing packages, car wash services, premium detailing',
                'focus_keyword' => 'car detailing packages',
                'canonical_url' => url('/services'),
                'og_title' => 'Premium Car Detailing Packages',
                'og_description' => 'Professional detailing services from basic to premium packages.',
                'og_image' => asset('assets/img/logo.png'),
                'og_type' => 'website',
                'og_locale' => 'en_US',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'Car Detailing Services',
                'twitter_description' => 'Premium packages for every need.',
                'twitter_site' => '@ecddetailing',
                'index' => true,
                'follow' => true,
                'is_active' => true,
                'priority' => 95,
                'schema_markup' => json_encode([
                    '@context' => 'https://schema.org',
                    '@type' => 'Service',
                    'serviceType' => 'Car Detailing',
                    'provider' => [
                        '@type' => 'Organization',
                        'name' => 'ECD'
                    ],
                    'areaServed' => 'US',
                    'availableChannel' => [
                        '@type' => 'ServiceChannel',
                        'serviceUrl' => url('/services')
                    ]
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
            ],
            [
                'page_url' => '/pricing',
                'page_name' => 'Pricing',
                'page_type' => 'page',
                'meta_title' => 'Car Detailing Pricing - Affordable Premium Services',
                'meta_description' => 'Check our transparent pricing for mobile car detailing services. Competitive rates for premium quality. Get your free quote today.',
                'meta_keywords' => 'car detailing prices, detailing cost, mobile detailing rates',
                'focus_keyword' => 'car detailing pricing',
                'canonical_url' => url('/pricing'),
                'og_title' => 'Affordable Car Detailing Pricing',
                'og_description' => 'Transparent pricing for premium mobile car detailing.',
                'og_image' => asset('assets/img/logo.png'),
                'og_type' => 'website',
                'og_locale' => 'en_US',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'Car Detailing Pricing',
                'twitter_description' => 'Check our competitive rates.',
                'twitter_site' => '@ecddetailing',
                'index' => true,
                'follow' => true,
                'is_active' => true,
                'priority' => 85,
            ],
            [
                'page_url' => '/contact',
                'page_name' => 'Contact Us',
                'page_type' => 'page',
                'meta_title' => 'Contact ECD - Book Your Car Detailing Service',
                'meta_description' => 'Get in touch with ECD for premium mobile car detailing. Book your service, ask questions, or request a free quote. We are here to help.',
                'meta_keywords' => 'contact car detailing, book detailing service, car wash contact',
                'focus_keyword' => 'book car detailing',
                'canonical_url' => url('/contact'),
                'og_title' => 'Contact ECD Car Detailing',
                'og_description' => 'Book your mobile car detailing service today.',
                'og_image' => asset('assets/img/logo.png'),
                'og_type' => 'website',
                'og_locale' => 'en_US',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'Contact ECD',
                'twitter_description' => 'Book your service today.',
                'twitter_site' => '@ecddetailing',
                'index' => true,
                'follow' => true,
                'is_active' => true,
                'priority' => 80,
                'schema_markup' => json_encode([
                    '@context' => 'https://schema.org',
                    '@type' => 'ContactPage',
                    'name' => 'Contact ECD',
                    'description' => 'Get in touch with ECD for mobile car detailing services',
                    'url' => url('/contact')
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES),
            ],
            [
                'page_url' => '/gallery',
                'page_name' => 'Gallery',
                'page_type' => 'page',
                'meta_title' => 'Car Detailing Gallery - Before & After Results | ECD',
                'meta_description' => 'View our impressive car detailing results. Browse before and after photos showcasing our premium mobile detailing work.',
                'meta_keywords' => 'car detailing gallery, before after detailing, detailing results',
                'focus_keyword' => 'car detailing results',
                'canonical_url' => url('/gallery'),
                'og_title' => 'Car Detailing Gallery - Amazing Results',
                'og_description' => 'See the transformation. Browse our gallery of detailed cars.',
                'og_image' => asset('assets/img/logo.png'),
                'og_type' => 'website',
                'og_locale' => 'en_US',
                'twitter_card' => 'summary_large_image',
                'twitter_title' => 'Gallery',
                'twitter_description' => 'See our amazing detailing results.',
                'twitter_site' => '@ecddetailing',
                'index' => true,
                'follow' => true,
                'is_active' => true,
                'priority' => 75,
            ],
        ];

        foreach ($seoPages as $seoData) {
            $seo = SeoMeta::updateOrCreate(
                ['page_url' => $seoData['page_url']],
                $seoData
            );

            // Calculate and update SEO score
            $seo->updateSeoScore();
        }

        $this->command->info('SEO meta data seeded successfully!');
    }
}
