<?php

namespace Drupal\social_media_links_extras\Plugin\SocialMediaLinks\Platform;

use Drupal\social_media_links\PlatformBase;

/**
 * Provides 'reddit' platform.
 *
 * @Platform(
 *   id = "reddit-alien",
 *   name = @Translation("Reddit"),
 *   urlPrefix = "https://www.reddit.com/user/",
 * )
 */
class Reddit extends PlatformBase {}
