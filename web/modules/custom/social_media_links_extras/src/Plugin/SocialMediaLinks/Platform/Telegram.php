<?php

namespace Drupal\social_media_links_extras\Plugin\SocialMediaLinks\Platform;

use Drupal\social_media_links\PlatformBase;

/**
 * Provides 'telegram' platform.
 *
 * @Platform(
 *   id = "telegram",
 *   name = @Translation("Telegram"),
 *   urlPrefix = "https://t.me/",
 * )
 */
class Telegram extends PlatformBase {}
