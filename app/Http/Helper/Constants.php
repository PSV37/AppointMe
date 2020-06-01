<?php

    // Conditions
    define('ZOOM_URL', "https://api.zoom.us/v2/users/?page_number=1&page_size=100&status=active");
    define('DEFAULT_PIC_URL', 'https://adminlte.io/themes/v3/dist/img/user4-128x128.jpg');
    define('ZOOM_API_FETCH_ERROR_MSG', "Somthing went wrong");
    define('SYNC_DB_ERROR_MSG', "Somthing went wrong during sync with DB");
    define('GET_SENSEI_ERROR_MSG', "Somthing went wrong during fetch list");
    define('TRUNCATE_ERROR_MSG', "Error during truncate");
    define('TRUNCATE_SUCCESS_MSG', 'successfully truncate your table...');
    define('COMMAON_ERROR_MSG', 'Somthing went wrong');
    define('INTERNAL_ERROR_CODE', 500);
    define('UPDATE_PROFILE_URL', '/admin/update/profile');