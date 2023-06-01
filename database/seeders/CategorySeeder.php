<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Ordenadores',
                'img_url' => '../../../assets/icons/categories/computer-case.png'
            ],
            [
                'name' => 'Portátiles',
                'img_url' => '../../../assets/icons/categories/laptop.png'
            ],
            [
                'name' => 'Smartphones',
                'img_url' => '../../../assets/icons/categories/mobile-phone.png'
            ],
            [
                'name' => 'Tablets',
                'img_url' => '../../../assets/icons/categories/tablet.png'
            ],
            [
                'name' => 'Componentes',
                'img_url' => '../../../assets/icons/categories/components-cubes.png'
            ],
            [
                'name' => 'Gaming',
                'img_url' => '../../../assets/icons/categories/gaming.png'
            ],
            [
                'name' => 'Oficina',
                'img_url' => '../../../assets/icons/categories/office.png'
            ],
            [
                'name' => 'Redes/Cables',
                'img_url' => '../../../assets/icons/categories/internet.png'
            ],
            [
                'name' => 'Almacenamiento',
                'img_url' => '../../../assets/icons/categories/hard-drive.png'
            ],
            [
                'name' => 'Periféricos',
                'img_url' => '../../../assets/icons/categories/keyboard-and-mouse.png'
            ],
            [
                'name' => 'Televisores',
                'img_url' => '../../../assets/icons/categories/television.png'
            ],
            [
                'name' => 'Audio/Video',
                'img_url' => '../../../assets/icons/categories/multimedia-file.png'
            ],
        ];
        
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
