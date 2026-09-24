<<<<<<< .merge_file_6gWml8
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< .merge_file_DAzZsy
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
<<<<<<< .merge_file_DAzZsy
<<<<<<< HEAD
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
https://tutsforweb.com/how-to-create-custom-404-page-laravel/



<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> da9ae01a0 (.)
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ZZJKsV
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_XXx0Gn
---
title: "Custom errors"
type: reference
status: active
created: 2026-08-27
updated: 2026-08-27
note: "Convertito da custom_errors.txt (documento) da convert-docs-txt-to-md.py."
---

# custom_errors

<!-- Contenuto migrato da _docs/custom_errors.txt -->

https://tutsforweb.com/how-to-create-custom-404-page-laravel/

<<<<<<< .merge_file_6gWml8
<<<<<<< HEAD
=======
<<<<<<< .merge_file_DAzZsy
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
=======
=======
https://tutsforweb.com/how-to-create-custom-404-page-laravel/



>>>>>>> .merge_file_ZZJKsV
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XXx0Gn
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
public function render($request, Exception $exception)
{
    if ($this->isHttpException($exception)) {
        if (view()->exists('errors.' . $exception->getStatusCode())) {
            return response()->view('errors.' . $exception->getStatusCode(), [], $exception->getStatusCode());
        }
    }
<<<<<<< HEAD
<<<<<<< .merge_file_6gWml8
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_DAzZsy
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ZZJKsV
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XXx0Gn
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
 
    return parent::render($request, $exception);
}


<<<<<<< HEAD
<<<<<<< .merge_file_6gWml8
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_DAzZsy
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

    return parent::render($request, $exception);
}

>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ZZJKsV
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XXx0Gn
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
public function render($request, Exception $exception)
{
    if ($this->isHttpException($exception)) {
        if ($exception->getStatusCode() == 404) {
            return response()->view('errors.' . '404', [], 404);
        }
<<<<<<< .merge_file_6gWml8
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
         
=======

=======
=======
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_DAzZsy
<<<<<<< HEAD
         
=======
>>>>>>> .merge_file_ZZJKsV
=======
         
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
         
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XXx0Gn
=======
=======
         
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
        if ($exception->getStatusCode() == 500) {
            return response()->view('errors.' . '500', [], 500);
        }
    }
<<<<<<< HEAD
<<<<<<< .merge_file_6gWml8
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_DAzZsy
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ZZJKsV
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XXx0Gn
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
 
    return parent::render($request, $exception);
}


<<<<<<< HEAD
<<<<<<< .merge_file_6gWml8
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD
>>>>>>> da9ae01a0 (.)
<<<<<<< .merge_file_DAzZsy
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======

    return parent::render($request, $exception);
}

>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ZZJKsV
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_XXx0Gn
=======
=======
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
public function render($request, Exception $exception)
{
    if ($exception instanceof TestingHttpException) {
        return response()->view('errors.testing');
    }
    return parent::render($request, $exception);
<<<<<<< .merge_file_6gWml8
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
>>>>>>> .merge_file_XXx0Gn
=======
=======
}
>>>>>>> 930f8146 (Check & fix styling)
>>>>>>> da9ae01a0 (.)
