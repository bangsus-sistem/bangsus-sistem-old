<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td>{{ item['ref'] }}</bsb-td>
                <bsb-td>{{ item['name'] }}</bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['can_monitor_stock']" true-label="Ya" false-label="Tidak"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['must_monitor_stock']" true-label="Ya" false-label="Tidak"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper module-ref="product_type" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: 'master.productType.read', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                </bsb-td>
            </tr>
        </template>
        <template v-slot:mobile>
            <bsb-list-group-item>
                <bsb-list-group-item-content>
                    <template v-slot:content>
                        <small>{{ item['ref'] }}</small>
                        <h6 class="m-0">{{ item['name'] }}</h6>
                    </template>
                    <template v-slot:right>
                        <bsb-access-wrapper module-ref="product_type" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: 'master.productType.read', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        <bsb-switch-badge :condition="item['can_monitor_stock']" true-label="Bisa Monitor Stok" false-label="Tidak Bisa Monitor Stok"/>
                        <bsb-switch-badge :condition="item['must_monitor_stock']" true-label="Harus Monitor Stok" false-label="Tidak Harus Monitor Stok"/>
                    </template>
                </bsb-list-group-item-content>
            </bsb-list-group-item>
        </template>
    </bsb-screen>
</template>

<script>
import mixin from '../../../mixins/data-row-section-mixin'

export default {
    mixins: [mixin],
}
</script>