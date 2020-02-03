// stylelint-disable
:root {
  --site: <?= strtolower( get_field('colour__site', 'option') );?>;
  --primary: <?= strtolower( get_field('colour__primary', 'option') );?>;
  --secondary: <?= strtolower( get_field('colour__secondary', 'option') );?>;
  --info: <?= strtolower( get_field('colour__info', 'option') );?>;
  --text: <?= strtolower( get_field('colour__text', 'option') ) ;?>;
  --background: <?= strtolower( get_field('colour__background', 'option') ) ;?>;
<?php if( get_field('colour__gradient', 'option')['colour__gradient_one'] && get_field('colour__gradient', 'option')['colour__gradient_two'] ): ?>
  --gradient-one: <?= strtolower( get_field('colour__gradient', 'option')['colour__gradient_one'] ) ;?>;
  --gradient-two: <?= strtolower( get_field('colour__gradient', 'option')['colour__gradient_two'] ) ;?>;
<?php else: ?>
  --gradient-one: <?= strtolower( get_field('colour__primary', 'option') ); ?>;
  --gradient-two: <?= strtolower( get_field('colour__secondary', 'option') ); ?>;
<?php endif; ?>
}

$theme-colors: (
  site: <?= strtolower( get_field('colour__site', 'option') );?>,
  primary: <?= strtolower( get_field('colour__primary', 'option') );?>,
  secondary: <?= strtolower( get_field('colour__secondary', 'option') );?>,
  info: <?= strtolower( get_field('colour__info', 'option') );?>,
  text: <?= strtolower( get_field('colour__text', 'option') );?>,
  background: <?= strtolower( get_field('colour__background', 'option') );?>,
<?php if( get_field('colour__gradient', 'option')['colour__gradient_one'] && get_field('colour__gradient', 'option')['colour__gradient_two'] ): ?>
  gradient-one: <?= strtolower( get_field('colour__gradient', 'option')['colour__gradient_one'] );?>,
  gradient-two: <?= strtolower( get_field('colour__gradient', 'option')['colour__gradient_two'] );?>
<?php else: ?>
  gradient-one: <?= strtolower( get_field('colour__primary', 'option') ); ?>,
  gradient-two: <?= strtolower( get_field('colour__secondary', 'option') ); ?>
<?php endif; ?>
);

h1,
.h1 {
<?php if( get_field('colour__typography', 'option')['colour__h1'] ): ?>
  color: <?= strtolower( get_field('colour__typography', 'option')['colour__h1'] ); ?>;
<?php else: ?>
  color: theme-color("primary");
<?php endif; ?>
}

h2,
.h2 {
<?php if( get_field('colour__typography', 'option')['colour__h2'] ): ?>
  color: <?= strtolower( get_field('colour__typography', 'option')['colour__h2'] ); ?>;
<?php else: ?>
  color: theme-color("secondary");
<?php endif; ?>
}

h3,
.h3 {
<?php if( get_field('colour__typography', 'option')['colour__h3'] ): ?>
  color: <?= strtolower( get_field('colour__typography', 'option')['colour__h3'] ); ?>;
<?php else: ?>
  color: theme-color("info");
<?php endif; ?>
}

h4,
.h4 {
<?php if( get_field('colour__typography', 'option')['colour__h4'] ): ?>
  color: <?= strtolower( get_field('colour__typography', 'option')['colour__h4'] ); ?>;
<?php else: ?>
  color: theme-color("secondary");
<?php endif; ?>
}

section.block-cta {
  h2 {
    &.line-bottom {
<?php if( get_field('colour__typography', 'option')['colour__cta'] ): ?>
      color: <?= strtolower( get_field('colour__typography', 'option')['colour__cta'] ); ?>;
      border-bottom: 4px solid <?= strtolower( get_field('colour__typography', 'option')['colour__cta'] ); ?>;
<?php else: ?>
      color: theme-color("primary");
      border-bottom: 4px solid theme-color("primary");
<?php endif; ?>
    }
  }

  h3 {
<?php if( get_field('colour__typography', 'option')['colour__cta'] ): ?>
    color: <?= strtolower( get_field('colour__typography', 'option')['colour__cta'] ); ?>;
<?php else: ?>
    color: theme-color("info");
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
    background-color: rgba(theme-color("background"), 0.8);
  }

  .ig_headline {
    color: white;
  }
<?php else: ?>
  background-color: theme-color("primary") !important;
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


// stylelint-enable
