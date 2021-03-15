<template>
    <div>
        <router-view />
        <div class="app-version-wrapper">
            {{ appVersionComputed }}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        appVersion: {
            type: String,
            required: true,
        },
        laravelVersion: {
            type: String,
            required: true,
        },
        phpVersion: {
            type: String,
            required: true,
        },
    },
    computed: {
        appVersionComputed() {
            return 'v' + this.appVersion
        },
        laravelVersionComputed() {
            return 'v' + this.laravelVersion
        },
        phpVersionComputed() {
            return 'v' + this.phpVersion
        },
    },
    created() {
        this.$store.dispatch('utils/versionControl/setAppVersion', this.appVersion)
    },
}
</script>