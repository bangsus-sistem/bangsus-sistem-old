<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td>{{ item['package']['ref'] }} - {{ item['package']['name'] }}</bsb-td>
                <bsb-td>{{ item['ref'] }}</bsb-td>
                <bsb-td>{{ item['name'] }}</bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper :module-ref="readModuleRef" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: readRouteName, params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                </bsb-td>
            </tr>
        </template>
        <template v-slot:mobile>
            <bsb-list-group-item>
                <bsb-list-group-item-content>
                    <template v-slot:content>
                        <small>{{ item['package']['ref'] }} - {{ item['package']['name'] }}</small>
                        <br>
                        <small>{{ item['ref'] }}</small>
                        <h6>{{ item['name'] }}</h6>
                    </template>
                    <template v-slot:right>
                        <bsb-access-wrapper :module-ref="readModuleRef" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: readRouteName, params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                    </template>
                </bsb-list-group-item-content>
            </bsb-list-group-item>
        </template>
    </bsb-screen>
</template>

<script>
import mixin from '../mixins/data-row-section-mixin'

export default {
    mixins: [mixin],
    props: {
        readModuleRef: {
            required: true,
            type: String,
        },
        readRouteName: {
            required: true,
            type: String,
        },
    },
}
</script>