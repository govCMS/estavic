<?php

/**
 * @file
 * Display a SWF.
 */
?>
<div class="swf">
  <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
          codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0"
          width="<?php print $field_width[0]['value']; ?>"
          height="<?php print $field_height[0]['value']; ?>"
          id="<?php print $field_id[0]['value']; ?>"
          align="<?php if ($field_align) { print $field_align[LANGUAGE_NONE]; } ?>">
    <param name="allowScriptAccess" value="sameDomain">
    <param name="allowFullScreen"
           value="<?php print $field_allow_full_screen[0]['value']; ?>">
    <param name="movie" value="<?php print file_create_url($uri); ?>">
    <param name="quality" value="high">
    <param name="bgcolor"
           value="<?php if ($field_background_colour) { print $field_background_colour[0]['value']; } ?>">
    <embed src="<?php print file_create_url($uri); ?>" quality="best"
           bgcolor="<?php if ($field_background_colour) { print $field_background_colour[0]['value']; } ?>"
           width="<?php print $field_width[0]['value']; ?>"
           height="<?php print $field_height[0]['value']; ?>"
           name="<?php print $field_id[0]['value']; ?>"
           align="<?php print $field_align[LANGUAGE_NONE]; ?>"
           allowscriptaccess="sameDomain"
           allowfullscreen="<?php print $field_allow_full_screen[0]['value']; ?>"
           type="application/x-shockwave-flash"
           pluginspage="http://www.adobe.com/go/getflashplayer">
  </object>
</div>
