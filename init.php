<?php

/**
 * @param $bootstrap
 */
$init = static function ($bootstrap) {
    $coreFile = path('app/local/modules/OverrideDemo/features/override_demo/js/templates/override-demo.js');

    $register = file_get_contents(path('app/local/modules/OverrideDemo/features/override_demo/assets/templates/customer/l1/register.html'));
    $register = str_replace("\n", "\\n", $register);
    $register = addcslashes($register, '"');
    $content = <<<RAW
/** AUTO-GENERATED TEMPLATE */
angular.module('starter').factory('OverrideDemo', function (\$injector) {
    var factory = {};

    factory.onStart = function () {
        var \$templateCache = \$injector.get('\$templateCache');
        \$templateCache.put("templates/customer/account/l1/register.html", "{$register}");
        console.log('Hello world!');
    };

    return factory;
});
RAW;
    file_put_contents($coreFile, $content);
};

