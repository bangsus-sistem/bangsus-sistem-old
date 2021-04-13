<template>
    <div class="d-block">
        <bsb-form-inline class="mb-2">
            <bsb-item-count-label class="m-0 mr-3">Jumlah data per halaman: </bsb-item-count-label>
            <bsb-item-count-select :options="options" :value="value" @input="$emit('input', $event)"></bsb-item-count-select>
        </bsb-form-inline>
    </div>
</template>

<script>
export default {
    props: {
        options: {
            type: Array,
            default() {
                return []
            }
        },
        value: {
            
        }
    }
}
</script>