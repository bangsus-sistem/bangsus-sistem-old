<template>
    <fragment>
        <h3>Modul</h3>
        <bsb-card class="mt-3">
            <bsb-card-body-spinner-error
                :loading="state.page.loading"
                :error="state.page.error"
                :error-message="state.page.message"
            >
                <h5 class="mb-3">Lihat Modul</h5>
                <form
                    class="mt-5"
                    @submit.prevent=""
                >
                    <bsb-form-group>
                        <label>Modul</label>
                        <bsb-input :value="form.data['module']['ref']+' - '+form.data['module']['name']" readonly />
                    </bsb-form-group>
                    <bsb-form-group>
                        <label>Aksi</label>
                        <bsb-input :value="form.data['action']['ref']+' - '+form.data['action']['name']" readonly />
                    </bsb-form-group>
                </form>
            </bsb-card-body-spinner-error>
        </bsb-card>
    </fragment>
</template>

<script>
import mixin from './mixin'

export default {
    mixins: [mixin],
}
</script>