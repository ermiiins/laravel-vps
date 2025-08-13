<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Construction category and its children
        $construction = Category::create([
            'name' => 'Construction',
            'slug' => 'construction',
            'description' => 'Construction materials and services',
            'icon' => 'fas fa-hard-hat',
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Building Materials',
            'slug' => 'building-materials',
            'description' => 'Various building materials',
            'parent_id' => $construction->id,
            'icon' => 'fas fa-cubes',
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Tools & Equipment',
            'slug' => 'tools-equipment',
            'description' => 'Construction tools and equipment',
            'parent_id' => $construction->id,
            'icon' => 'fas fa-tools',
            'sort_order' => 2,
        ]);

        Category::create([
            'name' => 'Concrete & Cement',
            'slug' => 'concrete-cement',
            'description' => 'Concrete and cement products',
            'parent_id' => $construction->id,
            'icon' => 'fas fa-hammer',
            'sort_order' => 3,
        ]);

        // Woodworking category and its children
        $woodworking = Category::create([
            'name' => 'Woodworking',
            'slug' => 'woodworking',
            'description' => 'Wood products and woodworking services',
            'icon' => 'fas fa-tree',
            'sort_order' => 2,
        ]);

        Category::create([
            'name' => 'Lumber & Boards',
            'slug' => 'lumber-boards',
            'description' => 'Various types of lumber and boards',
            'parent_id' => $woodworking->id,
            'icon' => 'fas fa-layer-group',
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Custom Furniture',
            'slug' => 'custom-furniture',
            'description' => 'Custom made furniture',
            'parent_id' => $woodworking->id,
            'icon' => 'fas fa-chair',
            'sort_order' => 2,
        ]);

        Category::create([
            'name' => 'Wood Finishing',
            'slug' => 'wood-finishing',
            'description' => 'Wood stains, varnishes, and finishes',
            'parent_id' => $woodworking->id,
            'icon' => 'fas fa-paint-brush',
            'sort_order' => 3,
        ]);

        // Wood Pellets category and its children
        $pellets = Category::create([
            'name' => 'Wood Pellets',
            'slug' => 'wood-pellets',
            'description' => 'Wood pellets for heating',
            'icon' => 'fas fa-fire',
            'sort_order' => 3,
        ]);

        Category::create([
            'name' => 'Premium Pellets',
            'slug' => 'premium-pellets',
            'description' => 'High-quality premium wood pellets',
            'parent_id' => $pellets->id,
            'icon' => 'fas fa-star',
            'sort_order' => 1,
        ]);

        Category::create([
            'name' => 'Standard Pellets',
            'slug' => 'standard-pellets',
            'description' => 'Standard quality wood pellets',
            'parent_id' => $pellets->id,
            'icon' => 'fas fa-fire-alt',
            'sort_order' => 2,
        ]);

        Category::create([
            'name' => 'Bulk Pellets',
            'slug' => 'bulk-pellets',
            'description' => 'Wood pellets in bulk quantities',
            'parent_id' => $pellets->id,
            'icon' => 'fas fa-truck',
            'sort_order' => 3,
        ]);
    }
}