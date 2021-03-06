--TEST--
Check for blockquote-line-2-paragraphs
--SKIPIF--
<?php if (!extension_loaded("sundown")) print "skip"; ?>
<?php if (!extension_loaded("tidy")) print "skip"; ?>
--FILE--
<?php
$data = <<< DATA
>A blockquote with a very long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long line.

>and a second very long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long long line.
DATA;
$md = new Sundown($data);
$result = $md->toHtml();

$tidy = new tidy;
$tidy->parseString($result, array("show-body-only"=>1));
$tidy->cleanRepair();
echo (string)$tidy;
--EXPECT--
<blockquote>
<p>A blockquote with a very long long long long long long long long
long long long long long long long long long long long long long
long long long long long long long long long long long long long
long long long long line.</p>
<p>and a second very long long long long long long long long long
long long long long long long long long long long long long long
long long long long long long long long long long long long long
long long long line.</p>
</blockquote>
