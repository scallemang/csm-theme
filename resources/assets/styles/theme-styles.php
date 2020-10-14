<?php
  $csm_site = get_field('colour__site', 'option');
  $csm_primary = get_field('colour__primary', 'option');
  $csm_primaryRGB = hex2rgb( $csm_primary );
  $csm_primaryDark = adjustBrightness( $csm_primary, -26 );
  $csm_secondary = get_field('colour__secondary', 'option');
  $csm_secondaryRGB = hex2rgb( $csm_secondary );
  $csm_secondaryDark = adjustBrightness( $csm_secondary, -26 );
  $csm_info = get_field('colour__info', 'option');
  $csm_infoRGB = hex2rgb( $csm_info );
  $csm_infoDark = adjustBrightness( $csm_info, -26 );
  $csm_text = get_field('colour__text', 'option');
  $csm_textRGB = hex2rgb( $csm_text );
  $csm_textDark = adjustBrightness( $csm_text, -26 );
  $csm_textLight = adjustBrightness( $csm_text, 30 );
  $csm_background = get_field('colour__background', 'option');
  $csm_backgroundRGB = hex2rgb( $csm_background );

  function hex2rgb( $hex ) {
    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
    $str = $r . ', ' . $g . ', ' . $b;
    return $str;
  }

  function adjustBrightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Normalize into a six character long hex string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Split into three parts: R, G and B
    $color_parts = str_split($hex, 2);
    $return = '#';

    foreach ($color_parts as $color) {
        $color   = hexdec($color); // Convert to decimal
        $color   = max(0,min(255,$color + $steps)); // Adjust color
        $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
    }

    return $return;
  }
?>

:root {
  --csm_site: <?= strtolower( $csm_site );?>;
  --csm_primary: <?= strtolower( $csm_primary );?>;
  --csm_primary-dark: <?= strtolower( $csm_primaryDark ); ?>;
  --csm_primaryRGB: <?= strtolower( $csm_primaryRGB ); ?>; 
  --csm_secondary: <?= strtolower( $csm_secondary );?>;
  --csm_secondaryRGB: <?= strtolower( $csm_secondaryRGB ); ?>;
  --csm_secondary-dark: <?= strtolower( $csm_secondaryDark ); ?>;
  --csm_info: <?= strtolower( $csm_info );?>;
  --csm_info-dark: <?= strtolower( $csm_infoDark );?>;
  --csm_infoRGB: <?= strtolower( $csm_infoRGB ); ?>;
  --csm_text: <?= strtolower( $csm_text ) ;?>;
  --csm_text-dark: <?= strtolower( $csm_textDark ) ;?>;
  --csm_textRGB: <?= strtolower( $csm_textRGB ); ?>;
  --csm_text-light: <?= strtolower( $csm_textLight);?>;
  --csm_background: <?= strtolower( $csm_background ) ;?>;
  --csm_backgroundRGB: <?= strtolower( $csm_backgroundRGB ); ?>;
<?php if( get_field('colour__gradient', 'option')['colour__gradient_one'] && get_field('colour__gradient', 'option')['colour__gradient_two'] ): ?>
  --csm_gradient-one: <?= strtolower( get_field('colour__gradient', 'option')['colour__gradient_one'] ) ;?>;
  --csm_gradient-two: <?= strtolower( get_field('colour__gradient', 'option')['colour__gradient_two'] ) ;?>;
<?php else: ?>
  --csm_gradient-one: <?= strtolower( get_field('colour__primary', 'option') ); ?>;
  --csm_gradient-two: <?= strtolower( get_field('colour__secondary', 'option') ); ?>;
<?php endif; ?>
}

h1,
.h1 {
<?php if( get_field('colour__typography', 'option')['colour__h1'] ): ?>
  color: <?= strtolower( get_field('colour__typography', 'option')['colour__h1'] ); ?>;
<?php else: ?>
  color: var(--csm_primary);
<?php endif; ?>
}

h2,
.h2 {
<?php if( get_field('colour__typography', 'option')['colour__h2'] ): ?>
  color: <?= strtolower( get_field('colour__typography', 'option')['colour__h2'] ); ?>;
<?php else: ?>
  color: var(--csm_secondary);
<?php endif; ?>
}

h3,
.h3 {
<?php if( get_field('colour__typography', 'option')['colour__h3'] ): ?>
  color: <?= strtolower( get_field('colour__typography', 'option')['colour__h3'] ); ?>;
<?php else: ?>
  color: var(--csm_info);
<?php endif; ?>
}

h4,
.h4 {
<?php if( get_field('colour__typography', 'option')['colour__h4'] ): ?>
  color: <?= strtolower( get_field('colour__typography', 'option')['colour__h4'] ); ?>;
<?php else: ?>
  color: var(--csm_secondary);
<?php endif; ?>
}

section.block-cta {
  h2 {
    &.line-bottom {
<?php if( get_field('colour__typography', 'option')['colour__cta'] ): ?>
      color: <?= strtolower( get_field('colour__typography', 'option')['colour__cta'] ); ?>;
      border-bottom: 4px solid <?= strtolower( get_field('colour__typography', 'option')['colour__cta'] ); ?>;
<?php else: ?>
      color: var(--csm_primary);
      border-bottom: 4px solid var(--csm_primary);
<?php endif; ?>
    }
  }

  h3 {
<?php if( get_field('colour__typography', 'option')['colour__cta'] ): ?>
    color: <?= strtolower( get_field('colour__typography', 'option')['colour__cta'] ); ?>;
<?php else: ?>
    color: var(--csm_info);
<?php endif; ?>
  }
}

.icegram.ig_popup,
.ig_popup.ig_inspire.ig_popup {
<?php if( get_field('branding__popup_background', 'option')): ?>
  background: url("<?= App\force_relative_url( get_field('branding__popup_background', 'option')['sizes']['large'] ); ?>");
  position: relative;
  background-size: cover;

  &::before {
    position: absolute;
    height: 100%;
    width: 100%;
    content: "";
    top: 0;
    left: 0;
    display: block;
    z-index: 0;
    background-color: rgba(var(--csm_backgroundRGB), 0.8);
  }

  .ig_headline {
    color: white;
  }
<?php else: ?>
  background-color: var(--csm_primary) !important;
  color: white;

  .ig_headline {
    color: white;
  }
<?php endif; ?>
}

input,
textarea {
  <?php if( get_field('colour__forms', 'option')['colour__form_inputs']): ?>
  background-color: <?= strtolower( get_field('colour__forms', 'option')['colour__form_inputs']) ;?> !important;
  border-color: <?= strtolower( get_field('colour__forms', 'option')['colour__form_inputs'] ) ;?>  !important;
  <?php else: ?>
  background-color: #f0f0f0 !important;
  border-color: #f0f0f0 !important;
  <?php endif; ?>
}

label,
.wpforms-required-label {
  <?php if( get_field('colour__forms', 'option')['colour__form_labels']): ?>
  color: <?= strtolower( get_field('colour__forms', 'option')['colour__form_labels'] ) ;?> !important;
  <?php else: ?>
  color: <?= strtolower( get_field('colour__text', 'option') ) ;?>;
  <?php endif; ?>
}
