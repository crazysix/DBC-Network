<?php

namespace Drupal\social_media_links_extras\Plugin\SocialMediaLinks\Platform;

use Drupal\social_media_links\PlatformBase;

/**
 * Provides 'dbccode' platform.
 *
 * @Platform(
 *   id = "code-branch",
 *   name = @Translation("DBC Network Code"),
 *   urlPrefix = "https://github.com/",
 * )
 */
class DbcCode extends PlatformBase {}
