---
title: "XotBaseField Philosophy"
module: "Xot"
type: concept
tags: [xot, base, field, philosophy]
created: 2026-07-14
updated: 2026-07-14
qmd: "xot base field philosophy"
related:
  - "./eloquent-magic-properties-rule.md"
---
# XotBaseField Philosophy

## The Rule of Lineage
All form components in the Laraxot ecosystem MUST extend `XotBaseField`.

## Why XotBaseField?
1. **Consistency**: It ensures that all fields have a common base for telemetry, logging, and state management.
2. **Architecture**: It follows the project religion where custom components are never just "bare" Filament fields, but part of the Xot hierarchy.
3. **Encapsulation**: It encourages the pattern of "Separate Blade, Separate Logic, Separate JS", preventing the "God Component" anti-pattern.

## Implementation Requirements
- **PHP**: Extends `XotBaseField`.
- **View**: Dedicated Blade file in `module::filament.forms.components.*`.
- **JS**: Dedicated Web Component (Lit) if complex interaction is required.
- **State**: Unified state objects (e.g., $\{latitude, longitude\}$) are preferred over multiple discrete fields.
