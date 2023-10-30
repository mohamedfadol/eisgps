---
title: API Reference

language_tabs:
- bash
- javascript
- php

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.

<!-- END_INFO -->

# Authentication

In order to use the API, you should authenticate your request by including your API key as a bearer token value:

Authorization: Bearer API_KEY_HERE

# Headers

Make sure you have the following content type headers are set on every request:

Content-Type: application/json

# URI

EISGPS API is hosted on the following base URI:

http://88.99.71.157/


#general


<!-- START_464dc443b9e15414329a460b37238ad6 -->
## Login Request Code

> Example request:

```bash
curl -X POST \
    "BASE_URL/api/v1/mobile/login/request" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"mobile":"+966123456789","sms_lang":"ar"}'

```

```javascript
const url = new URL(
    "BASE_URL/api/v1/mobile/login/request"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "mobile": "+966123456789",
    "sms_lang": "ar"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'BASE_URL/api/v1/mobile/login/request',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'mobile' => '+966123456789',
            'sms_lang' => 'ar',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "success": true,
    "message": {
        "ar": "تم إرسال الرسالة القصيرة",
        "en": "Sms sent"
    }
}
```
> Example response (404):

```json
{
    "success": false,
    "message": {
        "ar": "الحساب غير موجود",
        "en": "Account not found"
    }
}
```

### HTTP Request
`POST api/v1/mobile/login/request`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `mobile` | string |  required  | account mobile
        `sms_lang` | string |  required  | ar or en
    
<!-- END_464dc443b9e15414329a460b37238ad6 -->

<!-- START_19f6248c1ad96c82e4f28de034615fcd -->
## Login Confirm Code

> Example request:

```bash
curl -X POST \
    "BASE_URL/api/v1/mobile/login/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"mobile":"+966123456789","code":712349}'

```

```javascript
const url = new URL(
    "BASE_URL/api/v1/mobile/login/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "mobile": "+966123456789",
    "code": 712349
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post(
    'BASE_URL/api/v1/mobile/login/confirm',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
        'json' => [
            'mobile' => '+966123456789',
            'code' => 712349,
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "success": true,
    "data": {
        "id": 1,
        "attributes": {
            "mail.smtp.auth": true,
            "mail.smtp.from": "email@example.com",
            "mail.smtp.host": "smtp.domain.com",
            "mail.smtp.password": "mypassword",
            "mail.smtp.port": 465,
            "mail.smtp.ssl.enable": true,
            "mail.smtp.username": "email@example.com",
            "web.liveRouteLength": 16,
            "web.selectZoom": 18,
            "web.maxZoom": 18,
            "timezone": "Asia\/Riyadh",
            "volumeUnit": "ltr",
            "speedUnit": "kmh",
            "distanceUnit": "km",
            "notificationTokens": "daYwvZBTv04RktRacLxnag:APA91b........."
        },
        "name": "admin",
        "login": "",
        "email": "gps@eis.net.sa",
        "phone": "112333343",
        "readonly": false,
        "administrator": true,
        "map": "custom",
        "latitude": 48.8567,
        "longitude": 2.3508,
        "zoom": 17,
        "twelveHourFormat": true,
        "coordinateFormat": "dms",
        "disabled": false,
        "expirationTime": "2024-04-01T15:04:31.000000Z",
        "deviceLimit": 1,
        "userLimit": 1,
        "deviceReadonly": false,
        "token": "TUo4bYxpEjHILARgTwALsCsVGPzWr1Pc",
        "limitCommands": false,
        "poiLayer": "",
        "password": null,
        "user": {
            "id": 21,
            "traccar_id": 44,
            "name": "my name",
            "email": "email@example.com",
            "gender": "M",
            "basicAuth": "DaBzQGVpcy5uZXQuc2E6RWlzQDE5OTA=",
            "mobile": "112333343",
            "birthday": null,
            "address": null,
            "addressNo": null,
            "city": "Jeddah",
            "state": null,
            "zipCode": null,
            "mapLayer": null,
            "id_number": 1003992990,
            "wassel": 1,
            "authMobileCode": null,
            "accountType": "2",
            "created_at": "2021-04-01T15:04:31.000000Z",
            "updated_at": "2021-04-01T16:32:28.000000Z"
        }
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJ........"
}
```
> Example response (404):

```json
{
    "success": false,
    "message": {
        "ar": "رمز الوصول غير صالح",
        "en": "Invalid access code"
    }
}
```

### HTTP Request
`POST api/v1/mobile/login/confirm`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `mobile` | string |  required  | account mobile
        `code` | integer |  required  | Code received by SMS
    
<!-- END_19f6248c1ad96c82e4f28de034615fcd -->

<!-- START_1aff981da377ba9a1bbc56ff8efaec0d -->
## Get Users

> Example request:

```bash
curl -X GET \
    -G "BASE_URL/api/v1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "BASE_URL/api/v1/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'BASE_URL/api/v1/users',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```


> Example response (200):

```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "attributes": {},
            "name": "fahd",
            "login": "",
            "email": "fahd@example.com",
            "phone": "+966505263775",
            "readonly": false,
            "administrator": false,
            "map": "custom",
            "latitude": 48.8567,
            "longitude": 2.3508,
            "zoom": 17,
            "twelveHourFormat": true,
            "coordinateFormat": "dms",
            "disabled": false,
            "expirationTime": null,
            "deviceLimit": -1,
            "userLimit": 0,
            "deviceReadonly": false,
            "token": "TUo4bYxpEjHILARgTwALsCsVGPzWr1Pc",
            "limitCommands": false,
            "poiLayer": "",
            "password": null
        },
        {
            "id": 3,
            "attributes": {},
            "name": "ahmad",
            "login": "",
            "email": "ahmad@example.com",
            "phone": "",
            "readonly": false,
            "administrator": false,
            "map": "custom",
            "latitude": 0,
            "longitude": 0,
            "zoom": 0,
            "twelveHourFormat": true,
            "coordinateFormat": "dms",
            "disabled": false,
            "expirationTime": null,
            "deviceLimit": 3,
            "userLimit": 0,
            "deviceReadonly": false,
            "token": "kJHzWZGXhfWVR0xbklb9nZZ8lFU5hHQ7",
            "limitCommands": false,
            "poiLayer": "",
            "password": null
        }
    ]
}
```

### HTTP Request
`GET api/v1/users`


<!-- END_1aff981da377ba9a1bbc56ff8efaec0d -->


# Errors


The API uses the following error codes:


Error Code | Meaning
---------- | -------
400 | Bad Request -- Your request sucks
401 | Unauthorized -- Your API key is wrong
403 | Forbidden -- The kitten requested is hidden for administrators only
404 | Not Found -- The specified kitten could not be found
405 | Method Not Allowed -- You tried to access a kitten with an invalid method
406 | Not Acceptable -- You requested a format that isn't json
410 | Gone -- The kitten requested has been removed from our servers
418 | I'm a teapot
429 | Too Many Requests -- You're requesting too many requests! Slow down!
500 | Internal Server Error -- We had a problem with our server. Try again later.
503 | Service Unavailable -- We're temporarially offline for maintanance. Please try again later.

