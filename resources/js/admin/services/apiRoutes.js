const apiVersion = '/api/admin';

const apiRoutes = {

    // Authentication

    login: apiVersion + '/auth/login',

    forgot: apiVersion + '/auth/forgot',

    reset: apiVersion + '/auth/reset',

    // deliveryCharge

    deliveryChargeCreate: apiVersion + '/deliveryCharge/create',

    deliveryChargeList: apiVersion + '/deliveryCharge/list',

    deliveryChargeSingle: apiVersion + '/deliveryCharge/single',

    deliveryChargeUpdate: apiVersion + '/deliveryCharge/update',

    deliveryChargeDelete: apiVersion + '/deliveryCharge/delete',

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
