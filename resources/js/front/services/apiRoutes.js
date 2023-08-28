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

    // Media

    media: apiVersion + '/media/upload',

}

export default apiRoutes;
