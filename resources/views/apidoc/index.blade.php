<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="{{ asset('/docs/css/style.css') }}" />
    <script src="{{ asset('/docs/js/all.js') }}"></script>


          <script>
        $(function() {
            setupLanguages(["bash","javascript","php"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="/docs/images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                                  <a href="#" data-language-name="php">php</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Welcome to the generated API reference.</p>
<!-- END_INFO -->
<h1>Authentication</h1>
<p>In order to use the API, you should authenticate your request by including your API key as a bearer token value:</p>
<p>Authorization: Bearer API_KEY_HERE</p>
<h1>Headers</h1>
<p>Make sure you have the following content type headers are set on every request:</p>
<p>Content-Type: application/json</p>
<h1>URI</h1>
<p>EISGPS API is hosted on the following base URI:</p>
<p><a href="http://88.99.71.157/">http://88.99.71.157/</a></p>
<h1>general</h1>
<!-- START_464dc443b9e15414329a460b37238ad6 -->
<h2>Login Request Code</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "BASE_URL/api/v1/mobile/login/request" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"mobile":"+966123456789","sms_lang":"ar"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'BASE_URL/api/v1/mobile/login/request',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'mobile' =&gt; '+966123456789',
            'sms_lang' =&gt; 'ar',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": {
        "ar": "تم إرسال الرسالة القصيرة",
        "en": "Sms sent"
    }
}</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": {
        "ar": "الحساب غير موجود",
        "en": "Account not found"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/mobile/login/request</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>mobile</code></td>
<td>string</td>
<td>required</td>
<td>account mobile</td>
</tr>
<tr>
<td><code>sms_lang</code></td>
<td>string</td>
<td>required</td>
<td>ar or en</td>
</tr>
</tbody>
</table>
<!-- END_464dc443b9e15414329a460b37238ad6 -->
<!-- START_19f6248c1ad96c82e4f28de034615fcd -->
<h2>Login Confirm Code</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "BASE_URL/api/v1/mobile/login/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"mobile":"+966123456789","code":712349}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'BASE_URL/api/v1/mobile/login/confirm',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'mobile' =&gt; '+966123456789',
            'code' =&gt; 712349,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": {
        "ar": "رمز الوصول غير صالح",
        "en": "Invalid access code"
    }
}</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/v1/mobile/login/confirm</code></p>
<h4>Body Parameters</h4>
<table>
<thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Status</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><code>mobile</code></td>
<td>string</td>
<td>required</td>
<td>account mobile</td>
</tr>
<tr>
<td><code>code</code></td>
<td>integer</td>
<td>required</td>
<td>Code received by SMS</td>
</tr>
</tbody>
</table>
<!-- END_19f6248c1ad96c82e4f28de034615fcd -->
<!-- START_1aff981da377ba9a1bbc56ff8efaec0d -->
<h2>Get Users</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "BASE_URL/api/v1/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<pre><code class="language-php">
$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'BASE_URL/api/v1/users',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
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
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/v1/users</code></p>
<!-- END_1aff981da377ba9a1bbc56ff8efaec0d -->
<h1>Errors</h1>
<p>The API uses the following error codes:</p>
<table>
<thead>
<tr>
<th>Error Code</th>
<th>Meaning</th>
</tr>
</thead>
<tbody>
<tr>
<td>400</td>
<td>Bad Request -- Your request sucks</td>
</tr>
<tr>
<td>401</td>
<td>Unauthorized -- Your API key is wrong</td>
</tr>
<tr>
<td>403</td>
<td>Forbidden -- The kitten requested is hidden for administrators only</td>
</tr>
<tr>
<td>404</td>
<td>Not Found -- The specified kitten could not be found</td>
</tr>
<tr>
<td>405</td>
<td>Method Not Allowed -- You tried to access a kitten with an invalid method</td>
</tr>
<tr>
<td>406</td>
<td>Not Acceptable -- You requested a format that isn't json</td>
</tr>
<tr>
<td>410</td>
<td>Gone -- The kitten requested has been removed from our servers</td>
</tr>
<tr>
<td>418</td>
<td>I'm a teapot</td>
</tr>
<tr>
<td>429</td>
<td>Too Many Requests -- You're requesting too many requests! Slow down!</td>
</tr>
<tr>
<td>500</td>
<td>Internal Server Error -- We had a problem with our server. Try again later.</td>
</tr>
<tr>
<td>503</td>
<td>Service Unavailable -- We're temporarially offline for maintanance. Please try again later.</td>
</tr>
</tbody>
</table>
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                                    <a href="#" data-language-name="php">php</a>
                              </div>
                </div>
    </div>
  </body>
</html>