--TEST--
SPL: CachingIterator::hasNext()
--FILE--
<?php

$ar = array(1, 2, array(31, 32, array(331)), 4);

$it = new RecursiveArrayIterator($ar);
$it = new RecursiveCachingIterator($it);
$it = new RecursiveIteratorIterator($it);

foreach($it as $k=>$v)
{
	echo "$k=>$v\n";
	echo "hasNext: " . ($it->getInnerIterator()->hasNext() ? "yes" : "no") . "\n";
}

?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
0=>1
hasNext: yes
1=>2
hasNext: yes

Notice: Array to string conversion in %siterator_026.php on line %d
0=>31
hasNext: yes
1=>32
hasNext: yes

Notice: Array to string conversion in %siterator_026.php on line %d
0=>331
hasNext: no
3=>4
hasNext: no
===DONE===
