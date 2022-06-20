<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class student extends Model
{
    use Sortable;
    protected $primaryKey = 'sid';
    public $timestamps = false;
    protected $table="student";
    protected $fillable=['sid','fname','lname','birthplace', 'birthdate'];
    public $sortable=['sid','fname','lname','birthplace', 'birthdate'];

}
