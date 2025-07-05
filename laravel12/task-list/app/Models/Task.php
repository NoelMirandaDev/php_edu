<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    // Explicitly define which fields should be allowed to be mass assigned
    protected $fillable = ['title', 'description', 'long_description',];

    // This allows all fields to be fillable except the ones listed here but not recommended when adding new fields (security concerns)
    //protected $guarded = ['secret',];

    public function toggleCompleted(): void {
        $this->completed = !$this->completed;
        $this->save();
    }
}
