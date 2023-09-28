const customerApi = '/api/customer';

const listApi = '/api/list';

const apiRoutes = {

    // Authentication

    register: customerApi + '/auth/register',

    login: customerApi + '/auth/login',

    forgot: customerApi + '/auth/forgot',

    reset: customerApi + '/auth/reset',

    // Profile

    profile_details: customerApi + '/profile/details',

    profile_update: customerApi + '/profile/update',

    profile_password: customerApi + '/profile/password',

    logout: customerApi + '/profile/logout',

    // Order

    OrderCreate: customerApi + '/order/create',

    OrderList: customerApi + '/order/list',

    // Media

    media: customerApi + '/media/upload',

    // slider

    globalSliderList: listApi + '/globalSlider/list',

    // category

    globalCategoryList: listApi + '/globalCategory/list',

    // product

    globalProductList2: listApi + '/globalProduct/list-2',

}

export default apiRoutes;
