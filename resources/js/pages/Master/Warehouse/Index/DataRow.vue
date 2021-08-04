<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td>{{ item['code'] }}</bsb-td>
                <bsb-td>{{ item['name'] }}</bsb-td>
                <bsb-td v-if="flWithBranch">{{ item['branch']['code'] }} - {{ item['branch']['name'] }}</bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper module-ref="warehouse" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: 'master.warehouse.read', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="warehouse" action-ref="update">
                        <bsb-button-router-link-update :to="{ name: 'master.warehouse.update', params: { id: item['id'] } }" v-if="!item['locked']" />
                        <template v-if="!item['locked']">
                            <bsb-button-activate v-if="!item['active']" @click="$emit('activate')" />
                            <bsb-button-deactivate v-else @click="$emit('deactivate')" />
                        </template>
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="warehouse" action-ref="delete">
                        <bsb-button-delete @click="$emit('delete')" />
                    </bsb-access-wrapper>
                </bsb-td>
            </tr>
        </template>
        <template v-slot:mobile>
            <bsb-list-group-item>
                <bsb-list-group-item-content>
                    <template v-slot:content>
                        <small>{{ item['code'] }}</small>
                        <h6>{{ item['name'] }}</h6>
                        <small v-if="flWithBranch">{{ item['branch']['code'] }} - {{ item['branch']['name'] }}</small>
                    </template>
                    <template v-slot:right>
                        <bsb-access-wrapper module-ref="warehouse" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: 'master.warehouse.read', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="warehouse" action-ref="update">
                            <bsb-button-router-link-update :to="{ name: 'master.warehouse.update', params: { id: item['id'] } }" v-if="!item['locked']" />
                            <template v-if="!item['locked']">
                                <bsb-button-activate v-if="!item['active']" @click="$emit('activate')" />
                                <bsb-button-deactivate v-else @click="$emit('deactivate')" />
                            </template>
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="warehouse" action-ref="delete">
                            <bsb-button-delete @click="$emit('delete')" />
                        </bsb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
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
    props: {
        flWithBranch: {
            type: Boolean,
            default: true,
        }
    }
}
</script>