<template>
    <fragment>
        <h3>User</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'system.user' }"
            >
                <h5 class="mb-3">Tambah User</h5>
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/auth/user', 'post', {
                            resolve: true,
                            reject: false
                        }).then(() => $router.push({ name: 'system.user' }))
                    "
                >
                    <bsb-form-group>
                        <label>Kode</label>
                        <bsb-input-errors v-model="form.data['code']" :errors="form.errors['code']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama</label>
                        <bsb-input-errors v-model="form.data['name']" :errors="form.errors['name']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea-errors v-model="form.data['description']" :errors="form.errors['description']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea-errors v-model="form.data['note']" :errors="form.errors['note']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Cabang</label>
                        <bsb-form-radios
                            :options="[{val: true, label: 'Akses Tak Terbatas'}, {val: false, label: 'Akses Terbatas'}]"
                            v-model="form.data['all_branches']"
                        />
                        <BranchTable
                            class="mt-1"
                            :all-branches="form.data['all_branches']"
                            :resources="resources"
                            v-model="form.data['branch_ids']"
                        />
                        <bsb-errors-wrapper :errors="form.errors['branch_ids']" />
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
import BranchTable from '../common/BranchTable'

export default {
    mixins: [mixin],
    components: { BranchTable },
}
</script>