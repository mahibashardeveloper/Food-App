const apiVersion = '/api/admin';

const apiRoutes = {

    // Authentication

    register: apiVersion + '/auth/register',

    login: apiVersion + '/auth/login',

    forgot: apiVersion + '/auth/forgot',

    reset: apiVersion + '/auth/reset',

    // SubAdmin

    calenderCreate: apiVersion + '/calender/create',

    calenderList: apiVersion + '/calender/list',

    calenderSingle: apiVersion + '/calender/single',

    calenderUpdate: apiVersion + '/calender/update',

    calenderDelete: apiVersion + '/calender/delete',

    // SubAdmin

    subAdminCreate: apiVersion + '/subAdmin/create',

    subAdminList: apiVersion + '/subAdmin/list',

    subAdminSingle: apiVersion + '/subAdmin/single',

    subAdminUpdate: apiVersion + '/subAdmin/update',

    subAdminDelete: apiVersion + '/subAdmin/delete',

    // vendor

    vendorCreate: apiVersion + '/vendor/create',

    vendorList: apiVersion + '/vendor/list',

    vendorSingle: apiVersion + '/vendor/single',

    vendorUpdate: apiVersion + '/vendor/update',

    vendorDelete: apiVersion + '/vendor/delete',

    // deliveryMan

    deliveryManCreate: apiVersion + '/deliveryMan/create',

    deliveryManList: apiVersion + '/deliveryMan/list',

    deliveryManSingle: apiVersion + '/deliveryMan/single',

    deliveryManUpdate: apiVersion + '/deliveryMan/update',

    deliveryManDelete: apiVersion + '/deliveryMan/delete',

    // partner

    partnerCreate: apiVersion + '/partner/create',

    partnerList: apiVersion + '/partner/list',

    partnerSingle: apiVersion + '/partner/single',

    partnerUpdate: apiVersion + '/partner/update',

    partnerDelete: apiVersion + '/partner/delete',

    // merchant

    merchantCreate: apiVersion + '/merchant/create',

    merchantList: apiVersion + '/merchant/list',

    merchantSingle: apiVersion + '/merchant/single',

    merchantUpdate: apiVersion + '/merchant/update',

    merchantDelete: apiVersion + '/merchant/delete',

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

    // customer

    customerList: apiVersion + '/customer/list',

    // Order

    orderList: apiVersion + '/order/list',

    // Media

    media: apiVersion + '/media/upload',

}

export default apiRoutes;
