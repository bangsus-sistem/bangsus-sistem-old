<?php

namespace App\Macro;

class Kernel
{
    /**
     * @var array
     */
    public static $blueprints = [
        // Boolean macro.
        'access' => Blueprint\Booleans\AccessBlueprint::class,
        'required' => Blueprint\Booleans\RequiredBlueprint::class,
        // Date macro.
        'dateOfBirth' => Blueprint\Date\DateOfBirthBlueprint::class,
        'endDate' => Blueprint\Date\EndDateBlueprint::class,
        'startDate' => Blueprint\Date\StartDateBlueprint::class,
        // Foreign macro.
        'addressType' => Blueprint\Foreign\AddressTypeBlueprint::class,
        'bloodType' => Blueprint\Foreign\BloodTypeBlueprint::class,
        'contactType' => Blueprint\Foreign\ContactTypeBlueprint::class,
        'division' => Blueprint\Foreign\DivisionBlueprint::class,
        'employeeAssignment' => Blueprint\Foreign\EmployeeAssignmentBlueprint::class,
        'employee' => Blueprint\Foreign\EmployeeBlueprint::class,
        'employeePhotoType' => Blueprint\Foreign\EmployeePhotoTypeBlueprint::class,
        'entryPoint' => Blueprint\Foreign\EntryPointBlueprint::class,
        'gender' => Blueprint\Foreign\GenderBlueprint::class,
        'jobTitle' => Blueprint\Foreign\JobTitleBlueprint::class,
        'userAdmit' => Blueprint\Foreign\UserAdmitBlueprint::class,
        // String macro.
        'address' => Blueprint\Strings\AddressBlueprint::class,
        'contact' => Blueprint\Strings\ContactBlueprint::class,
        'nik' => Blueprint\Strings\NikBlueprint::class,
        'placeOfBirth' => Blueprint\Strings\PlaceOfBirthBlueprint::class,
        // Timestamps macro.
        'admittedAt' => Blueprint\Timestamp\AdmittedAtBlueprint::class,
        'usedAt' => Blueprint\Timestamp\UsedAtBlueprint::class,
    ];
}
