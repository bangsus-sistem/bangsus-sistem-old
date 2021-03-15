
export default {
    prefix: 'bsb',
    components: {
        /**
         * Alerts
         */
        'alert': require('./alerts/Alert').default,
        'alert-dismissible': require('./alerts/AlertDismissible').default,

        /**
         * Breadcrumb.
         */
        'breadcrumb': require('./breadcrumb/Breadcrumb').default,
        'breadcrumb-item': require('./breadcrumb/BreadcrumbItem').default,

        /**
         * Buttons
         */
        'button': require('./buttons/Button').default,
        'button-spinner': require('./buttons/ButtonSpinner').default,
        'close-button': require('./buttons/CloseButton').default,

        /**
         * Flashers
         */
        'flashers': require('./flashers/Flashers').default,
        'flasher-wrapper': require('./flashers/FlasherWrapper').default,

        /**
         * Icon
         */
        'icon': require('./icons/Icon').default,
        'feather-icon': require('./icons/FeatherIcon').default,

        /**
         * Input
         */
        'errors': require('./input/Errors').default,
        'input': require('./input/Input').default,
        'input-errors': require('./input/InputErrors').default,

        /**
         * Mode
         */
        'screen-mode-wrapper': require('./mode/ScreenModeWrapper').default,

        /**
         * Navbar
         */
        'navbar': require('./navbar/Navbar').default,

        /**
         * Sample
         */
        'sample': require('./sample/Sample').default,

        /**
         * Screeen
         */
        'screen': require('./screen/Screen').default,

        /**
         * Sidebar
         */
        'sidebar': require('./sidebar/Sidebar').default,
        'sidebar-title': require('./sidebar/SidebarTitle').default,

        /**
         * Spinner
         */
        'spinner': require('./spinner/Spinner').default,

        /**
         * Utils
         */
        'container-fluid': require('./utils/ContainerFluid').default,
        'page-wrapper': require('./utils/PageWrapper').default,
    }
}
