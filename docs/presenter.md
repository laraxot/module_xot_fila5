---
title: "Presenter"
module: "Xot"
type: concept
tags: [presenter]
created: 2026-07-14
updated: 2026-07-14
qmd: "presenter"
related:
  - "./eloquent-magic-properties-rule.md"
---
$acceptHeader=$request->header('Accept');

if(in_array($acceptHeader,['application/json','application/xml'])){
    ...
    return response()->json($data,200);
}
...

---------------- XMLPRESENTERS -----------------
$xml=new \SimpleXMLElement('<posts/>');
foreach($posts as $post){
    $xmlItem=$xml->addChild('post');
    $xmlItem->addChild('id',$post->id);
    ...
}
return $xml->asXML;


$posts =Post::orderBy('id','desc')->paginate(10);

foreach($posts->items('data') as $item)