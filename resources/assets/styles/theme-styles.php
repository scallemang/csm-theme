:root {
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

.icegram.ig_popup,
.ig_popup.ig_inspire.ig_popup {
<?php if( get_field('branding__popup_background', 'option')): ?>
  background: url("<?= get_field('branding__popup_background', 'option')['sizes']['large']; ?>");
  position: relative;

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
  background-color: theme-color("background") !important;
<?php endif; ?>
}
