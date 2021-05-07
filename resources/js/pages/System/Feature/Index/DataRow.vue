<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td v-if="flWithModule">{{ item['module']['ref'] }} - {{ item['module']['name'] }}</bsb-td>
                <bsb-td v-if="flWithAction">{{ item['action']['ref'] }} - {{ item['action']['name'] }}</bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper module-ref="feature" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: 'system.feature.read', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                </bsb-td>
            </tr>
        </template>
        <template v-slot:mobile>
            <bsb-list-group-item>
                <bsb-list-group-item-content>
                    <template v-slot:content>
                        <h6 v-if="flWithModule">{{ item['module']['ref'] }} - {{ item['module']['name'] }}</h6>
                        <h6 v-if="flWithAction">{{ item['action']['ref'] }} - {{ item['action']['name'] }}</h6>
                    </template>
                    <template v-slot:right>
                        <bsb-access-wrapper module-ref="feature" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: 'system.feature.read', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
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
        flWithModule: {
            type: Boolean,
            default: true,
        },
        flWithAction: {
            type: Boolean,
            default: true,
        },
    },
}
</script>