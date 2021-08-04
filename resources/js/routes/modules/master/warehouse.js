import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'warehouse',
        name: 'master.warehouse',
        component: page('Master/Warehouse/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'warehouse/create',
        name: 'master.warehouse.create',
        component: page('Master/Warehouse/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'warehouse/read/:id',
        name: 'master.warehouse.read',
        component: page('Master/Warehouse/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'warehouse/update/:id',
        name: 'master.warehouse.update',
        component: page('Master/Warehouse/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]