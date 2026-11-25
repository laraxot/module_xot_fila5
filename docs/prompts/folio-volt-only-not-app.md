---
title: "Anti-pattern: scomodare App FolioServiceProvider"
type: prompt
module: Xot
qmd: "anti-pattern App FolioServiceProvider FolioVolt only"
related:
  - ../bmad/stories/folio-owner-foliovolt-not-app-provider.story.md
  - ../../../../../bashscripts/ai/wiki/memories/frontend-folio-routing.md#folio-owner-foliovolt-only
---

# Anti-pattern: App Folio quando c’è FolioVolt

**Sbagliato:** registrare / estendere `app/Providers/FolioServiceProvider.php`
per montare pagine moduli.

**Corretto (FO):** solo `Cms/FolioVoltServiceProvider`.

**PTVX:** Cms assente → non inventare mini-FolioVolt in App né nei moduli dominio.
