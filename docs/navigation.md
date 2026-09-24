---
<<<<<<< .merge_file_KtV3Bi
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_b1OflF
title: Navigation
description: Building a navigation menu for your site
extends: _layouts.documentation
section: content
---

# Navigation {#navigation}

The navigation menu in the left-hand sidebar is defined using an array in `navigation.php`. Nested pages can be added by using the `children` associative array.

```php
<?php
// navigation.php

return [
    'Getting Started' => [
        'url' => 'docs/getting-started',
        'children' => [
            'Customizing Your Site' => 'docs/customizing-your-site',
            'Navigation' => 'docs/navigation',
            'Algolia DocSearch' => 'docs/algolia-docsearch',
            'Custom 404 Page' => 'docs/custom-404-page',
        ],
    ],
    'Jigsaw Docs' => 'https://jigsaw.tighten.co/docs/installation',
];

// config.php
'navigation' => require_once('navigation.php'),

// blade files
$page->navigation
```
### Versione HEAD

## Collegamenti tra versioni di navigation.md
<<<<<<< .merge_file_KtV3Bi
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_b1OflF
* [navigation.md](../../../Gdpr/docs/navigation.md)
* [navigation.md](../../../Xot/docs/navigation.md)
* [navigation.md](../../../UI/docs/navigation.md)
* [navigation.md](../../../Cms/docs/blocks/navigation.md)
* [navigation.md](../../../Cms/docs/navigation.md)
* [navigation.md](../../../Cms/docs/components/navigation.md)

### Versione Incoming

---
<<<<<<< .merge_file_KtV3Bi
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
module: theme
topic: navigation
canonical: ../../../Themes/docs/shared-components/navigation.md
---

See canonical documentation: ../../../Themes/docs/shared-components/navigation.md
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
=======
>>>>>>> .merge_file_b1OflF
