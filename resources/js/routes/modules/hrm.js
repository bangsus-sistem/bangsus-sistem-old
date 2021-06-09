import contactType from './hrm/contact-type';
import addressType from './hrm/address-type';
import employeePhotoType from './hrm/employee-photo-type';
import gender from './hrm/gender.js';
import division from './hrm/division';
import jobTitle from './hrm/job-title';
import attendanceType from './hrm/attendance-type';

export default [
    ...contactType,
    ...addressType,
    ...employeePhotoType,
    ...gender,
    ...division,
    ...jobTitle,
    ...attendanceType,
];
