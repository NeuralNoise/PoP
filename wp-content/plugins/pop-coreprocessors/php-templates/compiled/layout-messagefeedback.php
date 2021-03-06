<?php
 function lcr599ea028a2b4cwi($cx, $v, $bp, $in, $cb, $else = null) {
  if (isset($bp[0])) {
   $v = lcr599ea028a2b4cm($cx, $v, array($bp[0] => $v));
  }
  if (($v === false) || ($v === null) || (is_array($v) && (count($v) === 0))) {
   return $else ? $else($cx, $in) : '';
  }
  if ($v === $in) {
   $ret = $cb($cx, $v);
  } else {
   $cx['scopes'][] = $in;
   $ret = $cb($cx, $v);
   array_pop($cx['scopes']);
  }
  return $ret;
 }

 function lcr599ea028a2b4cencq($cx, $var) {
  if ($var instanceof LS) {
   return (string)$var;
  }

  return str_replace(array('=', '`', '&#039;'), array('&#x3D;', '&#x60;', '&#x27;'), htmlspecialchars(lcr599ea028a2b4craw($cx, $var), ENT_QUOTES, 'UTF-8'));
 }

 function lcr599ea028a2b4cifvar($cx, $v, $zero) {
  return ($v !== null) && ($v !== false) && ($zero || ($v !== 0) && ($v !== 0.0)) && ($v !== '') && (is_array($v) ? (count($v) > 0) : true);
 }

 function lcr599ea028a2b4chbbch($cx, $ch, $vars, &$_this, $inverted, $cb, $else = null) {
  $options = array(
   'name' => $ch,
   'hash' => $vars[1],
   'contexts' => count($cx['scopes']) ? $cx['scopes'] : array(null),
   'fn.blockParams' => 0,
   '_this' => &$_this,
  );

  if ($cx['flags']['spvar']) {
   $options['data'] = $cx['sp_vars'];
  }

  if (isset($vars[2])) {
   $options['fn.blockParams'] = count($vars[2]);
  }

  // $invert the logic
  if ($inverted) {
   $tmp = $else;
   $else = $cb;
   $cb = $tmp;
  }

  $options['fn'] = function ($context = '_NO_INPUT_HERE_', $data = null) use ($cx, &$_this, $cb, $options, $vars) {
   if ($cx['flags']['echo']) {
    ob_start();
   }
   if (isset($data['data'])) {
    $old_spvar = $cx['sp_vars'];
    $cx['sp_vars'] = array_merge(array('root' => $old_spvar['root']), $data['data'], array('_parent' => $old_spvar));
   }
   $ex = false;
   if (isset($data['blockParams']) && isset($vars[2])) {
    $ex = array_combine($vars[2], array_slice($data['blockParams'], 0, count($vars[2])));
    array_unshift($cx['blparam'], $ex);
   } else if (isset($cx['blparam'][0])) {
    $ex = $cx['blparam'][0];
   }
   if (($context === '_NO_INPUT_HERE_') || ($context === $_this)) {
    $ret = $cb($cx, is_array($ex) ? lcr599ea028a2b4cm($cx, $_this, $ex) : $_this);
   } else {
    $cx['scopes'][] = $_this;
    $ret = $cb($cx, is_array($ex) ? lcr599ea028a2b4cm($cx, $context, $ex) : $context);
    array_pop($cx['scopes']);
   }
   if (isset($data['data'])) {
    $cx['sp_vars'] = $old_spvar;
   }
   return $cx['flags']['echo'] ? ob_get_clean() : $ret;
  };

  if ($else) {
   $options['inverse'] = function ($context = '_NO_INPUT_HERE_') use ($cx, $_this, $else) {
    if ($cx['flags']['echo']) {
     ob_start();
    }
    if ($context === '_NO_INPUT_HERE_') {
     $ret = $else($cx, $_this);
    } else {
     $cx['scopes'][] = $_this;
     $ret = $else($cx, $context);
     array_pop($cx['scopes']);
    }
    return $cx['flags']['echo'] ? ob_get_clean() : $ret;
   };
  } else {
   $options['inverse'] = function () {
    return '';
   };
  }

  return lcr599ea028a2b4cexch($cx, $ch, $vars, $options);
 }

 function lcr599ea028a2b4chbch($cx, $ch, $vars, $op, &$_this) {
  if (isset($cx['blparam'][0][$ch])) {
   return $cx['blparam'][0][$ch];
  }

  $options = array(
   'name' => $ch,
   'hash' => $vars[1],
   'contexts' => count($cx['scopes']) ? $cx['scopes'] : array(null),
   'fn.blockParams' => 0,
   '_this' => &$_this
  );

  if ($cx['flags']['spvar']) {
   $options['data'] = $cx['sp_vars'];
  }

  return lcr599ea028a2b4cexch($cx, $ch, $vars, $options);
 }

 function lcr599ea028a2b4craw($cx, $v, $ex = 0) {
  if ($ex) {
   return $v;
  }

  if ($v === true) {
   if ($cx['flags']['jstrue']) {
    return 'true';
   }
  }

  if (($v === false)) {
   if ($cx['flags']['jstrue']) {
    return 'false';
   }
  }

  if (is_array($v)) {
   if ($cx['flags']['jsobj']) {
    if (count(array_diff_key($v, array_keys(array_keys($v)))) > 0) {
     return '[object Object]';
    } else {
     $ret = array();
     foreach ($v as $k => $vv) {
      $ret[] = lcr599ea028a2b4craw($cx, $vv);
     }
     return join(',', $ret);
    }
   } else {
    return 'Array';
   }
  }

  return "$v";
 }

 function lcr599ea028a2b4csec($cx, $v, $bp, $in, $each, $cb, $else = null) {
  $push = ($in !== $v) || $each;

  $isAry = is_array($v) || ($v instanceof \ArrayObject);
  $isTrav = $v instanceof \Traversable;
  $loop = $each;
  $keys = null;
  $last = null;
  $isObj = false;

  if ($isAry && $else !== null && count($v) === 0) {
   $ret = $else($cx, $in);
   return $ret;
  }

  // #var, detect input type is object or not
  if (!$loop && $isAry) {
   $keys = array_keys($v);
   $loop = (count(array_diff_key($v, array_keys($keys))) == 0);
   $isObj = !$loop;
  }

  if (($loop && $isAry) || $isTrav) {
   if ($each && !$isTrav) {
    // Detect input type is object or not when never done once
    if ($keys == null) {
     $keys = array_keys($v);
     $isObj = (count(array_diff_key($v, array_keys($keys))) > 0);
    }
   }
   $ret = array();
   if ($push) {
    $cx['scopes'][] = $in;
   }
   $i = 0;
   if ($cx['flags']['spvar']) {
    $old_spvar = $cx['sp_vars'];
    $cx['sp_vars'] = array_merge(array('root' => $old_spvar['root']), $old_spvar, array('_parent' => $old_spvar));
    if (!$isTrav) {
     $last = count($keys) - 1;
    }
   }

   $isSparceArray = $isObj && (count(array_filter(array_keys($v), 'is_string')) == 0);
   foreach ($v as $index => $raw) {
    if ($cx['flags']['spvar']) {
     $cx['sp_vars']['first'] = ($i === 0);
     $cx['sp_vars']['last'] = ($i == $last);
     $cx['sp_vars']['key'] = $index;
     $cx['sp_vars']['index'] = $isSparceArray ? $index : $i;
     $i++;
    }
    if (isset($bp[0])) {
     $raw = lcr599ea028a2b4cm($cx, $raw, array($bp[0] => $raw));
    }
    if (isset($bp[1])) {
     $raw = lcr599ea028a2b4cm($cx, $raw, array($bp[1] => $cx['sp_vars']['index']));
    }
    $ret[] = $cb($cx, $raw);
   }
   if ($cx['flags']['spvar']) {
    if ($isObj) {
     unset($cx['sp_vars']['key']);
    } else {
     unset($cx['sp_vars']['last']);
    }
    unset($cx['sp_vars']['index']);
    unset($cx['sp_vars']['first']);
    $cx['sp_vars'] = $old_spvar;
   }
   if ($push) {
    array_pop($cx['scopes']);
   }
   return join('', $ret);
  }
  if ($each) {
   if ($else !== null) {
    $ret = $else($cx, $v);
    return $ret;
   }
   return '';
  }
  if ($isAry) {
   if ($push) {
    $cx['scopes'][] = $in;
   }
   $ret = $cb($cx, $v);
   if ($push) {
    array_pop($cx['scopes']);
   }
   return $ret;
  }

  if ($v === true) {
   return $cb($cx, $in);
  }

  if (($v !== null) && ($v !== false)) {
   return $cb($cx, $v);
  }

  if ($else !== null) {
   $ret = $else($cx, $in);
   return $ret;
  }

  return '';
 }

 function lcr599ea028a2b4cm($cx, $a, $b) {
  if (is_array($b)) {
   if ($a === null) {
    return $b;
   } else if (is_array($a)) {
    return array_merge($a, $b);
   } else if (($cx['flags']['method'] || $cx['flags']['prop']) && is_object($a)) {
    foreach ($b as $i => $v) {
     $a->$i = $v;
    }
   }
  }
  return $a;
 }

 function lcr599ea028a2b4cexch($cx, $ch, $vars, &$options) {
  $args = $vars[0];
  $args[] = $options;
  $e = null;
  $r = true;

  try {
   $r = call_user_func_array($cx['helpers'][$ch], $args);
  } catch (\Exception $E) {
   $e = "Runtime: call custom helper '$ch' error: " . $E->getMessage();
  }

  if($e !== null) {
   lcr599ea028a2b4cerr($cx, $e);
  }

  return $r;
 }

 function lcr599ea028a2b4cerr($cx, $err) {
  if ($cx['flags']['debug'] & $cx['constants']['DEBUG_ERROR_LOG']) {
   error_log($err);
   return;
  }
  if ($cx['flags']['debug'] & $cx['constants']['DEBUG_ERROR_EXCEPTION']) {
   throw new \Exception($err);
  }
 }

if (!class_exists("LS")) {
class LS {
 public static $jsContext = array (
  'flags' => 
  array (
    'jstrue' => 1,
    'jsobj' => 1,
  ),
);
    public function __construct($str, $escape = false) {
        $this->string = $escape ? (($escape === 'encq') ? static::encq(static::$jsContext, $str) : static::enc(static::$jsContext, $str)) : $str;
    }
    public function __toString() {
        return $this->string;
    }
    public static function stripExtendedComments($template) {
        return preg_replace(static::EXTENDED_COMMENT_SEARCH, '{{! }}', $template);
    }
    public static function escapeTemplate($template) {
        return addcslashes(addcslashes($template, '\\'), "'");
    }
    public static function raw($cx, $v, $ex = 0) {
        if ($ex) {
            return $v;
        }

        if ($v === true) {
            if ($cx['flags']['jstrue']) {
                return 'true';
            }
        }

        if (($v === false)) {
            if ($cx['flags']['jstrue']) {
                return 'false';
            }
        }

        if (is_array($v)) {
            if ($cx['flags']['jsobj']) {
                if (count(array_diff_key($v, array_keys(array_keys($v)))) > 0) {
                    return '[object Object]';
                } else {
                    $ret = array();
                    foreach ($v as $k => $vv) {
                        $ret[] = static::raw($cx, $vv);
                    }
                    return join(',', $ret);
                }
            } else {
                return 'Array';
            }
        }

        return "$v";
    }
    public static function enc($cx, $var) {
        return htmlspecialchars(static::raw($cx, $var), ENT_QUOTES, 'UTF-8');
    }
    public static function encq($cx, $var) {
        return str_replace(array('=', '`', '&#039;'), array('&#x3D;', '&#x60;', '&#x27;'), htmlspecialchars(static::raw($cx, $var), ENT_QUOTES, 'UTF-8'));
    }
}
}
return function ($in = null, $options = null) {
    $helpers = array(            'get' => function($db, $index, $options) { 

		global $pop_serverside_helpers;
		return $pop_serverside_helpers->get($db, $index, $options);
	},
            'ifget' => function($db, $index, $options) { 

		global $pop_serverside_helpers;
		return $pop_serverside_helpers->ifget($db, $index, $options);
	},
            'formatFeedbackMessage' => function($message, $options) { 

        global $pop_core_serverside_helpers;
        return $pop_core_serverside_helpers->formatFeedbackMessage($message, $options);
    },
);
    $partials = array();
    $cx = array(
        'flags' => array(
            'jstrue' => true,
            'jsobj' => true,
            'jslen' => true,
            'spvar' => true,
            'prop' => false,
            'method' => false,
            'lambda' => false,
            'mustlok' => false,
            'mustlam' => false,
            'echo' => true,
            'partnc' => false,
            'knohlp' => false,
            'debug' => isset($options['debug']) ? $options['debug'] : 1,
        ),
        'constants' =>  array(
            'DEBUG_ERROR_LOG' => 1,
            'DEBUG_ERROR_EXCEPTION' => 2,
            'DEBUG_TAGS' => 4,
            'DEBUG_TAGS_ANSI' => 12,
            'DEBUG_TAGS_HTML' => 20,
        ),
        'helpers' => isset($options['helpers']) ? array_merge($helpers, $options['helpers']) : $helpers,
        'partials' => isset($options['partials']) ? array_merge($partials, $options['partials']) : $partials,
        'scopes' => array(),
        'sp_vars' => isset($options['data']) ? array_merge(array('root' => $in), $options['data']) : array('root' => $in),
        'blparam' => array(),
        'partialid' => 0,
        'runtime' => '\LightnCandy\Runtime',
    );
    
    $inary=is_array($in);
    ob_start();echo '',lcr599ea028a2b4cwi($cx, (($inary && isset($in['feedback-msg'])) ? $in['feedback-msg'] : null), null, $in, function($cx, $in) {$inary=is_array($in);echo '	<div class="media ',lcr599ea028a2b4cencq($cx, ((isset($cx['scopes'][count($cx['scopes'])-1]) && is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['class'])) ? $cx['scopes'][count($cx['scopes'])-1]['class'] : null)),'" style="',lcr599ea028a2b4cencq($cx, ((isset($cx['scopes'][count($cx['scopes'])-1]) && is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['style'])) ? $cx['scopes'][count($cx['scopes'])-1]['style'] : null)),'">
';if (lcr599ea028a2b4cifvar($cx, (($inary && isset($in['icon'])) ? $in['icon'] : null), false)){echo '			<div class="media-left">
				<span class="pop-messagefeedback-icon glyphicon ',lcr599ea028a2b4cencq($cx, (($inary && isset($in['icon'])) ? $in['icon'] : null)),' media-object"></span>
			</div>
';}else{echo '';}echo '		<div class="media-body">
';if (lcr599ea028a2b4cifvar($cx, ((isset($in['header']) && is_array($in['header']) && isset($in['header']['code'])) ? $in['header']['code'] : null), false)){echo '',lcr599ea028a2b4chbbch($cx, 'ifget', array(array(((isset($cx['scopes'][count($cx['scopes'])-1]) && is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['messages'])) ? $cx['scopes'][count($cx['scopes'])-1]['messages'] : null),((isset($in['header']) && is_array($in['header']) && isset($in['header']['code'])) ? $in['header']['code'] : null)),array()), $in, false, function($cx, $in) {$inary=is_array($in);echo '					<h4 class="media-heading">',lcr599ea028a2b4craw($cx, lcr599ea028a2b4chbch($cx, 'get', array(array(((isset($cx['scopes'][count($cx['scopes'])-1]) && is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['messages'])) ? $cx['scopes'][count($cx['scopes'])-1]['messages'] : null),((isset($in['header']) && is_array($in['header']) && isset($in['header']['code'])) ? $in['header']['code'] : null)),array()), 'raw', $in)),'</h4>
';}),'';}else{echo '';}echo '',lcr599ea028a2b4csec($cx, (($inary && isset($in['codes'])) ? $in['codes'] : null), null, $in, true, function($cx, $in) {$inary=is_array($in);echo '				';if (lcr599ea028a2b4cifvar($cx, (isset($cx['sp_vars']['index']) ? $cx['sp_vars']['index'] : null), false)){echo '<br/>';}else{echo '';}echo '
',lcr599ea028a2b4chbbch($cx, 'ifget', array(array(((isset($cx['scopes'][count($cx['scopes'])-2]) && is_array($cx['scopes'][count($cx['scopes'])-2]) && isset($cx['scopes'][count($cx['scopes'])-2]['messages'])) ? $cx['scopes'][count($cx['scopes'])-2]['messages'] : null),$in),array()), $in, false, function($cx, $in) {$inary=is_array($in);echo '					',lcr599ea028a2b4craw($cx, lcr599ea028a2b4chbch($cx, 'formatFeedbackMessage', array(array(lcr599ea028a2b4chbch($cx, 'get', array(array(((isset($cx['scopes'][count($cx['scopes'])-2]) && is_array($cx['scopes'][count($cx['scopes'])-2]) && isset($cx['scopes'][count($cx['scopes'])-2]['messages'])) ? $cx['scopes'][count($cx['scopes'])-2]['messages'] : null),$in),array()), 'raw', $in)),array('tls'=>((isset($cx['scopes'][count($cx['scopes'])-2]) && is_array($cx['scopes'][count($cx['scopes'])-2]) && isset($cx['scopes'][count($cx['scopes'])-2]['tls'])) ? $cx['scopes'][count($cx['scopes'])-2]['tls'] : null),'pss'=>((isset($cx['scopes'][count($cx['scopes'])-2]) && is_array($cx['scopes'][count($cx['scopes'])-2]) && isset($cx['scopes'][count($cx['scopes'])-2]['pss'])) ? $cx['scopes'][count($cx['scopes'])-2]['pss'] : null),'bs'=>((isset($cx['scopes'][count($cx['scopes'])-2]) && is_array($cx['scopes'][count($cx['scopes'])-2]) && isset($cx['scopes'][count($cx['scopes'])-2]['bs'])) ? $cx['scopes'][count($cx['scopes'])-2]['bs'] : null))), 'raw', $in)),'
';}),'';}),'			';if (lcr599ea028a2b4cifvar($cx, (($inary && isset($in['codes'])) ? $in['codes'] : null), false)){echo '';if (lcr599ea028a2b4cifvar($cx, (($inary && isset($in['strings'])) ? $in['strings'] : null), false)){echo '<br/>';}else{echo '';}echo '';}else{echo '';}echo '
',lcr599ea028a2b4csec($cx, (($inary && isset($in['strings'])) ? $in['strings'] : null), null, $in, true, function($cx, $in) {$inary=is_array($in);echo '				';if (lcr599ea028a2b4cifvar($cx, (isset($cx['sp_vars']['index']) ? $cx['sp_vars']['index'] : null), false)){echo '<br/>';}else{echo '';}echo '
				',lcr599ea028a2b4craw($cx, lcr599ea028a2b4chbch($cx, 'formatFeedbackMessage', array(array($in),array('tls'=>((isset($cx['scopes'][count($cx['scopes'])-2]) && is_array($cx['scopes'][count($cx['scopes'])-2]) && isset($cx['scopes'][count($cx['scopes'])-2]['tls'])) ? $cx['scopes'][count($cx['scopes'])-2]['tls'] : null),'pss'=>((isset($cx['scopes'][count($cx['scopes'])-2]) && is_array($cx['scopes'][count($cx['scopes'])-2]) && isset($cx['scopes'][count($cx['scopes'])-2]['pss'])) ? $cx['scopes'][count($cx['scopes'])-2]['pss'] : null),'bs'=>((isset($cx['scopes'][count($cx['scopes'])-2]) && is_array($cx['scopes'][count($cx['scopes'])-2]) && isset($cx['scopes'][count($cx['scopes'])-2]['bs'])) ? $cx['scopes'][count($cx['scopes'])-2]['bs'] : null))), 'raw', $in)),'
';}),'';if (lcr599ea028a2b4cifvar($cx, ((isset($in['footer']) && is_array($in['footer']) && isset($in['footer']['code'])) ? $in['footer']['code'] : null), false)){echo '',lcr599ea028a2b4chbbch($cx, 'ifget', array(array(((isset($cx['scopes'][count($cx['scopes'])-1]) && is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['messages'])) ? $cx['scopes'][count($cx['scopes'])-1]['messages'] : null),((isset($in['footer']) && is_array($in['footer']) && isset($in['footer']['code'])) ? $in['footer']['code'] : null)),array()), $in, false, function($cx, $in) {$inary=is_array($in);echo '					',lcr599ea028a2b4craw($cx, lcr599ea028a2b4chbch($cx, 'get', array(array(((isset($cx['scopes'][count($cx['scopes'])-1]) && is_array($cx['scopes'][count($cx['scopes'])-1]) && isset($cx['scopes'][count($cx['scopes'])-1]['messages'])) ? $cx['scopes'][count($cx['scopes'])-1]['messages'] : null),((isset($in['footer']) && is_array($in['footer']) && isset($in['footer']['code'])) ? $in['footer']['code'] : null)),array()), 'raw', $in)),'
';}),'';}else{echo '';}echo '		</div>
	</div>
';}),'';return ob_get_clean();
};
?>