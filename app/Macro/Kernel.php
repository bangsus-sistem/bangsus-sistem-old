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
        'active' => Blueprint\Booleans\ActiveBlueprint::class,
        'allBranches' => Blueprint\Booleans\AllBranchesBlueprint::class,
        'allFeatures' => Blueprint\Booleans\AllFeaturesBlueprint::class,
        'allReports' => Blueprint\Booleans\AllReportsBlueprint::class,
        'allWidgets' => Blueprint\Booleans\AllWidgetsBlueprint::class,
        'hidden' => Blueprint\Booleans\HiddenBlueprint::class,
        'locked' => Blueprint\Booleans\LockedBlueprint::class,
        'required' => Blueprint\Booleans\RequiredBlueprint::class,
        'state' => Blueprint\Booleans\StateBlueprint::class,
        // Date macro.
        'dateOfBirth' => Blueprint\Date\DateOfBirthBlueprint::class,
        'endDate' => Blueprint\Date\EndDateBlueprint::class,
        'startDate' => Blueprint\Date\StartDateBlueprint::class,
        // Foreign macro.
        'action' => Blueprint\Foreign\ActionBlueprint::class,
        'addressType' => Blueprint\Foreign\AddressTypeBlueprint::class,
        'bearerToken' => Blueprint\Foreign\BearerTokenBlueprint::class,
        'bloodType' => Blueprint\Foreign\BloodTypeBlueprint::class,
        'branch' => Blueprint\Foreign\BranchBlueprint::class,
        'branchType' => Blueprint\Foreign\BranchTypeBlueprint::class,
        'contactType' => Blueprint\Foreign\ContactTypeBlueprint::class,
        'division' => Blueprint\Foreign\DivisionBlueprint::class,
        'employeeAssignment' => Blueprint\Foreign\EmployeeAssignmentBlueprint::class,
        'employee' => Blueprint\Foreign\EmployeeBlueprint::class,
        'employeePhotoType' => Blueprint\Foreign\EmployeePhotoTypeBlueprint::class,
        'entryPoint' => Blueprint\Foreign\EntryPointBlueprint::class,
        'feature' => Blueprint\Foreign\FeatureBlueprint::class,
        'gender' => Blueprint\Foreign\GenderBlueprint::class,
        'image' => Blueprint\Foreign\ImageBlueprint::class,
        'jobTitle' => Blueprint\Foreign\JobTitleBlueprint::class,
        'module' => Blueprint\Foreign\ModuleBlueprint::class,
        'package' => Blueprint\Foreign\PackageBlueprint::class,
        'report' => Blueprint\Foreign\ReportBlueprint::class,
        'role' => Blueprint\Foreign\RoleBlueprint::class,
        'user' => Blueprint\Foreign\UserBlueprint::class,
        'userAdmit' => Blueprint\Foreign\UserAdmitBlueprint::class,
        'userCreate' => Blueprint\Foreign\UserCreateBlueprint::class,
        'userDelete' => Blueprint\Foreign\UserDeleteBlueprint::class,
        'userTimestamps' => Blueprint\Foreign\UserTimestampsBlueprint::class,
        'userUpdate' => Blueprint\Foreign\UserUpdateBlueprint::class,
        'widget' => Blueprint\Foreign\WidgetBlueprint::class,
        // String macro.
        'address' => Blueprint\Strings\AddressBlueprint::class,
        'code' => Blueprint\Strings\CodeBlueprint::class,
        'contact' => Blueprint\Strings\ContactBlueprint::class,
        'description' => Blueprint\Strings\DescriptionBlueprint::class,
        'fullName' => Blueprint\Strings\FullNameBlueprint::class,
        'name' => Blueprint\Strings\NameBlueprint::class,
        'nik' => Blueprint\Strings\NikBlueprint::class,
        'note' => Blueprint\Strings\NoteBlueprint::class,
        'password' => Blueprint\Strings\PasswordBlueprint::class,
        'pin' => Blueprint\Strings\PinBlueprint::class,
        'placeOfBirth' => Blueprint\Strings\PlaceOfBirthBlueprint::class,
        'ref' => Blueprint\Strings\RefBlueprint::class,
        'username' => Blueprint\Strings\UsernameBlueprint::class,
        'token' => Blueprint\Strings\TokenBlueprint::class,
        // Text
        'storageDir' => Blueprint\Text\StorageDirBlueprint::class,
        // Timestamps macro.
        'admittedAt' => Blueprint\Timestamp\AdmittedAtBlueprint::class,
        'expiredAt' => Blueprint\Timestamp\ExpiredAtBlueprint::class,
        'usedAt' => Blueprint\Timestamp\UsedAtBlueprint::class,
    ];

    /**
     * @var array
     */
    public static $rules = [
        // Database rule.
        'exists' => Rule\Database\ExistsRule::class,
    ];
}
