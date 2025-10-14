<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryItem;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleryItems = [
            // Videos
            [
                'type' => 'video',
                'title' => 'Paint Protection Film Installation',
                'description' => 'Watch our expert technicians install paint protection film on a luxury vehicle',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'video_thumbnail' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'type' => 'video',
                'title' => 'Ceramic Coating Application Process',
                'description' => 'Step-by-step ceramic coating application demonstration',
                'video_url' => 'https://youtu.be/dQw4w9WgXcQ',
                'video_thumbnail' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'type' => 'video',
                'title' => 'Window Tinting Tutorial',
                'description' => 'Professional window tinting process explained',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'video_thumbnail' => null,
                'order' => 3,
                'is_active' => true,
            ],

            // Interior
            [
                'type' => 'interior',
                'title' => 'Luxury Sedan Interior Detailing',
                'description' => 'Premium leather seats after deep cleaning and conditioning',
                'image' => 'assets/img/showcase1.webp',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'type' => 'interior',
                'title' => 'SUV Interior Restoration',
                'description' => 'Complete interior detailing with upholstery cleaning',
                'image' => 'assets/img/showcase2.webp',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'type' => 'interior',
                'title' => 'Sports Car Interior Detailing',
                'description' => 'Detailed cleaning of sports car interior',
                'image' => 'assets/img/showcase3.webp',
                'order' => 6,
                'is_active' => true,
            ],

            // Exterior
            [
                'type' => 'exterior',
                'title' => 'Ceramic Coating Finish',
                'description' => 'Showroom shine after ceramic coating application',
                'image' => 'assets/img/showcase4.webp',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'type' => 'exterior',
                'title' => 'Paint Correction Results',
                'description' => 'Flawless paint finish after multi-stage correction',
                'image' => 'assets/img/showcase5.webp',
                'order' => 8,
                'is_active' => true,
            ],
            [
                'type' => 'exterior',
                'title' => 'PPF Protected Vehicle',
                'description' => 'Paint protection film providing invisible protection',
                'image' => 'assets/img/showcase6.webp',
                'order' => 9,
                'is_active' => true,
            ],

            // Before & After
            [
                'type' => 'before&after',
                'title' => 'Complete Detailing Transformation',
                'description' => 'See the dramatic difference our detailing services make',
                'before_image' => 'assets/img/showcase1.webp',
                'after_image' => 'assets/img/showcase2.webp',
                'order' => 10,
                'is_active' => true,
            ],
            [
                'type' => 'before&after',
                'title' => 'Paint Correction Comparison',
                'description' => 'Before and after paint correction service',
                'before_image' => 'assets/img/showcase3.webp',
                'after_image' => 'assets/img/showcase4.webp',
                'order' => 11,
                'is_active' => true,
            ],
            [
                'type' => 'before&after',
                'title' => 'Headlight Restoration',
                'description' => 'Crystal clear headlights after restoration',
                'before_image' => 'assets/img/showcase5.webp',
                'after_image' => 'assets/img/showcase6.webp',
                'order' => 12,
                'is_active' => true,
            ],
        ];

        foreach ($galleryItems as $item) {
            GalleryItem::create($item);
        }
    }
}
