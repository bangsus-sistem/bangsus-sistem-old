<template>
    <bsb-screen>
        <template v-slot:desktop>
            <tr>
                <bsb-td>{{ num }}</bsb-td>
                <bsb-td>{{ item['code'] }}</bsb-td>
                <bsb-td>{{ item['name'] }}</bsb-td>
                <bsb-td justify="center" v-if="flWithAccountType">
                    <template v-if="item['account_type'] != null">
                        {{ item['account_type']['code'] }} - {{ item['account_type']['name'] }}
                    </template>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="!item['reverse_value']" true-label="Debit" false-label="Kredit"/>
                </bsb-td>
                <bsb-td justify="center" v-if="flWithParentAccount">
                    <template v-if="item['parent_account'] != null">
                        {{ item['parent_account']['code'] }} - {{ item['parent_account']['name'] }}
                    </template>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                </bsb-td>
                <bsb-td justify="center">
                    <bsb-access-wrapper module-ref="account" action-ref="read">
                        <bsb-button-router-link-read :to="{ name: 'accounting.account.read', params: { id: item['id'] } }" />
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="account" action-ref="update">
                        <bsb-button-router-link-update :to="{ name: 'accounting.account.update', params: { id: item['id'] } }" v-if="!item['locked']" />
                        <template v-if="!item['locked']">
                            <bsb-button-activate v-if="!item['active']" @click="$emit('activate')" />
                            <bsb-button-deactivate v-else @click="$emit('deactivate')" />
                        </template>
                    </bsb-access-wrapper>
                    <bsb-access-wrapper module-ref="account" action-ref="delete">
                        <bsb-button-delete @click="$emit('delete')" v-if="!item['locked']" />
                    </bsb-access-wrapper>
                </bsb-td>
            </tr>
        </template>
        <template v-slot:mobile>
            <bsb-list-group-item>
                <bsb-list-group-item-content>
                    <template v-slot:content>
                        <small>{{ item['code'] }}</small>
                        <h5 class="m-0">{{ item['name'] }}</h5>
                        <p class="m-0 p-0" v-if="flWithAccountType">
                            <b>Tipe Akun: </b>
                            <template v-if="item['account_type'] != null">
                                {{ item['account_type']['code'] }} - {{ item['account_type']['name'] }}
                            </template>
                            <template v-else>
                                Tidak ada
                            </template>
                        </p>
                        <p class="m-0 p-0" v-if="flWithParentAccount">
                            <b>Akun Induk: </b>
                            <template v-if="item['parent_account'] != null">
                                {{ item['parent_account']['code'] }} - {{ item['parent_account']['name'] }}
                            </template>
                            <template v-else>
                                Tidak ada
                            </template>
                        </p>
                    </template>
                    <template v-slot:right>
                        <bsb-access-wrapper module-ref="account" action-ref="read">
                            <bsb-button-router-link-read :to="{ name: 'accounting.account.read', params: { id: item['id'] } }" />
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="account" action-ref="update">
                            <bsb-button-router-link-update :to="{ name: 'accounting.account.update', params: { id: item['id'] } }" v-if="!item['locked']" />
                            <template v-if="!item['locked']">
                                <bsb-button-activate v-if="!item['active']" @click="$emit('activate')" />
                                <bsb-button-deactivate v-else @click="$emit('deactivate')" />
                            </template>
                        </bsb-access-wrapper>
                        <bsb-access-wrapper module-ref="account" action-ref="delete">
                            <bsb-button-delete @click="$emit('delete')" v-if="!item['locked']" />
                        </bsb-access-wrapper>
                    </template>
                    <template v-slot:footer>
                        <bsb-switch-badge :condition="item['active']" true-label="Aktif" false-label="Tidak Aktif"/>
                        <bsb-switch-badge :condition="!item['reverse_value']" true-label="Debit" false-label="Kredit"/>
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
        flWithAccountType: {
            type: Boolean,
            default: true,
        },
        flWithParentAccount: {
            type: Boolean,
            default: true,
        },
    }
}
</script>