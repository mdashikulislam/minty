<?php
if (!function_exists('getRoleName')){
    function getRoleName($user){
        $user = \App\Models\User::with('roles')->where('id',$user->id)->first();
        return $user->roles[0]->name;
    }
}
if (!function_exists('uploadSingleFile')){
    function uploadSingleFile($request = null, $path = '', $prefix = ''): string
    {
        $file = $request;
        $fileName = $prefix.'_'.time().rand(0000,9999).'.'.$file->getClientOriginalExtension();
        $destination = $path;
        $file->storeAs($destination,$fileName,'public');
        return $destination . '/'.$fileName;
    }
}

