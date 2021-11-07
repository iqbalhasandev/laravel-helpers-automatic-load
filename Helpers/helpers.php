<?php

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        return App\Facades\Setting::get($key, $default);
    }
}


if (!function_exists('menu')) {
    function menu($menuName, $type = null, array $options = [])
    {
        $menu = new App\Models\Menu\Menu;
        return $menu->display($menuName, $type, $options);
    }
}

if (!function_exists('get_file_name')) {
    function get_file_name($name)
    {
        preg_match('/(_)([0-9])+$/', $name, $matches);
        if (count($matches) == 3) {
            return Illuminate\Support\Str::replaceLast($matches[0], '', $name) . '_' . (intval($matches[2]) + 1);
        } else {
            return $name . '_1';
        }
    }
}


if (!function_exists('storage_asset')) {
    function storage_asset($file = null, $driver = null)
    {
        $getDriver = $driver ?? Illuminate\Support\Facades\Config::get('filesystems.default');
        $path = Illuminate\Support\Facades\Config::get('filesystems.disks.' . $getDriver)['url'];
        if ($file) {
            return $path . '/' . $file;
        } else {
            return $path;
        }
    }
}

if (!function_exists('admin_asset')) {
    function admin_asset($file = null)
    {
        $path = 'admin-assets/' . $file;
        return app('url')->asset($path);
    }
}
if (!function_exists('can')) {

    function can($permission)
    {
        return auth()->user()->can($permission);
    }
}

if (!function_exists('user_role')) {
    function user_role($user = null)
    {
        if ($user != null) {
            return $user->roles()->first();
        }
        return auth()->user()->roles()->first();
    }
}

if (!function_exists('store_file')) {

    function store_file($file, $path = 'image')
    {
        return Illuminate\Support\Facades\Storage::putFile($path, $file);
    }
}

if (!function_exists('delete_file')) {

    function delete_file($path)
    {
        return Illuminate\Support\Facades\Storage::delete($path);
    }
}


if (!function_exists('selected')) {

    function selected($valueOne = null, $valueTwo = null)
    {
        if ($valueOne == $valueTwo) {
            return 'selected';
        }
        return false;
    }
}

if (!function_exists('permission_check')) {

    function permission_check($permissions, $permission_id)
    {
        foreach ($permissions as $permission) {
            if ($permission->id == $permission_id) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('can')) {
    function can($permission, $user = null)
    {
        if ($user) {
            return $user->can($permission);
        }
        return Illuminate\Support\Facades\Auth::user()->can($permission);
    }
}
if (!function_exists('get_user_role')) {
    function get_user_role($user = null, $key = null)
    {
        if ($user != null) {
            return $user->roles()->first();
        }
        return auth()->user()->roles()->first();
    }
}


if (!function_exists('deleteFile')) {

    function deleteFile($path)
    {
        return Illuminate\Support\Facades\Storage::delete($path);
    }
}
if (!function_exists('getGroupData')) {

    function getGroupData($data)
    {
        $groupData = [];
        foreach ($data as $d) {
            $groupData[$d->group][] = $d;
        }
        return $groupData;
    }
}
