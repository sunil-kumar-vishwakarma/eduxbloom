@php
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

$user = auth()->user();
$isAdmin = $user && $user->is_admin == 1;

// ✅ Get grouped permissions
if ($isAdmin) {
    // Admin: get all permissions grouped by module
    $permissions = Permission::orderBy('module')->get()->groupBy('module');
} else {
    // Team User: fetch permissions assigned via roles
    $roleIds = DB::table('model_has_roles')
        ->where('model_type', 'App\Models\User')
        ->where('model_id', $user->id)
        ->pluck('role_id');

    $permissionIds = DB::table('role_has_permissions')
    ->whereIn('role_id', [$user->role_id]) // Wrap in array to make it iterable
    ->pluck('permission_id'); // ✅ Get only the column you need (not full rows)

$permissions = Permission::whereIn('id', $permissionIds)
    ->orderBy('module')
    ->get()
    ->groupBy('module');
       
}

@endphp

<aside id="sidebar" class="sidebar">
    <div class="sidebar-logo">
        <a href="{{ route('dashboard') }}" style="text-decoration: none; color: inherit;">
            <h2>EduX</h2>
        </a>
    </div>

    <ul class="sidebar-menu">
        {{-- ✅ Static Dashboard link always at the top --}}
        <li class="menu-item">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line icon"></i> Dashboard
            </a>
        </li>

        
        @foreach($permissions as $module => $modulePermissions)
    @if(strtolower($module) !== 'dashboard') {{-- skip dashboard --}}
        @php
            $firstPerm = $modulePermissions->first();
        @endphp

        @if($module === 'Payment')
            {{-- 🔻 Payment with dropdown --}}
            <li class="menu-item dropdown {{ request()->routeIs('received-payments', 'failed-payments', 'payment-setup') ? 'active' : '' }}">
                <a href="javascript:void(0);">
                    <i class="{{ $firstPerm->icon ?? 'fas fa-wallet' }} icon"></i>
                    {{ $module }} ▼
                </a>
                <ul class="submenu">
                    <li class="submenu-item">
                        <a href="{{ route('received-payments') }}" class="{{ request()->routeIs('received-payments') ? 'active' : '' }}">
                            Received
                        </a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('failed-payments') }}" class="{{ request()->routeIs('failed-payments') ? 'active' : '' }}">
                            Failed / Pending
                        </a>
                    </li>
                    <li class="submenu-item">
                        <a href="{{ route('payment-setup') }}" class="{{ request()->routeIs('payment-setup') ? 'active' : '' }}">
                            Setup Method
                        </a>
                    </li>
                </ul>
            </li>
        @else
            {{-- 🔸 Regular single module item --}}
            <li class="menu-item">
                <a href="{{ route($firstPerm->route_name ?? 'dashboard') }}"
                   class="{{ request()->routeIs($firstPerm->route_name ?? '') ? 'active' : '' }}">
                    <i class="{{ $firstPerm->icon ?? 'fas fa-folder' }} icon"></i>
                    {{ $module }}
                </a>
            </li>
        @endif
    @endif
@endforeach

    </ul>
</aside>


