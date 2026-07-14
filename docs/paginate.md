---
title: "Paginate"
module: "Xot"
type: concept
tags: [paginate]
created: 2026-07-14
updated: 2026-07-14
qmd: "paginate"
related:
  - "./eloquent-magic-properties-rule.md"
---
meglio mantenere le querystring

$posts->appends(request()->input())->links()