import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'product_type',
        name: 'master.productType',
        component: page('Master/ProductType/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'product_type/read/:id',
        name: 'master.productType.read',
        component: page('Master/ProductType/Read'),
        beforeEnter: middleware(appMiddleware),
    },
]