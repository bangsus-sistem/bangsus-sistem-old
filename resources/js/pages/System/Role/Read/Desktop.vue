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
                <h5 class="mb-3">Lihat Role</h5>
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>Kode</label>
                        <bsb-input v-model="form.data['code']" :errors="form.errors['code']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Nama</label>
                        <bsb-input v-model="form.data['name']" :errors="form.errors['name']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Deskripsi</label>
                        <bsb-textarea v-model="form.data['description']" :errors="form.errors['description']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Catatan</label>
                        <bsb-textarea v-model="form.data['note']" :errors="form.errors['note']" :readonly="true" />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Fitur</label>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_features']" :value="true" :disabled="true">
                            <bsb-form-check-label label="Akses Tak Terbatas" />
                        </bsb-form-check>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_features']" :value="false" :disabled="true">
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
                                                <span v-if="featureExists(module['id'], action['id'])">
                                                    <bsb-switch-icon :value="featureIsChecked(getFeature(module['id'], action['id'])['id'])" />
                                                </span>
                                            </bsb-td>
                                        </bsb-tr>
                                    </template>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Widget</label>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_widgets']" :value="true" :disabled="true">
                            <bsb-form-check-label label="Akses Tak Terbatas" />
                        </bsb-form-check>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_widgets']" :value="false" :disabled="true">
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
                                                <bsb-switch-icon :value="widgetIsChecked(widget['id'])" />
                                            </bsb-td>
                                        </bsb-tr>
                                    </template>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Laporan</label>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_reports']" :value="true" :disabled="true">
                            <bsb-form-check-label label="Akses Tak Terbatas" />
                        </bsb-form-check>
                        <bsb-form-check>
                            <input class="form-check-input" type="radio" v-model="form.data['all_reports']" :value="false" :disabled="true">
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
                                                <bsb-switch-icon :value="reportIsChecked(report['id'])" />
                                            </bsb-td>
                                        </bsb-tr>
                                    </template>
                                </tbody>
                            </bsb-table>
                        </bsb-table-responsive>
                    </bsb-form-group>
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