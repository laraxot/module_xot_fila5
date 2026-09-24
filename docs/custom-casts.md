<<<<<<< .merge_file_2qP0cn
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
<<<<<<< .merge_file_I3XCCy
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ZpaCMd
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_EhEHk3
---
title: "Custom casts"
type: reference
status: active
created: 2026-08-27
updated: 2026-08-27
note: "Convertito da custom_casts.txt (documento) da convert-docs-txt-to-md.py."
---

# custom_casts

<!-- Contenuto migrato da _docs/custom_casts.txt -->
<<<<<<< .merge_file_2qP0cn
<<<<<<< HEAD
=======
<<<<<<< .merge_file_I3XCCy
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_ZpaCMd
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_EhEHk3

php artisan make:cast Address

https://medium.com/@SlyFireFox/laravel-models-3-common-custom-cast-examples-6d0518ecd799

https://dev.to/slyfirefox/laravel-models-3-common-custom-cast-examples-2com

<<<<<<< .merge_file_2qP0cn
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD



=======
<<<<<<< .merge_file_I3XCCy
<<<<<<< HEAD
=======
=======
>>>>>>> .merge_file_ZpaCMd



>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
=======



>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_EhEHk3
DB::table(‘orders’)
    ->where(‘address->postalCode’, ‘30582–0378’)
    ->get();

<<<<<<< .merge_file_2qP0cn
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD

=======
<<<<<<< .merge_file_I3XCCy
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> .merge_file_ZpaCMd

<<<<<<< HEAD
>>>>>>> laraxot/dev
$table->json('address')->nullable();
=======
$table->json('address')->nullable();
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
=======

$table->json('address')->nullable();
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======

$table->json('address')->nullable();
>>>>>>> 8d801bbe (Check & fix styling)
=======

$table->json('address')->nullable();
>>>>>>> .merge_file_EhEHk3
