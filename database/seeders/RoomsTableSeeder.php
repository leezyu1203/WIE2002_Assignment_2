<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'name' => 'Standard Room',
                'description' => "Experience comfort and convenience in our well-appointed Standard Room, designed for both business and leisure travelers. Our Standard Rooms offer a cozy and modern ambiance, ensuring a restful stay. Whether you're here for a short stay or an extended visit, our Standard Rooms provide all the essentials you need for a relaxing and productive stay.
                    \nFeatures:
                        - Comfortable queen-sized bed
                        - Private bathroom with complimentary toiletries
                        - Flat-screen TV with cable channels
                        - Free high-speed Wi-Fi
                        - Work desk and chair
                        - Air conditioning
                        - In-room safe
                        - Tea and coffee making facilities",
                'price' => 200.00,
                'images' => json_encode([
                    'images/StandardRoom1.jpg',
                    'images/StandardRoom2.jpg',
                    'images/StandardRoom3.jpg',
                ]),
                'numsRooms' => 10,
            ],
            [
                'name' => 'Deluxe Room',
                'description' => "Upgrade your stay with our Deluxe Room, offering extra space and enhanced amenities for a more luxurious experience. Perfect for those who appreciate a touch of elegance and added comfort. Enjoy the perfect blend of comfort and style in our Deluxe Room, designed to make your stay truly memorable.
                    \nFeatures:
                        - Spacious room with a queen or king-sized bed
                        - Private bathroom with upgraded toiletries and a rain shower
                        - Flat-screen TV with premium cable channels
                        - Complimentary high-speed Wi-Fi
                        - Cozy seating area
                        - Air conditioning
                        - Mini-bar and refrigerator
                        - In-room safe
                        - Tea and coffee making facilities
                        - Complimentary bottled water",
                'price' => 280.00,
                'images' => json_encode([
                    'images/DeluxeRoom1.jpg',
                    'images/DeluxeRoom2.jpg',
                    'images/DeluxeRoom3.jpg',
                ]),
                'numsRooms' => 10,
            ],
            [
                'name' => 'Superior Room',
                'description' => "Indulge in the added space and refined comfort of our Superior Room, perfect for guests seeking a more luxurious and relaxing stay. With premium amenities and elegant decor, our Superior Rooms provide an elevated experience. Experience the perfect balance of luxury and comfort in our Superior Room, designed to exceed your expectations.
                    \nFeatures:
                        - Generously sized room with a king-sized bed
                        - Private bathroom with deluxe toiletries and a rain shower
                        - Flat-screen TV with a wide selection of premium channels
                        - Complimentary high-speed Wi-Fi
                        - Comfortable seating area with sofa
                        - Air conditioning
                        - Mini-bar and refrigerator
                        - In-room safe
                        - Tea and coffee making facilities
                        - Complimentary bottled water and welcome snacks
                        - Bathrobes and slippers",
                'price' => 400.00,
                'images' => json_encode([
                    'images/SuperiorRoom1.jpg',
                    'images/SuperiorRoom2.jpg',
                    'images/SuperiorRoom3.jpg',
                ]),
                'numsRooms' => 5,
            ],
            [
                'name' => 'Suite',
                'description' => "Elevate your stay with our luxurious Suite, offering expansive space and top-tier amenities for an unforgettable experience. Ideal for families, business travelers, or anyone seeking the ultimate in comfort and style. Experience unparalleled luxury and comfort in our Suite, designed to provide a home away from home.
                    \nFeatures:
                        - Separate living room and bedroom
                        - King-sized bed with premium bedding
                        - Spacious private bathroom with deluxe toiletries, rain shower, and bathtub
                        - Two flat-screen TVs with premium channels
                        - Complimentary high-speed Wi-Fi
                        - Elegant seating area with sofa and coffee table
                        - Air conditioning
                        - Mini-bar and refrigerator
                        - In-room safe
                        - Tea and coffee making facilities
                        - Complimentary bottled water and welcome snacks
                        - Bathrobes and slippers
                        - Dining area or kitchenette (in selected suites)",
                'price' => 350.00,
                'images' => json_encode([
                    'images/Suite1.jpg',
                    'images/Suite2.jpg',
                    'images/Suite3.jpg',
                ]),
                'numsRooms' => 5,
            ],
        ]);
    }
}
