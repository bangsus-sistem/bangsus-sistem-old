<template>
    <fragment>
        <h3>Karyawan</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'hrm.employee' }"
            >
                <h5 class="mb-3">Ubah Karyawan</h5>
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>NIP</label>
                        <bsb-input v-model="form.data['code']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>NIK</label>
                        <bsb-input v-model="form.data['nik']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama Lengkap</label>
                        <bsb-input v-model="form.data['full_name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tempat Lahir</label>
                        <bsb-input v-model="form.data['place_of_birth']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tanggal Lahir</label>
                        <bsb-input v-model="form.data['date_of_birth']" :readonly="true" type="date" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Golongan Darah</label>
                        <bsb-select v-model="form.data['blood_type_id']" :disabled="true">
                            <option :value="null">-- Pilih Golongan Darah --</option>
                            <option
                                v-for="(bloodType, i) in resources['blood_types']"
                                :key="i"
                                :value="bloodType['id']"
                            >
                                {{ bloodType['name'] }}
                            </option>
                        </bsb-select>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Jenis Kelamin</label>
                        <bsb-select v-model="form.data['gender_id']" :disabled="true">
                            <option :value="null">-- Pilih Jenis Kelamin --</option>
                            <option
                                v-for="(gender, i) in resources['genders']"
                                :key="i"
                                :value="gender['id']"
                            >
                                {{ gender['name'] }}
                            </option>
                        </bsb-select>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Cabang Penerima</label>
                        <bsb-select v-model="form.data['first_branch_id']" :disabled="true">
                            <option :value="null">-- Pilih Cabang Penerima --</option>
                            <option
                                v-for="(branch, i) in resources['branches']"
                                :key="i"
                                :value="branch['id']"
                            >
                                {{ branch['code'] }} - {{ branch['name'] }}
                            </option>
                        </bsb-select>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Jabatan Pertama</label>
                        <bsb-select v-model="form.data['first_job_title_id']" :disabled="true">
                            <option :value="null">-- Pilih Jabatan Pertama --</option>
                            <option
                                v-for="(jobTitle, i) in resources['job_titles']"
                                :key="i"
                                :value="jobTitle['id']"
                            >
                                {{ jobTitle['code'] }} - {{ jobTitle['name'] }}
                            </option>
                        </bsb-select>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Tanggal Mulai Bekerja</label>
                        <bsb-input v-model="form.data['start_date']" type="date" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea v-model="form.data['description']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea v-model="form.data['note']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Foto Karyawan</label>
                        <bsb-table-responsive>
                            <bsb-table :hover="true">
                                <thead class="thead-light">
                                    <bsb-tr>
                                        <bsb-th>#</bsb-th>
                                        <bsb-th>Tipe Foto Karyawan</bsb-th>
                                        <bsb-th>Foto</bsb-th>
                                    </bsb-tr>
                                </thead>
                                <tbody>
                                    <bsb-tr v-for="(employeePhoto, i) in form.data['employee_photos']" :key="i">
                                        <bsb-td>{{ i + 1 }}</bsb-td>
                                        <bsb-td>
                                            {{ getEmployeePhotoTypeString(employeePhoto['employee_photo_type_id']) }}
                                            <sup class="text-danger" v-if="getEmployeePhotoTypeRequired(employeePhoto['employee_photo_type_id'])">*</sup>
                                        </bsb-td>
                                        <bsb-td>
                                            <bsb-image-viewer :id="form.data['employee_photos'][i]['image_id']" />
                                        </bsb-td>
                                    </bsb-tr>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Alamat Karyawan</label>
                        <bsb-table-responsive>
                            <bsb-table :hover="true">
                                <thead class="thead-light">
                                    <bsb-tr>
                                        <bsb-th>#</bsb-th>
                                        <bsb-th>Tipe Alamat Karyawan</bsb-th>
                                        <bsb-th>Alamat</bsb-th>
                                    </bsb-tr>
                                </thead>
                                <tbody>
                                    <bsb-tr v-for="(employeeAddress, i) in form.data['employee_addresses']" :key="i">
                                        <bsb-td>{{ i + 1 }}</bsb-td>
                                        <bsb-td>
                                            {{ getAddressTypeString(employeeAddress['address_type_id']) }}
                                            <sup class="text-danger" v-if="getAddressTypeRequired(employeeAddress['address_type_id'])">*</sup>
                                        </bsb-td>
                                        <bsb-td>
                                            <bsb-input
                                                v-model="form.data['employee_addresses'][i]['address']"
                                                :readonly="true"
                                            />
                                        </bsb-td>
                                    </bsb-tr>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Kontak Karyawan</label>
                        <bsb-table-responsive>
                            <bsb-table :hover="true">
                                <thead class="thead-light">
                                    <bsb-tr>
                                        <bsb-th>#</bsb-th>
                                        <bsb-th>Tipe Kontak Karyawan</bsb-th>
                                        <bsb-th>Kontak</bsb-th>
                                    </bsb-tr>
                                </thead>
                                <tbody>
                                    <bsb-tr v-for="(employeeContact, i) in form.data['employee_contacts']" :key="i">
                                        <bsb-td>{{ i + 1 }}</bsb-td>
                                        <bsb-td>
                                            {{ getContactTypeString(employeeContact['contact_type_id']) }}
                                            <sup class="text-danger" v-if="getContactTypeRequired(employeeContact['contact_type_id'])">*</sup>
                                        </bsb-td>
                                        <bsb-td>
                                            <bsb-input
                                                v-model="form.data['employee_contacts'][i]['contact']"
                                                :readonly="true"
                                            />
                                        </bsb-td>
                                    </bsb-tr>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
                    </bsb-form-group>
                    <bsb-button-spinner type="submit" :loading="state.form.loading">
                        Submit
                    </bsb-button-spinner>
                </form>
            </bsb-card-body-spinner-error-back>
        </bsb-card>
    </fragment>
</template>

<script>
import mixin from './mixin'

export default {
    mixins: [mixin],
}
</script>