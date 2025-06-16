<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Traits\HasPermissions;

class Role extends SpatieRole
{
    use HasPermissions;
// class Role extends Model
// {
    use HasFactory;
    protected $fillable = ['name', 'guard_name'];
    //

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}
