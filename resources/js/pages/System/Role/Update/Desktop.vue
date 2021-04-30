<template>
    <fragment>
        <h3>Role</h3>
        <bsb-card class="my-3">
            <bsb-card-body-spinner-error-back
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
                :default-back="{ name: 'system.role' }"
            >
                <h5 class="mb-3">Ubah Role</h5>
                <form
                    class="mt-5"
                    @submit.prevent="
                        submitForm('/ajax/auth/role', 'put', {
                            resolve: true,
                            reject: false
                        }).then(() => $router.push({ name: 'system.role' }))
                    "
                >
                    <bsb-form-group>
                        <label>Kode</label>
                        <bsb-input-errors v-model="form.data['code']" :errors="form.errors['code']" :readonly="true" />
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
                        <label>Fitur</label>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_features']" :value="true">
                            <bsb-form-check-label label="Akses Tak Terbatas" />
                        </bsb-form-check>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_features']" :value="false">
                            <bsb-form-check-label label="Akses Terbatas" />
                        </bsb-form-check>
                        <bsb-table-responsive class="mt-1" v-if="!form.data['all_features']">
                            <bsb-table>
                                <thead>
                                    <bsb-tr>
                                        <bsb-th>#</bsb-th>
                                        <bsb-th>Nama Modul</bsb-th>
                                        <bsb-th
                                            justify="center"
                                            v-for="(action, i) in resources['actions']"
                                            :key="i"
                                        >
                                            {{ action['name'] }}
                                        </bsb-th>
                                    </bsb-tr>
                                </thead>
                                <tbody>
                                    <template
                                        v-for="_package in resources['packages']"
                                    >
                                        <!-- Package Title -->
                                        <bsb-tr :key="'package-row-' + _package['id']">
                                            <bsb-td :colspan="packageTitleColspan">
                                                <b>
                                                    {{ _package['name'] }}
                                                </b>
                                            </bsb-td>
                                        </bsb-tr>
                                        <!-- Module in the package -->
                                        <bsb-tr
                                            v-for="(module, i) in getModulesByPackageId(_package['id'])"
                                            :key="'module-row-' + module['id']"
                                        >
                                            <bsb-td>
                                                {{ i + 1 }}
                                            </bsb-td>
                                            <bsb-td>
                                                {{ module['name'] }}
                                            </bsb-td>
                                            <bsb-td
                                                justify="center"
                                                v-for="(action, i) in resources['actions']"
                                                :key="i"
                                            >
                                                <input
                                                    type="checkbox"
                                                    v-if="featureExists(module['id'], action['id'])"
                                                    v-model="form.data['feature_ids']"
                                                    :value="getFeature(module['id'], action['id'])['id']"
                                                >
                                            </bsb-td>
                                        </bsb-tr>
                                    </template>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
                        <bsb-errors-wrapper :errors="form.errors['feature_ids']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Widget</label>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_widgets']" :value="true">
                            <bsb-form-check-label label="Akses Tak Terbatas" />
                        </bsb-form-check>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_widgets']" :value="false">
                            <bsb-form-check-label label="Akses Terbatas" />
                        </bsb-form-check>
                        <bsb-table-responsive class="mt-1" v-if="!form.data['all_widgets']">
                            <bsb-table>
                                <tbody>
                                    <template
                                        v-for="_package in resources['packages']"
                                    >
                                        <!-- Package Title -->
                                        <bsb-tr :key="'package-row-' + _package['id']">
                                            <bsb-td :colspan="packageTitleColspan">
                                                <b>
                                                    {{ _package['name'] }}
                                                </b>
                                            </bsb-td>
                                        </bsb-tr>
                                        <!-- Widget in the package -->
                                        <bsb-tr
                                            v-for="(widget, i) in getWidgetsByPackageId(_package['id'])"
                                            :key="'widget-row-' + widget['id']"
                                        >
                                            <bsb-td>
                                                {{ i + 1 }}
                                            </bsb-td>
                                            <bsb-td>
                                                {{ widget['name'] }}
                                            </bsb-td>
                                            <bsb-td
                                                justify="center"
                                            >
                                                <input
                                                    type="checkbox"
                                                    v-model="form.data['widget_ids']"
                                                    :value="widget['id']"
                                                >
                                            </bsb-td>
                                        </bsb-tr>
                                    </template>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
                        <bsb-errors-wrapper :errors="form.errors['widget_ids']" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Laporan</label>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_reports']" :value="true">
                            <bsb-form-check-label label="Akses Tak Terbatas" />
                        </bsb-form-check>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_reports']" :value="false">
                            <bsb-form-check-label label="Akses Terbatas" />
                        </bsb-form-check>
                        <bsb-table-responsive class="mt-1" v-if="!form.data['all_reports']">
                            <bsb-table>
                                <tbody>
                                    <template
                                        v-for="_package in resources['packages']"
                                    >
                                        <!-- Package Title -->
                                        <bsb-tr :key="'package-row-' + _package['id']">
                                            <bsb-td :colspan="packageTitleColspan">
                                                <b>
                                                    {{ _package['name'] }}
                                                </b>
                                            </bsb-td>
                                        </bsb-tr>
                                        <!-- Widget in the package -->
                                        <bsb-tr
                                            v-for="(report, i) in getReportsByPackageId(_package['id'])"
                                            :key="'report-row-' + report['id']"
                                        >
                                            <bsb-td>
                                                {{ i + 1 }}
                                            </bsb-td>
                                            <bsb-td>
                                                {{ report['name'] }}
                                            </bsb-td>
                                            <bsb-td
                                                justify="center"
                                            >
                                                <input
                                                    type="checkbox"
                                                    v-model="form.data['report_ids']"
                                                    :value="report['id']"
                                                >
                                            </bsb-td>
                                        </bsb-tr>
                                    </template>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
                        <bsb-errors-wrapper :errors="form.errors['report_ids']" />
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