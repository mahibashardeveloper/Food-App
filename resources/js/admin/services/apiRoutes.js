const apiVersion = '/api/admin';

const apiRoutes = {

    // Authentication

    login: apiVersion + '/auth/login',

    forgot: apiVersion + '/auth/forgot',

    reset: apiVersion + '/auth/reset',

    // slider

    sliderCreate: apiVersion + '/slider/create',

    sliderList: apiVersion + '/slider/list',

    sliderSingle: apiVersion + '/slider/single',

    sliderUpdate: apiVersion + '/slider/update',

    sliderDelete: apiVersion + '/slider/delete',

    // category

    categoryCreate: apiVersion + '/category/create',

    categoryList: apiVersion + '/category/list',

    categorySingle: apiVersion + '/category/single',

    categoryUpdate: apiVersion + '/category/update',

    categoryDelete: apiVersion + '/category/delete',

    // product

    productCreate: apiVersion + '/product/create',

    productList: apiVersion + '/product/list',

    productSingle: apiVersion + '/product/single',

    productUpdate: apiVersion + '/product/update',

    productDelete: apiVersion + '/product/delete',

    // deliveryMan

    deliveryManCreate: apiVersion + '/deliveryMan/create',

    deliveryManList: apiVersion + '/deliveryMan/list',

    deliveryManSingle: apiVersion + '/deliveryMan/single',

    deliveryManUpdate: apiVersion + '/deliveryMan/update',

    deliveryManDelete: apiVersion + '/deliveryMan/delete',

    // Profile

    profile_details: apiVersion + '/profile/details',

    profile_update: apiVersion + '/profile/update',

    profile_password: apiVersion + '/profile/password',

    logout: apiVersion + '/profile/logout',

    // settings

    settings_details: apiVersion + '/settings/details',

    settings_update: apiVersion + '/settings/update',

    // customer

    customerList: apiVersion + '/customer/list',

    // Order

    orderList: apiVersion + '/order/list',

    orderStatus: apiVersion + '/order/status/change',

    // Media

    media: apiVersion + '/media/upload',

}

export default apiRoutes;
