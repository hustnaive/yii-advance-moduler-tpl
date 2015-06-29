@echo off

rem -------------------------------------------------------------
rem mysoft php framework init
rem -------------------------------------------------------------

@setlocal

if not exist ./vendor ( git clone git@github.com:hustnaive/yii-advanced-modular-vendor.git vendor )
php init
php requirements.php

@endlocal