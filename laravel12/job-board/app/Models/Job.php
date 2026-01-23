<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $table = 'job_listings';

    public const EXPERIENCE = ['entry', 'intermediate', 'senior'];
    public const CATEGORY = [
        'IT',
        'Finance',
        'Sales',
        'Marketing',
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    #[Scope]
    protected function filter(Builder $query, array $filters): Builder
    {
        return $query->when(
            $filters['search'] ?? null,
            fn($query, $search) => $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('employer', fn ($query) =>
                        $query->where('company_name', 'like', "%{$search}%")
                    );
            })
        )->when(
            $filters['min_salary'] ?? null,
            fn($query, $minSalary) => $query->where('salary', '>=', $minSalary)
        )->when(
            $filters['max_salary'] ?? null,
            fn($query, $maxSalary) => $query->where('salary', '<=', $maxSalary)
        )->when(
            $filters['experience'] ?? null,
            fn($query, $experience) =>
            in_array($experience, self::EXPERIENCE, true)
                ? $query->where('experience', $experience)
                : $query
        )->when(
            $filters['category'] ?? null,
            fn($query, $category) =>
            in_array($category, self::CATEGORY, true)
                ? $query->where('category', $category)
                : $query
        );
    }
}
