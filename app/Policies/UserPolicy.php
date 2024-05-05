<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        // ตรวจสอบว่าผู้ใช้สามารถดูข้อมูล user ได้หรือไม่
        return $user->is_admin;
    }

    public function manage(User $user)
    {
        // ตรวจสอบว่าผู้ใช้เป็น admin หรือไม่
        return $user->is_admin;
    }
}
