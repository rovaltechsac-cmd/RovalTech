<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'summary',
        'description',
        'image',
        'year',
        'client',
        'featured',
        'published',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'published' => 'boolean',
    ];

    /**
     * Solo proyectos visibles en el sitio público.
     */
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    /**
     * Genera el slug automáticamente si no se proporciona.
     */
    protected static function booted()
    {
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });

        static::updating(function ($project) {
            if ($project->isDirty('title') && empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    /**
     * URL pública de la imagen del proyecto.
     */
    public function imageUrl(): string
    {
        return $this->image
            ? asset('uploads/projects/'.$this->image)
            : asset('images/project-placeholder.svg');
    }
}
