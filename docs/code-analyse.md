<<<<<<< .merge_file_Z9XSHD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zwbWDg
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_CWEOzo
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ppoSJQ
---
title: 'code_analyse'
module: Xot
type: reference
slug: code-analyse
description: '<!-- Contenuto migrato da _docs/code_analyse.txt -->'
tags: [migrato-da-txt, xot]
converted_from: code_analyse.txt
created: 2026-08-24
updated: 2026-08-24
---

# code_analyse

<!-- Contenuto migrato da _docs/code_analyse.txt -->

<<<<<<< .merge_file_Z9XSHD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_zwbWDg
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_CWEOzo
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ppoSJQ
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
//----------------------------------------------------------
phpstan
install:

cmd:
./vendor/bin/phpstan analyse ./Modules/Xot

<<<<<<< .merge_file_Z9XSHD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zwbWDg
<<<<<<< HEAD

=======
>>>>>>> .merge_file_CWEOzo
=======

>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ppoSJQ
=======
=======

>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
//----------------------------------------------------------
https://github.com/phan/phan/wiki/Getting-Started

//----------------------------------------------------------
https://github.com/phpro/grumphp

//----------------------------------------------------------
https://github.com/phpmetrics/PhpMetrics
install:
composer require phpmetrics/phpmetrics --dev

cmd:
php ./vendor/bin/phpmetrics --report-html=../_phpmetrics_report Modules
//----------------------------------------------------------
https://github.com/squizlabs/PHP_CodeSniffer
install:
<<<<<<< HEAD
<<<<<<< .merge_file_Z9XSHD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zwbWDg
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======

>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_CWEOzo
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ppoSJQ
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
# Download using curl
curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar
curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar

# Or download using wget
wget https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar
wget https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar

cmd:
php phpcs.phar ./Modules
//----------------------------------------------------------
https://github.com/sebastianbergmann/phpcpd

$ wget https://phar.phpunit.de/phpcpd.phar

$ php phpcpd.phar --version

<<<<<<< HEAD
<<<<<<< .merge_file_Z9XSHD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zwbWDg
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< HEAD

//---------------------
https://scrutinizer-ci.com/docs/tools/php/php-scrutinizer/
=======
//---------------------
https://scrutinizer-ci.com/project_docs/tools/php/php-scrutinizer/
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
=======

//---------------------
https://scrutinizer-ci.com/docs/tools/php/php-scrutinizer/
>>>>>>> laraxot/dev
=======

//---------------------
https://scrutinizer-ci.com/docs/tools/php/php-scrutinizer/
>>>>>>> .merge_file_CWEOzo
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> da9ae01a0 (.)
=======

//---------------------
https://scrutinizer-ci.com/docs/tools/php/php-scrutinizer/
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======

//---------------------
https://scrutinizer-ci.com/docs/tools/php/php-scrutinizer/
>>>>>>> .merge_file_ppoSJQ
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

//--------------------
https://github.com/Qafoo/QualityAnalyzer

install:
git clone https://github.com/Qafoo/QualityAnalyzer.git
cd QualityAnalyzer
composer install

cmd:
bin/analyze analyze /path/to/source
//-------------------------------------------------------------

<<<<<<< HEAD
<<<<<<< .merge_file_Z9XSHD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zwbWDg
<<<<<<< HEAD
>>>>>>> laraxot/dev
<<<<<<< HEAD
https://psalm.dev/docs/running_psalm/installation/
=======
https://psalm.dev/project_docs/running_psalm/installation/
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
=======
https://psalm.dev/docs/running_psalm/installation/
>>>>>>> laraxot/dev
=======
https://psalm.dev/docs/running_psalm/installation/
>>>>>>> .merge_file_CWEOzo
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
https://psalm.dev/docs/running_psalm/installation/
>>>>>>> 3792da0d (Check & fix styling)
=======
https://psalm.dev/docs/running_psalm/installation/
>>>>>>> .merge_file_ppoSJQ
=======
=======
https://psalm.dev/docs/running_psalm/installation/
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)

//--------------------------------------------------------------------
https://github.com/scrutinizer-ci/php-analyzer
https://medium.com/bumble-tech/php-code-static-analysis-based-on-the-example-of-phpstan-phan-and-psalm-a20654c4011d
https://link.medium.com/fPm2yP1xrZ

https://geekflare.com/php-security-scanner/

https://hub.docker.com/r/adamculp/php-code-quality
https://docs.gitlab.com/ee/user/project/merge_requests/code_quality.html

<<<<<<< .merge_file_Z9XSHD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_zwbWDg
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_CWEOzo
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)




<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
=======
>>>>>>> da9ae01a0 (.)
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
=======
<<<<<<< HEAD
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_ppoSJQ
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
https://github.com/enlightn/enlightn

 "edgedesign/phpqa": "^1.23",

 "phan/phan": "^4.0",
        "phpmetrics/phpmetrics": "^2.7",
<<<<<<< .merge_file_Z9XSHD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> da9ae01a0 (.)
        "phpunit/php-code-coverage": "^9.2",
=======
        "phpunit/php-code-coverage": "^9.2",
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
=======
        "phpunit/php-code-coverage": "^9.2",
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
        "phpunit/php-code-coverage": "^9.2",
>>>>>>> 3792da0d (Check & fix styling)
=======
        "phpunit/php-code-coverage": "^9.2",
>>>>>>> .merge_file_ppoSJQ
=======
=======
        "phpunit/php-code-coverage": "^9.2",
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
