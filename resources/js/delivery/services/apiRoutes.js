const apiVersion = '/api/delivery';

const apiRoutes = {

    // Authentication

    login: apiVersion + '/auth/login',

    forgot: apiVersion + '/auth/forgot',

    reset: apiVersion + '/auth/reset',

    // Profile

    profile_details: apiVersion + '/profile/details',

    profile_update: apiVersion + '/profile/update',

    profile_password: apiVersion + '/profile/password',

    logout: apiVersion + '/profile/logout',

    // Order

    orderList: apiVersion + '/order/list',

    orderStatus: apiVersion + '/order/status/change',

    // Media

    media: apiVersion + '/media/upload',

}

export default apiRoutes;
