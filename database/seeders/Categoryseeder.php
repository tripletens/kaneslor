<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // name description
        // PHARMACISTS
        // SALES EXECUTIVES
        // MEDICAL SALES REPRESENTATIVES
        // ACCOUNTANTS
        // ADMIN OFFICERS
        // BUSINESS MANAGERS
        // WAREHOUSE OFFICERS
        // INVENTORY MANAGERS
        // INTERN PHARMACISTS
        // AREA SALES MANAGERS
        // CUSTOMER SERVICE OFFICERS
        // SALES MANAGERS
        // LOGISTICS OFFICERS
        // PHARMACY TECHNICIAN
        // DRIVERS
        // SALES ATTENDANTS
        // DIGITAL MARKETERS
        // GRAPHICS DESIGNERS
        $categories = [
            [
                'name' => 'PHARMACISTS',
                'slug' => Str::lower(Str::slug('PHARMACISTS')),
                'description' => 'This hold all jobs for the post of a pharmacy'
            ],
            [
                'name' => 'SALES EXECUTIVES',
                'slug' => Str::lower(Str::slug('SALES EXECUTIVES')),
                'description' => 'This hold all jobs for the post of a SALES EXECUTIVES'
            ],
            [
                'name' => 'MEDICAL SALES REPRESENTATIVES',
                'slug' => Str::lower(Str::slug('MEDICAL SALES REPRESENTATIVES')),
                'description' => 'This hold all jobs for the post of a MEDICAL SALES REPRESENTATIVES'
            ],
            [
                'name' => 'ACCOUNTANTS',
                'slug' => Str::lower(Str::slug('ACCOUNTANTS')),
                'description' => 'This hold all jobs for the post of a ACCOUNTANTS'
            ],
            [
                'name' => 'ADMIN OFFICERS',
                'slug' => Str::lower(Str::slug('ADMIN OFFICERS')),
                'description' => 'This hold all jobs for the post of a ADMIN OFFICERS'
            ],
            [
                'name' => 'BUSINESS MANAGERS',
                'slug' => Str::lower(Str::slug('BUSINESS MANAGERS')),
                'description' => 'This hold all jobs for the post of a BUSINESS MANAGERS'
            ],
            [
                'name' => 'WAREHOUSE OFFICERS',
                'slug' => Str::lower(Str::slug('BUSINESS MANAGERS')),
                'description' => 'This hold all jobs for the post of a BUSINESS MANAGERS'
            ],
            [
                'name' => 'BUSINESS MANAGERS',
                'slug' => Str::lower(Str::slug('BUSINESS MANAGERS')),
                'description' => 'This hold all jobs for the post of a BUSINESS MANAGERS'
            ],
            [
                'name' => 'WAREHOUSE OFFICERS',
                'slug' => Str::lower(Str::slug('WAREHOUSE OFFICERS')),
                'description' => 'This hold all jobs for the post of a WAREHOUSE OFFICERS'
            ],
            [
                'name' => 'INVENTORY MANAGERS',
                'slug' => Str::lower(Str::slug('INVENTORY MANAGERS')),
                'description' => 'This hold all jobs for the post of a INVENTORY MANAGERS'
            ],
            [
                'name' => 'INTERN PHARMACISTS',
                'slug' => Str::lower(Str::slug('INTERN PHARMACISTS')),
                'description' => 'This hold all jobs for the post of a INTERN PHARMACISTS'
            ],
            [
                'name' => 'AREA SALES MANAGERS',
                'slug' => Str::lower(Str::slug('AREA SALES MANAGERS')),
                'description' => 'This hold all jobs for the post of a AREA SALES MANAGERS'
            ],
            [
                'name' => 'CUSTOMER SERVICE OFFICERS',
                'slug' => Str::lower(Str::slug('CUSTOMER SERVICE OFFICERS')),
                'description' => 'This hold all jobs for the post of a CUSTOMER SERVICE OFFICERS'
            ],
            [
                'name' => 'SALES MANAGERS',
                'slug' => Str::lower(Str::slug('SALES MANAGERS')),
                'description' => 'This hold all jobs for the post of a SALES MANAGERS'
            ],
            [
                'name' => 'LOGISTICS OFFICERS',
                'slug' => Str::lower(Str::slug('LOGISTICS OFFICERS')),
                'description' => 'This hold all jobs for the post of a LOGISTICS OFFICERS'
            ],
            [
                'name' => 'PHARMACY TECHNICIAN',
                'slug' => Str::lower(Str::slug('PHARMACY TECHNICIAN')),
                'description' => 'This hold all jobs for the post of a PHARMACY TECHNICIAN'
            ],
            [
                'name' => 'DRIVERS',
                'slug' => Str::lower(Str::slug('DRIVERS')),
                'description' => 'This hold all jobs for the post of a DRIVERS'
            ],
            [
                'name' => 'SALES ATTENDANTS',
                'slug' => Str::lower(Str::slug('SALES ATTENDANTS')),
                'description' => 'This hold all jobs for the post of a SALES ATTENDANTS'
            ],
            [
                'name' => 'DIGITAL MARKETERS',
                'slug' => Str::lower(Str::slug('DIGITAL MARKETERS')),
                'description' => 'This hold all jobs for the post of a DIGITAL MARKETERS'
            ],
            [
                'name' => 'GRAPHICS DESIGNERS',
                'slug' => Str::lower(Str::slug('GRAPHICS DESIGNERS')),
                'description' => 'This hold all jobs for the post of a GRAPHICS DESIGNERS'
            ],
        ];
        foreach($categories as $category){
            Category::create($category);
        }
    }
}
