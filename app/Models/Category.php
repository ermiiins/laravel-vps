<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'icon',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Generate slug automatically when creating/updating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('name') && empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    // Relationship: Parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Relationship: Child categories
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('is_active', true)->orderBy('sort_order');
    }

    // Scope: Only active categories
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope: Only parent categories (no parent_id)
    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }

    // Check if category is parent
    public function isParent()
    {
        return $this->parent_id === null;
    }

    // Check if category has children
    public function hasChildren()
    {
        return $this->children()->count() > 0;
    }

    // Get full category path (for breadcrumbs)
    public function getFullPath()
    {
        if ($this->parent) {
            return $this->parent->name . ' → ' . $this->name;
        }
        return $this->name;
    }
}