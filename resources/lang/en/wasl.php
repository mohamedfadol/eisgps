<?php

return [

    'not_found' => 'Generic entity not found code',
    'duplicate' => 'Company, vehicle or driver has already been registered',
    'no_organization_license_found' => 'The organization does not have a transportation activity license (in Naql Portal)',
    'invalid_organization_license_found' => 'Organization has in-active or expired license',
    'operating_company_not_found' => 'Operating company not found or Operating company information is invalid',
    'vehicle_not_found' => 'Vehicle information is not correct',
    'vehicle_plate_type_not_allowed' => 'Vehicle plate type is not allowed',
    'no_operation_card_found' => 'Vehicle has no operation card, which means that the vehicle did pass all Wasl criteria checks, and passed Naql’s portal conditions of integrating with Wasl, and awaiting Naql process of issuing the operating card to the vehicle. Once Naql Portal issues the operating card and then send it to Wasl Platform, this should message should not appear.',
    'operation_card_expired' => 'Operation card has expired',
    'wrong_id_or_date_of_birth' => 'Driver information is not correct',
    'no_valid_driver_license_found' => 'Driver has no valid driving license',
    'speed_not_send' => 'Tracking company didn’t send vehicle’s speed, as per the criteria checklist',
    'weight_not_send' => 'Tracking company didn’t send vehicle’s weight',
    'latitude_not_send' => 'Tracking company didn’t send latitude',
    'longitude_not_send' => 'Tracking company didn’t send longitude',
    'imei_number_not_send' => 'Tracking company didn’t vehicles IMEI number',
    'status_moving_not_send' => 'Tracking company didn’t send moving status as per the acceptance criteria',
    'status_stopped_not_send' => 'Tracking company didn’t send stopped status as per the acceptance criteria',
    'vehicle_location_not_found' => 'Vehicle didn’t have a location',
    'duplicate_imei_number' => 'The provided IMEI number is being used by another vehicle',
];
