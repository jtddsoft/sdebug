--TEST--
Test for bug #1270: String parsing marked not covered (< PHP 7)
--SKIPIF--
<?php if (!version_compare(phpversion(), "7.0", '<')) echo "skip < PHP 7.0 needed\n"; ?>
--FILE--
<?php
xdebug_start_code_coverage( XDEBUG_CC_UNUSED || XDEBUG_CC_DEAD_CODE );

include dirname( __FILE__ ) . '/bug01270.inc';

try { func1(); } catch (Exception $e) { }
try { func2(); } catch (Exception $e) { }
try { func3(); } catch (Exception $e) { }

$cc = xdebug_get_code_coverage();

ksort( $cc );
var_dump( array_slice( $cc, 1, 1 ) );
?>
--EXPECTF--
array(1) {
  ["%sbug01270.inc"]=>
  array(22) {
    [2]=>
    int(1)
    [4]=>
    int(1)
    [5]=>
    int(1)
    [6]=>
    int(1)
    [8]=>
    int(1)
    [9]=>
    int(-1)
    [11]=>
    int(1)
    [13]=>
    int(1)
    [14]=>
    int(1)
    [15]=>
    int(1)
    [17]=>
    int(1)
    [18]=>
    int(-1)
    [20]=>
    int(1)
    [22]=>
    int(1)
    [23]=>
    int(1)
    [25]=>
    int(1)
    [27]=>
    int(1)
    [28]=>
    int(1)
    [30]=>
    int(1)
    [31]=>
    int(-1)
    [33]=>
    int(1)
    [35]=>
    int(-1)
  }
}
