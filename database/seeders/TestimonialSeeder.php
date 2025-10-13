<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Sarah Johnson',
                'role' => 'Business Owner',
                'review' => 'ECD provided exceptional service! My car looks brand new after their premium treatment. The attention to detail was impressive, and the convenience of mobile service made it so easy. Highly recommend their professional team!',
                'vehicle_image' => 'assets/img/testimonial-1.png',
                'profile_image' => 'assets/img/profile-1.png',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Michael Chen',
                'role' => 'Software Engineer',
                'review' => 'I\'ve been using ECD\'s services for over a year now, and I couldn\'t be happier. Their monthly subscription saves me time and money while keeping my car in pristine condition. The team is always punctual and professional.',
                'vehicle_image' => 'assets/img/testimonial-1.png',
                'profile_image' => 'assets/img/profile-1.png',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Emma Rodriguez',
                'role' => 'Marketing Director',
                'review' => 'The full detail treatment exceeded my expectations! ECD transformed my car inside and out. The before and after difference is remarkable. Their eco-friendly products and meticulous work make them stand out from the competition.',
                'vehicle_image' => 'assets/img/testimonial-1.png',
                'profile_image' => 'assets/img/profile-1.png',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonialData) {
            Testimonial::create($testimonialData);
        }

        $this->command->info('Testimonials seeded successfully!');
    }
}
