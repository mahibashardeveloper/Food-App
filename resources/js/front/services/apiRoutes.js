const apiVersion = '/api/customer';

const apiRoutes = {

    // Authentication

    register: apiVersion + '/auth/register',

    login: apiVersion + '/auth/login',

    forgot: apiVersion + '/auth/forgot',

    reset: apiVersion + '/auth/reset',

    // Profile

    profile_details: apiVersion + '/profile/details',

    profile_update: apiVersion + '/profile/update',

    profile_password: apiVersion + '/profile/password',

    logout: apiVersion + '/profile/logout',

    // Order

    OrderCreate: apiVersion + '/order/create',

    OrderList: apiVersion + '/order/list',

    // Media

    media: apiVersion + '/media/upload',

    // slider

    globalSliderList: '/globalSlider/list',

    // category

    globalCategoryList: '/globalCategory/list',

    // product

    globalProductList: '/globalProduct/list',

}

export default apiRoutes;
