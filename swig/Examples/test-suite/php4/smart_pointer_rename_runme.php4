<?php
// Sample test file

require "tests.php4";
require "smart_pointer_rename.php";

check::classes(array("foo","bar"));
check::classmethods("foo",array("foo","ftest1","ftest2"));
check::classmethods("bar",array("__deref__","bar","test","ftest1","ftest2"));
$foo=new foo();
check::classname("foo",$foo);
$bar=new bar($foo);
check::classname("bar",$bar);

# check foo's ftest1, ftest2
check::equal(1,$foo->ftest1(1),"foo->ftest1");
check::equal(2,$foo->ftest2(1,2),"foo->ftest2");

# check bar's ftest1, ftest2, ftest
check::equal(1,$bar->ftest1(1),"bar->ftest1");
check::equal(2,$bar->ftest2(1,2),"bar->ftest2");
check::equal(3,$bar->test(),"bar->test");

# check deref returns foo
check::classname("foo",$bar->__deref__());

check::done();
?>
