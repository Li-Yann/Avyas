<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MCQ_Record extends Model
{
    protected $table = "mcq_records";
    function scopeWithMCQ($query)
    {
        return $query->join('mcqs', 'mcq_records.mcq_id', '=', 'mcqs.id')
            ->select('mcqs.question', 'mcqs.option_a', 'mcqs.option_b', 'mcqs.option_c', 'mcqs.option_d', 'mcqs.correct_ans', 'mcq_records.*');
    }
}
