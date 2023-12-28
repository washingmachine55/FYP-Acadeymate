<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create-educational-institutes']);
        Permission::create(['name' => 'view-educational-institutes']);
        Permission::create(['name' => 'edit-educational-institutes']);
        Permission::create(['name' => 'delete-educational-institutes']);

        Permission::create(['name' => 'create-batches']);
        Permission::create(['name' => 'view-batches']);
        Permission::create(['name' => 'edit-batches']);
        Permission::create(['name' => 'delete-batches']);

        Permission::create(['name' => 'create-courses']);
        Permission::create(['name' => 'view-courses']);
        Permission::create(['name' => 'edit-courses']);
        Permission::create(['name' => 'delete-courses']);

        Permission::create(['name' => 'create-modules']);
        Permission::create(['name' => 'view-modules']);
        Permission::create(['name' => 'edit-modules']);
        Permission::create(['name' => 'delete-modules']);

        Permission::create(['name' => 'create-class']);
        Permission::create(['name' => 'view-class']);
        Permission::create(['name' => 'edit-class']);
        Permission::create(['name' => 'delete-class']);

        Permission::create(['name' => 'create-class-sections']);
        Permission::create(['name' => 'view-class-sections']);
        Permission::create(['name' => 'edit-class-sections']);
        Permission::create(['name' => 'delete-class-sections']);

        Permission::create(['name' => 'create-subjects']);
        Permission::create(['name' => 'view-subjects']);
        Permission::create(['name' => 'edit-subjects']);
        Permission::create(['name' => 'delete-subjects']);

        Permission::create(['name' => 'create-lecturers']);
        Permission::create(['name' => 'view-lecturers']);
        Permission::create(['name' => 'edit-lecturers']);
        Permission::create(['name' => 'delete-lecturers']);

        Permission::create(['name' => 'create-students']);
        Permission::create(['name' => 'view-students']);
        Permission::create(['name' => 'edit-students']);
        Permission::create(['name' => 'delete-students']);

        Permission::create(['name' => 'create-guardians']);
        Permission::create(['name' => 'view-guardians']);
        Permission::create(['name' => 'edit-guardians']);
        Permission::create(['name' => 'delete-guardians']);


        $devAdminRole = Role::create(['name' => 'Developer/Super Admin']);
        $educatonalInstituteAdminRole = Role::create(['name' => 'Educational Institute Admin']);
        $lecturerRole = Role::create(['name' => 'Lecturer']);
        $guardianRole = Role::create(['name' => 'Guardian']);
        $studentRole = Role::create(['name' => 'Student']);

        $devAdminRole->givePermissionTo([
            // add all permissions here
            'create-educational-institutes',
            'view-educational-institutes',
            'edit-educational-institutes',
            'delete-educational-institutes',
            'create-batches',
            'view-batches',
            'edit-batches',
            'delete-batches',
            'create-courses',
            'view-courses',
            'edit-courses',
            'delete-courses',
            'create-modules',
            'view-modules',
            'edit-modules',
            'delete-modules',
            'create-class',
            'view-class',
            'edit-class',
            'delete-class',
            'create-class-sections',
            'view-class-sections',
            'edit-class-sections',
            'delete-class-sections',
            'create-subjects',
            'view-subjects',
            'edit-subjects',
            'delete-subjects',
            'create-lecturers',
            'view-lecturers',
            'edit-lecturers',
            'delete-lecturers',
            'create-students',
            'view-students',
            'edit-students',
            'delete-students',
            'create-guardians',
            'view-guardians',
            'edit-guardians',
            'delete-guardians',
        ]);

        $educatonalInstituteAdminRole->givePermissionTo([
            // add permission here for educational institutes, as well as for batches, courses, modules, class, class-sections, subjects, lecturers, students, guardians
            'create-educational-institutes',
            'view-educational-institutes',
            'edit-educational-institutes',
            'create-batches',
            'view-batches',
            'edit-batches',
            'delete-batches',
            'create-courses',
            'view-courses',
            'edit-courses',
            'delete-courses',
            'create-modules',
            'view-modules',
            'edit-modules',
            'delete-modules',
            'create-class',
            'view-class',
            'edit-class',
            'delete-class',
            'create-class-sections',
            'view-class-sections',
            'edit-class-sections',
            'delete-class-sections',
            'create-subjects',
            'view-subjects',
            'edit-subjects',
            'delete-subjects',
            'create-lecturers',
            'view-lecturers',
            'edit-lecturers',
            'delete-lecturers',
            'create-students',
            'view-students',
            'edit-students',
            'delete-students',
            'create-guardians',
            'view-guardians',
            'edit-guardians',
            'delete-guardians',
        ]);

        $lecturerRole->givePermissionTo([
            // add permission here for class, class-sections, subjects
            'view-batches',
            'view-courses',
            'view-modules',
            'create-class',
            'view-class',
            'edit-class',
            'delete-class',
            'create-class-sections',
            'view-class-sections',
            'edit-class-sections',
            'delete-class-sections',
            'create-subjects',
            'view-subjects',
            'edit-subjects',
            'delete-subjects',
            'view-lecturers',
            'create-students',
            'view-students',
            'view-guardians',
        ]);

        $guardianRole->givePermissionTo([
            // add permission here for students
            'view-students',
            'view-guardians',
        ]);

        $studentRole->givePermissionTo([
            // add permission here for class, class-sections, subjects
            'view-educational-institutes',
            'view-batches',
            'view-courses',
            'view-modules',
            'view-class',
            'view-class-sections',
            'view-subjects',
            'view-lecturers',
            'view-students',
            'view-guardians',
        ]);
    }
}
