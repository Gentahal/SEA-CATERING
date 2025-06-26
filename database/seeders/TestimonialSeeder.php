<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            'name' => 'Ahmad Surya',
            'message' => 'Makanannya enak banget dan pelayanannya ramah. Recommended banget!',
            'rating' => 5,
        ]);

        Testimonial::create([
            'name' => 'Dewi Lestari',
            'message' => 'Cateringnya pas untuk acara kantor kami. Makanan selalu fresh!',
            'rating' => 4,
        ]);

        Testimonial::create([
            'name' => 'Rizky Pratama',
            'message' => 'Menu variatif dan pengiriman tepat waktu. Terima kasih!',
            'rating' => 5,
        ]);
    }
}
