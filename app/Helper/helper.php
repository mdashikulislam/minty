<?php
if (!function_exists('getRoleName')){
    function getRoleName($user){
        $user = \App\Models\User::with('roles')->where('id',$user->id)->first();
        return $user->roles[0]->name;
    }
}
