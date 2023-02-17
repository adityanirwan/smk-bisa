<?php
function generate()
{
  $rs = base_convert(microtime(false), 11, 36);
  return $rs;
}
