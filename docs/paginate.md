---
name: paginate
description: "paginate"
metadata:
  type: documentation
---

meglio mantenere le querystring

$posts->appends(request()->input())->links()