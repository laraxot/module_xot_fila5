---
title: "query"
type: note
tags: [documentation]
created: 2026-09-26
updated: 2026-09-26
qmd: "query"
issues: []
discussions: []
---

https://laravel-news.com/quickly-dumping-laravel-queries

\DB::enableQueryLog(); // Enable query log

// Your Eloquent query executed by using get()

dd(\DB::getQueryLog()); // Show results of log


$sql = Str::replaceArray('?', $query->getBindings(), $query->toSql());
