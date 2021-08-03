<template>
    <fragment>
        <bsb-access-wrapper module-ref="product_category" action-ref="update">
            <bsb-modal-form
                title="Aktifkan Kategori Barang"
                message="Apakah anda yakin?"
                ref="activate"
                link="/ajax/master/product_category/activate"
                method="patch"
                @success="$emit('success')"
            />
            <bsb-modal-form
                title="Nonaktifkan Kategori Barang"
                message="Apakah anda yakin?"
                ref="deactivate"
                link="/ajax/master/product_category/deactivate"
                method="patch"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
        <bsb-access-wrapper module-ref="product_category" action-ref="delete">
            <bsb-modal-form
                title="Hapus Kategori Barang"
                message="Apakah anda yakin?"
                ref="delete"
                link="/ajax/master/product_category"
                method="delete"
                @success="$emit('success')"
            />
        </bsb-access-wrapper>
    </fragment>
</template>