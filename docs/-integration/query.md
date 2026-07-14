---
title: "query"
module: "Xot"
type: concept
tags: [query]
created: 2026-07-14
updated: 2026-07-14
qmd: "query"
related:
  - "./eloquent-magic-properties-rule.md"
---
# query

<!-- Contenuto migrato da _docs/query.txt -->

https://laravel-news.com/quickly-dumping-laravel-queries

\DB::enableQueryLog(); // Enable query log

// Your Eloquent query executed by using get()

dd(\DB::getQueryLog()); // Show results of log

$sql = Str::replaceArray('?', $query->getBindings(), $query->toSql());
