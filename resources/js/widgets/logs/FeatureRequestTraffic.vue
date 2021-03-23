<template>
    <WidgetWrapper
        module-ref="feature_log"
        widget-type-ref="traffic"
        class="col-12 col-lg-6 col-xl-4"
        :loading="state.widget.loading"
        title="Traffic Request Fitur"
    >
        <div class="form-group mt-4">
            <select class="form-control form-control-sm">
                <option>5 menit terakhir</option>
                <option>15 menit terakhir</option>
                <option>1 jam terakhir</option>
                <option>2 jam terakhir</option>
                <option>6 jam terakhir</option>
                <option>12 jam terakhir</option>
                <option>24 jam terakhir</option>
                <option>3 hari terakhir</option>
                <option>1 minggu terakhir</option>
            </select>
        </div>
        <bsb-row>
            <div class="col text-center">
                <h5 class="text-green-500">{{ data['requests_count'] }}</h5>
                <span class="text-green-500">Permintaan</span>
            </div>
            <div class="col text-center">
                <h5 class="text-red-400">{{ data['features_count'] }}</h5>
                <span class="text-red-400">Fitur Diakses</span>
            </div>
            <div class="col text-center">
                <h5 class="text-yellow-600">{{ data['users_count'] }}</h5>
                <span class="text-yellow-600">Pengguna</span>
            </div>
        </bsb-row>
    </WidgetWrapper>
</template>

<script>
import WidgetWrapper from '../sections/WidgetWrapper'
import mixins from '../mixins'

export default {
    components: {
        WidgetWrapper,
    },
    data() {
        return {
            meta: {
                source: '/ajax/logs/feature_log/widget/traffic'
            },
            data: {}
        }
    },
    mixins: [ mixins ]
}
</script>