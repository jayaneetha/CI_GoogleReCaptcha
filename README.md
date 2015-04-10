# CI_GoogleReCaptcha
This repository is to implement the New Google Recaptcha mechanism.
## Installation & Usage
1. Copy `config/GoogleCaptcha.php` file to the config folder of your application
2. Go to [Google reCAPTCHA dashboard](https://www.google.com/recaptcha/admin#list) and create a secret key and a  site key.
3. Replace the site key and secret key in your config file.
4. Insert `<script src='https://www.google.com/recaptcha/api.js'></script>` just above the `</head>` tag of the view file.
5. Load the GoogleCaptcha config file at the controller. `$this->config->load('GoogleCaptcha');`
6. Get config values using the function `$this->config->item('g_captcha_site');` and `$this->config->item('g_captcha_secret');`

## References
* [Google Developer Site](https://developers.google.com/recaptcha/docs/verify)
