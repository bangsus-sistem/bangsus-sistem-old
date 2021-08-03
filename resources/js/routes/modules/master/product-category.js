import page from '../../page'
import middleware from '../../middleware'
import appMiddleware from '../../middleware/app-middleware'

export default [
    {
        path: 'product_category',
        name: 'master.productCategory',
        component: page('Master/ProductCategory/Index'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'product_category/create',
        name: 'master.productCategory.create',
        component: page('Master/ProductCategory/Create'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'product_category/read/:id',
        name: 'master.productCategory.read',
        component: page('Master/ProductCategory/Read'),
        beforeEnter: middleware(appMiddleware),
    },
    {
        path: 'product_category/update/:id',
        name: 'master.productCategory.update',
        component: page('Master/ProductCategory/Update'),
        beforeEnter: middleware(appMiddleware),
    },
]