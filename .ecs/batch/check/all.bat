:: Run easy-coding-standard (ecs) via this batch file inside your IDE e.g. PhpStorm (Windows only)
:: Install inside PhpStorm the  "Batch Script Support" plugin
cd..
cd..
cd..
cd..
cd..
cd..
:: src
vendor\bin\ecs check vendor/markocupic/contao-picture-downloads/src --config vendor/markocupic/contao-picture-downloads/.ecs/config/default.php
:: tests
vendor\bin\ecs check vendor/markocupic/contao-picture-downloads/tests --config vendor/markocupic/contao-picture-downloads/.ecs/config/default.php
:: legacy
vendor\bin\ecs check vendor/markocupic/contao-picture-downloads/src/Resources/contao --config vendor/markocupic/contao-picture-downloads/.ecs/config/legacy.php
:: templates
vendor\bin\ecs check vendor/markocupic/contao-picture-downloads/src/Resources/contao/templates --config vendor/markocupic/contao-picture-downloads/.ecs/config/template.php
::
cd vendor/markocupic/contao-picture-downloads/.ecs./batch/check
