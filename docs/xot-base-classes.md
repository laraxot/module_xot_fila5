# Xot Base Classes in Laravel Modules

## Overview
The Xot base classes provide a centralized way to customize and extend functionality across different modules. This document outlines the usage and benefits of Xot base classes for consistent customization.

## Key Principles
1. **Centralized Customization**: Xot base classes centralize customizations to ensure consistency across modules.
2. **Avoid Direct Extensions**: Never extend Filament or other framework classes directly; always use Xot base classes.

## Implementation Guidelines
### Using XotBaseResource
- Instead of extending `Filament\Resources\Resource`, use `XotBaseResource` from the Xot module.
  ```php
  namespace Modules\Patient\Filament\Resources;

  use Modules\Xot\Filament\Resources\XotBaseResource;

  class DoctorResource extends XotBaseResource
  {
      // Resource definition
<<<<<<< .merge_file_ux3q1l
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
      public function getFormSchema(): array
=======
      public function getFormSchema(): array
>>>>>>> laraxot/dev
<<<<<<< HEAD
=======
=======
      public static function getFormSchema(): array
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
      public static function getFormSchema(): array
>>>>>>> 3792da0d (Check & fix styling)
=======
      public function getFormSchema(): array
>>>>>>> .merge_file_euxhPq
      {
          return [
              'full_name' => Forms\Components\TextInput::make('full_name'),
              'email' => Forms\Components\TextInput::make('email'),
          ];
      }
  }
  ```

### Using XotBasePage
- For pages, extend `XotBasePage` instead of `Filament\Pages\Page`.
  ```php
  namespace Modules\Notify\Filament\Pages;

  use Modules\Xot\Filament\Pages\XotBasePage;

  class SettingPage extends XotBasePage
  {
      // Page definition
  }
  ```

### Benefits
- **Consistency**: Ensures all customizations follow the same pattern.
- **Ease of Updates**: Simplifies updates when the underlying framework changes.
- **Additional Functionality**: Provides additional methods and properties specific to the module ecosystem.

## Common Issues and Fixes
- **Direct Extension**: Developers sometimes extend Filament classes directly. Always use Xot base classes for customization.
- **Importing Original Classes**: Avoid importing original Filament classes if they are not used directly. Remove unnecessary imports.

## Documentation and Updates
- Document any custom Xot base classes or significant customizations in the module's `docs` folder.
- Update this document if new Xot base classes are introduced.

## Links to Related Documentation
- [Code Quality](../Xot/docs/CODE_QUALITY.md)
<<<<<<< .merge_file_ux3q1l
<<<<<<< HEAD
<<<<<<< HEAD
- [Filament Extension Pattern](filament_extension_pattern.md)
- [Filament Extension Pattern Analysis](filament_extension_pattern_analysis.md)
- [Patient Module - Filament Customization](../../Patient/docs/FILAMENT_CUSTOMIZATION.md)
- [Patient Module - Namespace Conventions](../../Patient/docs/NAMESPACE_CONVENTIONS.md)
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_euxhPq
- [Filament Extension Pattern](filament_extension_pattern.md)
- [Filament Extension Pattern Analysis](filament_extension_pattern_analysis.md)
- [Patient Module - Filament Customization](../../Patient/docs/FILAMENT_CUSTOMIZATION.md)
- [Patient Module - Namespace Conventions](../../Patient/docs/NAMESPACE_CONVENTIONS.md)
<<<<<<< .merge_file_ux3q1l
>>>>>>> laraxot/dev
>>>>>>> laraxot/dev
=======
- [Filament Extension Pattern](../../Notify/docs/FILAMENT_EXTENSION_PATTERN.md)
- [Filament Extension Pattern Analysis](../../Notify/docs/FILAMENT_EXTENSION_PATTERN_ANALYSIS.md)
- [Patient Module - Filament Customization](../../Patient/docs/FILAMENT_CUSTOMIZATION.md)
- [Patient Module - Namespace Conventions](../../Patient/docs/NAMESPACE_CONVENTIONS.md)
>>>>>>> 3792da0d (Check & fix styling)
=======
>>>>>>> .merge_file_euxhPq
