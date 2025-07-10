<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Permission as SpatiePermission;
class Permission extends SpatiePermission
{
    use HasFactory;
    
    protected $fillable = ['name', 'guard_name','icon','route_name'];

//     public function roles()
// {
//     return $this->belongsToMany(Role::class);
// }
public function roles()
{
    return $this->belongsToMany(Role::class, 'role_permission');
}

}
