<<<<<<< .merge_file_5dz9AG
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_582Ftc
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_6oqMgb
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_JyDSfl
---
title: 'Tips'
module: Xot
type: reference
slug: tips
description: 'https://github.com/phpstan/phpstan/issues/1242'
tags: [migrato-da-txt, xot]
converted_from: __tips.txt
created: 2026-08-24
updated: 2026-08-24
---

<<<<<<< .merge_file_5dz9AG
<<<<<<< HEAD
=======
<<<<<<< .merge_file_582Ftc
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_6oqMgb
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_JyDSfl
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
https://github.com/phpstan/phpstan/issues/1242


protected function callAction(array $match)
{
    list($controller, $method) = $this->breakControllerAndAction(
        $match['action']
    );

    $controllerClass = 'App\\Http\\Controllers\\' . $controller;

    $controllerObject = new $controllerClass($this->request);

    if (method_exists($controllerObject, $method)) {
        $callback = function (...$parameters) use (
            $controllerObject,
            $method
        ) {
            return $controllerObject->$method(...$parameters);
        };

        return call_user_func_array(
            $callback,
            array_merge([$this->request], $match['vars'])
        );
    }

    throw new \Exception("Method not found: {$controllerClass}@{$method}");
<<<<<<< .merge_file_5dz9AG
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> da9ae01a0 (.)
}
=======
}
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
=======
}
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
}
>>>>>>> 3792da0d (Check & fix styling)
=======
}
>>>>>>> .merge_file_JyDSfl
=======
=======
}
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
