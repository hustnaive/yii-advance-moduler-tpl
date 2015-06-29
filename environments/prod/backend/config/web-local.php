<?php

//线上环境，php init会自动生成cookieValidationKey，请保持除此字段之外的为空

return [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
    ],
];
