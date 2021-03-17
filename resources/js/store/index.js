import flashers from './utils/flashers'
import versionControl from './utils/version-control'
import lang from './utils/lang'

export default {
    modules: {

        // Utils package
        utils: {
            namespaced: true,
            modules: {

                // Utils.Flashers package
                flashers: {
                    namespaced: true,
                    ...flashers
                },

                // Utils.VersionControl package
                versionControl: {
                    namespaced: true,
                    ...versionControl,
                },

                // Utils.Lang package
                lang: {
                    namespaced: true,
                    ...lang,
                },
            }
        },
    }
}