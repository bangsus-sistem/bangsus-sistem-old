import axios from "axios"
import store from '../../compiler/plugins/store'

const guards = {

    /**
     * Check if the user is authenticated.
     * If the user is unauthenticated then the function will
     * redirect to login route.
     */
    authenticated: (to, from, next) => {
        axios.get('/ajax/utils/authenticated')
            .then(res => {
                if (res.data['logged_in']) next()
                else next({ name: 'login' })
            })
            .catch(err => {
                
            })
    },

    /**
     * Check if the user is unauthenticated.
     * If the user is authenticated then return to previous route.
     */
    unauthenticated: (to, from, next) => {
        axios.get('/ajax/utils/authenticated')
            .then(res => {
                if (res.data['logged_in']) next({ name: from.name || 'dashboard' })
                else next()
            })
            .catch(err => {
                
            })
    },

    /**
     * Check if there's new version up and coming
     */
    versionCheck: (to, from, next) => {
        axios.get('/ajax/utils/version_check')
            .then(res => {
                let serverAppVersion = res.data['app_version']
                let currentAppVersion = store.getters['utils/versionControl/appVersion']
                if (serverAppVersion !== currentAppVersion) {
                    window.location.href = to.path
                } else {
                    next()
                }
            })
    },



    /**
     * For test purposes only.
     */
    access: (to, from, next) => {
        next()
    },
}

export default guards