<template>
    <fragment>
        <bsb-access-wrapper module-ref="account" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Akun"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/accounting/account/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Akun"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/accounting/account/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="account" action-ref="delete">
            <bsb-modal-form
                title="Hapus Akun"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/accounting/account"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>