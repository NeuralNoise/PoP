<?php
 function lcr598a1bb748748encq($cx, $var) {
  if ($var instanceof LS) {
   return (string)$var;
  }

  return str_replace(array('=', '`', '&#039;'), array('&#x3D;', '&#x60;', '&#x27;'), htmlspecialchars(lcr598a1bb748748raw($cx, $var), ENT_QUOTES, 'UTF-8'));
 }

 function lcr598a1bb748748hbbch($cx, $ch, $vars, &$_this, $inverted, $cb, $else = null) {
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
    $ret = $cb($cx, is_array($ex) ? lcr598a1bb748748m($cx, $_this, $ex) : $_this);
   } else {
    $cx['scopes'][] = $_this;
    $ret = $cb($cx, is_array($ex) ? lcr598a1bb748748m($cx, $context, $ex) : $context);
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

  return lcr598a1bb748748exch($cx, $ch, $vars, $options);
 }

 function lcr598a1bb748748sec($cx, $v, $bp, $in, $each, $cb, $else = null) {
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
     $raw = lcr598a1bb748748m($cx, $raw, array($bp[0] => $raw));
    }
    if (isset($bp[1])) {
     $raw = lcr598a1bb748748m($cx, $raw, array($bp[1] => $cx['sp_vars']['index']));
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

 function lcr598a1bb748748ifvar($cx, $v, $zero) {
  return ($v !== null) && ($v !== false) && ($zero || ($v !== 0) && ($v !== 0.0)) && ($v !== '') && (is_array($v) ? (count($v) > 0) : true);
 }

 function lcr598a1bb748748raw($cx, $v, $ex = 0) {
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
      $ret[] = lcr598a1bb748748raw($cx, $vv);
     }
     return join(',', $ret);
    }
   } else {
    return 'Array';
   }
  }

  return "$v";
 }

 function lcr598a1bb748748m($cx, $a, $b) {
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

 function lcr598a1bb748748exch($cx, $ch, $vars, &$options) {
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
   lcr598a1bb748748err($cx, $e);
  }

  return $r;
 }

 function lcr598a1bb748748err($cx, $err) {
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
    $helpers = array(            'compare' => function($lvalue, $rvalue, $options) { 

		global $pop_serverside_helpers;
		return $pop_serverside_helpers->compare($lvalue, $rvalue, $options);
	},
            'generateId' => function($options) { 

		global $pop_serverside_helpers;
		return $pop_serverside_helpers->generateId($options);
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
    ob_start();echo '<div class="buttongroup-wrapper ',lcr598a1bb748748encq($cx, ((isset($in['classes']) && is_array($in['classes']) && isset($in['classes']['wrapper'])) ? $in['classes']['wrapper'] : null)),'" style="',lcr598a1bb748748encq($cx, ((isset($in['styles']) && is_array($in['styles']) && isset($in['styles']['wrapper'])) ? $in['styles']['wrapper'] : null)),'">
',lcr598a1bb748748hbbch($cx, 'compare', array(array((($inary && isset($in['type'])) ? $in['type'] : null),'tab'),array()), $in, false, function($cx, $in) {$inary=is_array($in);echo '		<ul ',lcr598a1bb748748hbbch($cx, 'generateId', array(array(),array()), $in, false, function($cx, $in) {$inary=is_array($in);echo '',lcr598a1bb748748encq($cx, (($inary && isset($in['id'])) ? $in['id'] : null)),'';}),' class="nav nav-tabs ',lcr598a1bb748748encq($cx, (($inary && isset($in['class'])) ? $in['class'] : null)),'" style="',lcr598a1bb748748encq($cx, (($inary && isset($in['style'])) ? $in['style'] : null)),'" role="tablist" ',lcr598a1bb748748sec($cx, (($inary && isset($in['params'])) ? $in['params'] : null), null, $in, true, function($cx, $in) {$inary=is_array($in);echo ' ',lcr598a1bb748748encq($cx, (isset($cx['sp_vars']['key']) ? $cx['sp_vars']['key'] : null)),'="',lcr598a1bb748748encq($cx, $in),'"';}),'>
',lcr598a1bb748748sec($cx, (($inary && isset($in['headers'])) ? $in['headers'] : null), null, $in, true, function($cx, $in) {$inary=is_array($in);echo '				<li role="presentation" class="',lcr598a1bb748748encq($cx, ((isset($cx['scopes'][count($cx['scopes'])-1]) && is_array($cx['scopes'][count($cx['scopes'])-1]['classes']) && isset($cx['scopes'][count($cx['scopes'])-1]['classes']['item'])) ? $cx['scopes'][count($cx['scopes'])-1]['classes']['item'] : null)),' ';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['active'])) ? $in['active'] : null), false)){echo 'active';}else{echo '';}echo ' ';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['subheaders'])) ? $in['subheaders'] : null), false)){echo 'dropdown';}else{echo '';}echo '" style="',lcr598a1bb748748encq($cx, ((isset($cx['scopes'][count($cx['scopes'])-1]) && is_array($cx['scopes'][count($cx['scopes'])-1]['styles']) && isset($cx['scopes'][count($cx['scopes'])-1]['styles']['item'])) ? $cx['scopes'][count($cx['scopes'])-1]['styles']['item'] : null)),'">
					<a href="',lcr598a1bb748748encq($cx, (($inary && isset($in['url'])) ? $in['url'] : null)),'">
						';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['fontawesome'])) ? $in['fontawesome'] : null), false)){echo '<i class="fa fa-fw ',lcr598a1bb748748encq($cx, (($inary && isset($in['fontawesome'])) ? $in['fontawesome'] : null)),'"></i>';}else{echo '';}echo '<span class="tab-title">',lcr598a1bb748748raw($cx, (($inary && isset($in['title'])) ? $in['title'] : null)),'</span>';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['subheaders'])) ? $in['subheaders'] : null), false)){echo ' <span class="caret"></span>';}else{echo '';}echo '
					</a>
';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['subheaders'])) ? $in['subheaders'] : null), false)){echo '						<ul class="dropdown-menu pull-right" role="menu">
',lcr598a1bb748748sec($cx, (($inary && isset($in['subheaders'])) ? $in['subheaders'] : null), null, $in, true, function($cx, $in) {$inary=is_array($in);echo '								<li role="presentation">
									<a href="',lcr598a1bb748748encq($cx, (($inary && isset($in['url'])) ? $in['url'] : null)),'">
										';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['fontawesome'])) ? $in['fontawesome'] : null), false)){echo '<i class="fa fa-fw ',lcr598a1bb748748encq($cx, (($inary && isset($in['fontawesome'])) ? $in['fontawesome'] : null)),'"></i>';}else{echo '';}echo '<span class="tab-subtitle">',lcr598a1bb748748raw($cx, (($inary && isset($in['title'])) ? $in['title'] : null)),'</span>
									</a>
								</li>
';}),'						</ul>
';}else{echo '';}echo '				</li>
';}),'		</ul>
';}),'',lcr598a1bb748748hbbch($cx, 'compare', array(array((($inary && isset($in['type'])) ? $in['type'] : null),'btn-group'),array()), $in, false, function($cx, $in) {$inary=is_array($in);echo '		<div ',lcr598a1bb748748hbbch($cx, 'generateId', array(array(),array()), $in, false, function($cx, $in) {$inary=is_array($in);echo '',lcr598a1bb748748encq($cx, (($inary && isset($in['id'])) ? $in['id'] : null)),'';}),' class="',lcr598a1bb748748encq($cx, (($inary && isset($in['class'])) ? $in['class'] : null)),'" style="',lcr598a1bb748748encq($cx, (($inary && isset($in['style'])) ? $in['style'] : null)),'" role="group" ',lcr598a1bb748748sec($cx, (($inary && isset($in['params'])) ? $in['params'] : null), null, $in, true, function($cx, $in) {$inary=is_array($in);echo ' ',lcr598a1bb748748encq($cx, (isset($cx['sp_vars']['key']) ? $cx['sp_vars']['key'] : null)),'="',lcr598a1bb748748encq($cx, $in),'"';}),'>
',lcr598a1bb748748sec($cx, (($inary && isset($in['headers'])) ? $in['headers'] : null), null, $in, true, function($cx, $in) {$inary=is_array($in);echo '				<a class="';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['active'])) ? $in['active'] : null), false)){echo 'active';}else{echo '';}echo ' ',lcr598a1bb748748encq($cx, ((isset($cx['scopes'][count($cx['scopes'])-1]) && is_array($cx['scopes'][count($cx['scopes'])-1]['classes']) && isset($cx['scopes'][count($cx['scopes'])-1]['classes']['item'])) ? $cx['scopes'][count($cx['scopes'])-1]['classes']['item'] : null)),'" style="',lcr598a1bb748748encq($cx, ((isset($cx['scopes'][count($cx['scopes'])-1]) && is_array($cx['scopes'][count($cx['scopes'])-1]['styles']) && isset($cx['scopes'][count($cx['scopes'])-1]['styles']['item'])) ? $cx['scopes'][count($cx['scopes'])-1]['styles']['item'] : null)),'" href="',lcr598a1bb748748encq($cx, (($inary && isset($in['url'])) ? $in['url'] : null)),'">
					';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['fontawesome'])) ? $in['fontawesome'] : null), false)){echo '<i class="fa fa-fw ',lcr598a1bb748748encq($cx, (($inary && isset($in['fontawesome'])) ? $in['fontawesome'] : null)),'"></i>';}else{echo '';}echo '',lcr598a1bb748748raw($cx, (($inary && isset($in['title'])) ? $in['title'] : null)),'
				</a>
';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['subheaders'])) ? $in['subheaders'] : null), false)){echo '					<span class="';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['active'])) ? $in['active'] : null), false)){echo 'active';}else{echo '';}echo ' ',lcr598a1bb748748encq($cx, ((isset($cx['scopes'][count($cx['scopes'])-1]) && is_array($cx['scopes'][count($cx['scopes'])-1]['classes']) && isset($cx['scopes'][count($cx['scopes'])-1]['classes']['item'])) ? $cx['scopes'][count($cx['scopes'])-1]['classes']['item'] : null)),' dropdown" style="',lcr598a1bb748748encq($cx, ((isset($cx['scopes'][count($cx['scopes'])-1]) && is_array($cx['scopes'][count($cx['scopes'])-1]['styles']) && isset($cx['scopes'][count($cx['scopes'])-1]['styles']['item'])) ? $cx['scopes'][count($cx['scopes'])-1]['styles']['item'] : null)),'">
						<a href="#" role="button" class="';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['active'])) ? $in['active'] : null), false)){echo 'active';}else{echo '';}echo ' ',lcr598a1bb748748encq($cx, ((isset($cx['scopes'][count($cx['scopes'])-1]) && is_array($cx['scopes'][count($cx['scopes'])-1]['classes']) && isset($cx['scopes'][count($cx['scopes'])-1]['classes']['item-dropdown'])) ? $cx['scopes'][count($cx['scopes'])-1]['classes']['item-dropdown'] : null)),' dropdown-toggle" style="',lcr598a1bb748748encq($cx, ((isset($cx['scopes'][count($cx['scopes'])-1]) && is_array($cx['scopes'][count($cx['scopes'])-1]['styles']) && isset($cx['scopes'][count($cx['scopes'])-1]['styles']['item-dropdown'])) ? $cx['scopes'][count($cx['scopes'])-1]['styles']['item-dropdown'] : null)),'" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
						<ul class="dropdown-menu pull-right" role="menu">
',lcr598a1bb748748sec($cx, (($inary && isset($in['subheaders'])) ? $in['subheaders'] : null), null, $in, true, function($cx, $in) {$inary=is_array($in);echo '								<li role="presentation" class="';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['active'])) ? $in['active'] : null), false)){echo 'active';}else{echo '';}echo '">
									<a href="',lcr598a1bb748748encq($cx, (($inary && isset($in['url'])) ? $in['url'] : null)),'">
										';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['fontawesome'])) ? $in['fontawesome'] : null), false)){echo '<i class="fa fa-fw ',lcr598a1bb748748encq($cx, (($inary && isset($in['fontawesome'])) ? $in['fontawesome'] : null)),'"></i>';}else{echo '';}echo '',lcr598a1bb748748raw($cx, (($inary && isset($in['title'])) ? $in['title'] : null)),'
									</a>
								</li>
';}),'						</ul>
					</span>
';}else{echo '';}echo '';}),'		</div>
';}),'',lcr598a1bb748748hbbch($cx, 'compare', array(array((($inary && isset($in['type'])) ? $in['type'] : null),'dropdown'),array()), $in, false, function($cx, $in) {$inary=is_array($in);echo '		<div ',lcr598a1bb748748hbbch($cx, 'generateId', array(array(),array()), $in, false, function($cx, $in) {$inary=is_array($in);echo '',lcr598a1bb748748encq($cx, (($inary && isset($in['id'])) ? $in['id'] : null)),'';}),' class="clearfix ',lcr598a1bb748748encq($cx, (($inary && isset($in['class'])) ? $in['class'] : null)),'" style="',lcr598a1bb748748encq($cx, (($inary && isset($in['style'])) ? $in['style'] : null)),'" ',lcr598a1bb748748sec($cx, (($inary && isset($in['params'])) ? $in['params'] : null), null, $in, true, function($cx, $in) {$inary=is_array($in);echo ' ',lcr598a1bb748748encq($cx, (isset($cx['sp_vars']['key']) ? $cx['sp_vars']['key'] : null)),'="',lcr598a1bb748748encq($cx, $in),'"';}),'>
			<div class="dropdown pull-right">
				<a href="#" class="dropdown-toggle close close-sm" data-toggle="dropdown" role="button">',lcr598a1bb748748raw($cx, ((isset($in['titles']) && is_array($in['titles']) && isset($in['titles']['dropdown'])) ? $in['titles']['dropdown'] : null)),'</a>
				<ul class="dropdown-menu" role="menu">
',lcr598a1bb748748sec($cx, (($inary && isset($in['headers'])) ? $in['headers'] : null), null, $in, true, function($cx, $in) {$inary=is_array($in);echo '						<li role="presentation" class="';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['active'])) ? $in['active'] : null), false)){echo 'active';}else{echo '';}echo '">
							<a href="',lcr598a1bb748748encq($cx, (($inary && isset($in['url'])) ? $in['url'] : null)),'">
								';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['fontawesome'])) ? $in['fontawesome'] : null), false)){echo '<i class="fa fa-fw ',lcr598a1bb748748encq($cx, (($inary && isset($in['fontawesome'])) ? $in['fontawesome'] : null)),'"></i>';}else{echo '';}echo '',lcr598a1bb748748raw($cx, (($inary && isset($in['title'])) ? $in['title'] : null)),'
							</a>
						</li>
',lcr598a1bb748748sec($cx, (($inary && isset($in['subheaders'])) ? $in['subheaders'] : null), null, $in, true, function($cx, $in) {$inary=is_array($in);echo '							<li role="presentation" class="menu-item-parent ';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['active'])) ? $in['active'] : null), false)){echo 'active';}else{echo '';}echo '">
								<a href="',lcr598a1bb748748encq($cx, (($inary && isset($in['url'])) ? $in['url'] : null)),'">
									';if (lcr598a1bb748748ifvar($cx, (($inary && isset($in['fontawesome'])) ? $in['fontawesome'] : null), false)){echo '<i class="fa fa-fw ',lcr598a1bb748748encq($cx, (($inary && isset($in['fontawesome'])) ? $in['fontawesome'] : null)),'"></i>';}else{echo '';}echo '',lcr598a1bb748748raw($cx, (($inary && isset($in['title'])) ? $in['title'] : null)),'
								</a>
							</li>
';}),'';}),'				</div>
			</div>
		</div>
';}),'</div>';return ob_get_clean();
};
?>