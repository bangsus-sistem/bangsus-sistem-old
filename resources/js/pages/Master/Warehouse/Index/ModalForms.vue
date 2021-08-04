<template>
    <fragment>
        <bsb-access-wrapper module-ref="warehouse" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Gudang"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/master/warehouse/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Gudang"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/master/warehouse/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="warehouse" action-ref="delete">
            <bsb-modal-form
                title="Hapus Gudang"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/master/warehouse"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>