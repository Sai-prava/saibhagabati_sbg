<?php

namespace App\Classes;

use App\Models\Shift;
use App\Models\Team;
use App\Shift as AppShift;
use App\Team as AppTeam;
use App\User;
use Sentinel;

class ViewHelper
{
    // public function getManagerSelectLists()
    // {
    //     $managerRole = Sentinel::findRoleBySlug('manager');

    //     $managers = $managerRole->users()->with('tbl_roles')
    //         ->select('id', 'first_name', 'last_name')
    //         ->get();

    //     return $managers;
    // }

    public function getShiftSelectLists()
    {
        $shifts = AppShift::where('status', '=','active')
            ->select('id', 'title')
            ->get();

        return $shifts;
    }

    public function getTeamSelectLists()
    {
        $teams = AppTeam::where('status', '=','active')
            ->select('id', 'name')
            ->get();

        return $teams;
    }

    public function getEmployeeSelectLists()
    {
        // $employeeRole = Sentinel::findRoleBySlug('user');
        // dd($employeeRole);
        $employees = User::where('role',2)
            ->select('id', 'user_name')
            ->get();
        // dd($employees);
        return $employees;
    }

    public function getEmployeesCount(){
        // $employeeRole = Sentinel::findRoleBySlug('user');

        $employees = User::where('role',2)
            ->select('id', 'user_name')
            ->get();

        return $employees->count();
    }

    // public function getAllRoles()
    // {
    //     $roles = Sentinel::getRoleRepository()->all();

    //     return $roles;
    // }

    // public function getAdminRoles(){

    //     $roles = Sentinel::getRoleRepository()->all();

    //     return $roles->where('slug', '!=', 'user');
    // }
}
