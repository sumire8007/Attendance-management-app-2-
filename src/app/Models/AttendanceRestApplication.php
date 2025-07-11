<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceRestApplication extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'attendance_application_id',
        'rest_application_id',
        'approval_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function attendanceApplication()
    {
        return $this->belongsTo(AttendanceApplication::class);
    }
    public function restApplication()
    {
        return $this->belongsTo(RestApplication::class);
    }

}
