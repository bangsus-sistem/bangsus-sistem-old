import contactType from './hrm/contact-type';
import addressType from './hrm/address-type';
import employeePhotoType from './hrm/employee-photo-type';
import bloodType from './hrm/blood-type';
import gender from './hrm/gender.js';
import division from './hrm/division';
import jobTitle from './hrm/job-title';
import attendanceType from './hrm/attendance-type';

export default [
    ...contactType,
    ...addressType,
    ...employeePhotoType,
    ...bloodType,
    ...gender,
    ...division,
    ...jobTitle,
    ...attendanceType,
];
