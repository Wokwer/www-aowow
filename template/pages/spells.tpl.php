<?php
$this->brick('header');
$f = $this->filter;                                         // shorthand
?>

    <div class="main" id="main">
        <div class="main-precontents" id="main-precontents"></div>
        <div class="main-contents" id="main-contents">

<?php $this->brick('announcement'); ?>

            <script type="text/javascript">
                g_initPath(<?php echo json_encode($this->path, JSON_NUMERIC_CHECK).', '.(empty($f['query']) ? 0 : 1) ?>);
<?php
if (!empty($f['query'])):
  // todo: update menu-class         Menu.modifyUrl(Menu.findItem(mn_database, [1]), { filter: '+={$filter.query|escape:'quotes'}' }, { onAppendCollision: fi_mergeFilterParams, onAppendEmpty: fi_setFilterParams, menuUrl: Menu.getItemUrl(Menu.findItem(mn_database, [1])) });
endif;
?>
            </script>

            <div id="fi" style="display: <?php echo empty($f['query']) ? 'none' : 'block' ?>;">
                <form action="?spells<?php echo $this->subCat; ?>&filter" method="post" name="fi" onsubmit="return fi_submit(this)" onreset="return fi_reset(this)">
                    <div class="rightpanel">
                        <div style="float: left"><?php echo Lang::$game['school'].Lang::$main['colon']; ?></div>
                        <small><a href="javascript:;" onclick="document.forms['fi'].elements['sc[]'].selectedIndex = -1; return false" onmousedown="return false"><?php echo Lang::$main['clear']; ?></a></small>
                        <div class="clear"></div>
                        <select name="sc[]" size="7" multiple="multiple" class="rightselect" style="width: 8em">
<?php
foreach (Lang::$game['sc'] as $i => $str):
    if ($str):
        echo '                                <option value="'.$i.'"'.(isset($f['sc']) && in_array($i, (array)$f['sc']) ? ' selected' : null).'>'.$str."</option>\n";
    endif;
endforeach;
?>
                        </select>
                    </div>
<?php if ($f['classPanel']): ?>
                    <div class="rightpanel2">
                        <div style="float: left"><?php echo Util::ucFirst(Lang::$game['class']).Lang::$main['colon']; ?></div>
                        <small><a href="javascript:;" onclick="document.forms['fi'].elements['cl[]'].selectedIndex = -1; return false" onmousedown="return false"><?php echo Lang::$main['clear']; ?></a></small>
                        <div class="clear"></div>
                        <select name="cl[]" size="8" multiple="multiple" class="rightselect" style="width: 8em; background-color: #181818">
<?php
foreach (Lang::$game['cl'] as $i => $str):
    if ($str):
        echo '                                <option value="'.$i.'"'.(isset($f['cl']) && in_array($i, (array)$f['cl']) ? ' selected' : null).' class="c'.$i.'">'.$str."</option>\n";
    endif;
endforeach;
?>
                        </select>
                    </div>
<?php
endif;

if ($f['glyphPanel']):
?>
                    <div class="rightpanel2">
                        <div style="float: left"><?php echo Util::ucFirst(Lang::$game['glyphType']).Lang::$main['colon']; ?></div>
                        <small><a href="javascript:;" onclick="document.forms['fi'].elements['gl[]'].selectedIndex = -1; return false" onmousedown="return false"><?php echo Lang::$main['clear']; ?></a></small>
                        <div class="clear"></div>
                        <select name="gl[]" size="2" multiple="multiple" class="rightselect" style="width: 8em">
<?php
foreach (Lang::$game['gl'] as $i => $str):
    if ($str):
        echo '                                <option value="'.$i.'"'.(isset($f['gl']) && in_array($i, (array)$f['gl']) ? ' selected' : null).'>'.$str."</option>\n";
    endif;
endforeach;
?>
                        </select>
                    </div>
<?php endif; ?>
                    <table>
                        <tr>
                            <td><?php echo Util::ucFirst(Lang::$main['name']).Lang::$main['colon']; ?></td>
                            <td colspan="2">
                                <table><tr>
                                    <td>&nbsp;<input type="text" name="na" size="30" <?php echo isset($f['na']) ? 'value="'.Util::htmlEscape($f['na']).'" ' : null; ?>/></td>
                                    <td>&nbsp; <input type="checkbox" name="ex" value="on" id="spell-ex" <?php echo isset($f['ex']) ? 'checked="checked" ' : null; ?>/></td>
                                    <td><label for="spell-ex"><span class="tip" onmouseover="$WH.Tooltip.showAtCursor(event, LANG.tooltip_extendedspellsearch, 0, 0, 'q')" onmousemove="$WH.Tooltip.cursorUpdate(event)" onmouseout="$WH.Tooltip.hide()"><?php echo Lang::$main['extSearch']; ?></span></label></td>
                                </tr></table>
                            </td>
                        </tr><tr>
                            <td class="padded"><?php echo Lang::$game['level'].Lang::$main['colon']; ?></td>
                            <td class="padded">&nbsp;<input type="text" name="minle" maxlength="2" class="smalltextbox" <?php echo isset($f['minle']) ? 'value="'.$f['minle'].'" ' : null; ?>/> - <input type="text" name="maxle" maxlength="2" class="smalltextbox" <?php echo isset($f['maxle']) ? 'value="'.$f['maxle'].'" ' : null; ?>/></td>
                            <td class="padded">
                                <table cellpadding="0" cellspacing="0" border="0"><tr>
                                    <td>&nbsp;&nbsp;&nbsp;<?php echo Lang::$game['reqSkillLevel'].Lang::$main['colon']; ?></td>
                                    <td>&nbsp;<input type="text" name="minrs" maxlength="3" class="smalltextbox2" <?php echo isset($f['minrs']) ? 'value="'.$f['minrs'].'" ' : null; ?>/> - <input type="text" name="maxrs" maxlength="3" class="smalltextbox2" <?php echo isset($f['maxrs']) ? 'value="'.$f['maxrs'].'" ' : null; ?>/></td>
                                </tr></table>
                            </td>
                        </tr><tr>
                            <td class="padded"><?php echo Util::ucFirst(Lang::$game['race']).Lang::$main['colon']; ?></td>
                            <td class="padded">&nbsp;<select name="ra">
                                <option></option>
<?php
foreach (Lang::$game['ra'] as $i => $str):
    if ($str && $i > 0):
        echo '                                <option value="'.$i.'"'.(isset($f['ra']) && $f['ra'] == $i ? ' selected' : null).'>'.$str."</option>\n";
    endif;
endforeach;
?>
                            </select></td>
                            <td class="padded"></td>
                        </tr><tr>
                            <td class="padded"><?php echo Lang::$game['mechAbbr'].Lang::$main['colon']; ?></td>
                            <td class="padded">&nbsp;<select name="me">
                                <option></option>
<?php
foreach (Lang::$game['me'] as $i => $str):
    if ($str):
        echo '                                <option value="'.$i.'"'.(isset($f['me']) && $f['me'] == $i ? ' selected' : null).'>'.$str."</option>\n";
    endif;
endforeach;
?>
                            </select></td>
                            <td>
                                <table cellpadding="0" cellspacing="0" border="0"><tr>
                                    <td class="padded">&nbsp;&nbsp;&nbsp;<?php echo Lang::$game['dispelType'].Lang::$main['colon']; ?></td>
                                    <td class="padded">&nbsp;<select name="dt">
                                        <option></option>
<?php
foreach (Lang::$game['dt'] as $i => $str):
    if ($str):
        echo '                                <option value="'.$i.'"'.(isset($f['dt']) && $f['dt'] == $i ? ' selected' : null).'>'.$str."</option>\n";
    endif;
endforeach;
?>
                                    </select></td>
                                </tr></table>
                            </td>
                        </tr>
                    </table>

                    <div id="fi_criteria" class="padded criteria"><div></div></div>
                    <div><a href="javascript:;" id="fi_addcriteria" onclick="fi_addCriterion(this); return false"><?php echo Lang::$main['addFilter']; ?></a></div>

                    <div class="padded2">
                        <div style="float: right"><?php echo Lang::$main['refineSearch']; ?></div>
                        <?php echo Lang::$main['match'].Lang::$main['colon']; ?><input type="radio" name="ma" value="" id="ma-0" <?php echo !isset($f['ma']) ? 'checked="checked" ' : null ?>/><label for="ma-0"><?php echo Lang::$main['allFilter']; ?></label><input type="radio" name="ma" value="1" id="ma-1" <?php echo isset($f['ma']) ? 'checked="checked" ' : null ?> /><label for="ma-1"><?php echo Lang::$main['oneFilter']; ?></label>
                    </div>

                    <div class="clear"></div>

                    <div class="padded">
                        <input type="submit" value="<?php echo Lang::$main['applyFilter']; ?>" />
                        <input type="reset" value="<?php echo Lang::$main['resetForm']; ?>" />
                    </div>

                </form>
                <div class="pad"></div>
            </div>

            <script type="text/javascript">//<![CDATA[
                fi_init('spells');
<?php
foreach ($f['fi'] as $str):
    echo '                '.$str."\n";
endforeach;
?>
            //]]></script>

            <div id="lv-generic" class="listview"></div>
            <script type="text/javascript">//<![CDATA[
<?php
    $this->lvBrick($this->lvData['file'], ['data' => $this->lvData['data'], 'params' => $this->lvData['params']]);
?>
            //]]></script>

            <div class="clear"></div>
        </div><!-- main-contents -->
    </div><!-- main -->

<?php $this->brick('footer'); ?>
