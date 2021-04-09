
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
         * Card
         */
        'card': require('./card/Card').default,
        'card-body': require('./card/CardBody').default,

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
        'sidebar-bars-button': require('./sidebar/SidebarBarsButton').default,
        'sidebar-collapse': require('./sidebar/SidebarCollapse').default,
        'sidebar-collapse-item': require('./sidebar/SidebarCollapseItem').default,
        'sidebar-item': require('./sidebar/SidebarItem').default,
        'sidebar-item-icon': require('./sidebar/SidebarItemIcon').default,
        'sidebar-items': require('./sidebar/SidebarItems').default,
        'sidebar-item-title': require('./sidebar/SidebarItemTitle').default,
        'sidebar-item-toggle-icon': require('./sidebar/SidebarItemToggleIcon').default,
        'sidebar-mobile': require('./sidebar/SidebarMobile').default,
        'sidebar-title': require('./sidebar/SidebarTitle').default,

        /**
         * Spinner
         */
        'spinner': require('./spinner/Spinner').default,

        /**
         * Utils
         */
        'col': require('./utils/Col').default,
        'container-fluid': require('./utils/ContainerFluid').default,
        'page-wrapper': require('./utils/PageWrapper').default,
        'page-wrapper-mobile': require('./utils/PageWrapperMobile').default,
        'row': require('./utils/Row').default,
    }
}
