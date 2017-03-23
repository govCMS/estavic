<?php

/**
 * @file
 * theme_hooks.php
 *
 * Theme hooks shared between the main ESTA theme and the esta_admin theme.
 *
 * These exist primarily because when you save a node, the admin theme is the
 * 'current' theme (global $theme) but when you rebuild caches, the curent
 * theme is the non-admin theme.
 */

/**
 * Helper _content_is_image_or_document.
 *
 * Check whether a render array element is an image or document file entity.
 *
 * @param array $element
 *   The render array element being checked.
 *
 * @return bool
 *   Whether the render array is an image or document file entity.
 */
function _content_is_image_or_document($element) {
  if (empty($element['content']['#entity_type'])) {
    return FALSE;
  }

  if ($element['content']['#entity_type'] != 'file') {
    return FALSE;
  }

  $bundles = array('image', 'document');

  if (!in_array($element['content']['#bundle'], $bundles)) {
    return FALSE;
  }

  return TRUE;
}

/**
 * Implements hook_media_wysiwyg_token_to_markup().
 */
function esta_shared_media_wysiwyg_token_to_markup_alter(&$element) {
  // No container if we're just rendering a file link and want it inline. The
  // main function avoids adding a div if there's only one child. Here we
  // have 2 (file and links) but they're rendered together so there's no need
  // for a container. (The container will be a div, which will break the
  // paragraph we're presumably sitting inside.
  if (_content_is_image_or_document($element)) {
    unset($element['content']['#type']);
    unset($element['content']['#attributes']);
  }
}
