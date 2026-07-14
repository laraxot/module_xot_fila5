---
title: "Webpack"
module: "Xot"
type: concept
tags: [webpack]
created: 2026-07-14
updated: 2026-07-14
qmd: "webpack"
related:
  - "./eloquent-magic-properties-rule.md"
---
//------------------------
https://stackoverflow.com/questions/61047279/laravel-mix-multiple-entry-points-multiple-outputs
https://codeutility.org/javascript-laravel-mix-multiple-entry-points-multiple-outputs-stack-overflow/

const fs = require('fs');
const path = require('path');
const isFile = (pathItem) => !!path.extname(pathItem);

const mapScripts = (fromDir,toDir) => {
  var dirs = fs.readdirSync(fromDir, 'utf8');
  dirs.forEach( subDir => {
    isFile(`${fromDir}/${subDir}`)
    ? mix.scripts(`${fromDir}/${subDir}`, `${toDir}/${subDir}`)
    : mapScripts(`${fromDir}/${subDir}`, `${toDir}/${subDir}`)
  })
}

Then call it on your directory:

mapScripts('resources/js', 'public/js');

//---------------------------------------------------------------
