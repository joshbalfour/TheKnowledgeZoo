<?php
class C
{
    function foo()
    {
        if (isset($this)) {
            echo '$this is defined (';
            echo get_class($this);
            echo ")\n";
        } else {
            echo "\$this is not defined.\n";
        }
    }
}

class D
{
    function bar()
    {
        // Note: the next line will issue a warning if E_STRICT is enabled.
        C::foo();
    }
}

$C = new C();
$C->foo();

// Note: the next line will issue a warning if E_STRICT is enabled.
C::foo();
$D = new D();
$D->bar();

// Note: the next line will issue a warning if E_STRICT is enabled.
D::bar();
?>