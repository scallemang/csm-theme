:root {
  --primary: <?= strtolower( get_field('colour__primary', 'option') );?>;
  --secondary: <?= strtolower( get_field('colour__secondary', 'option') );?>;
  --info: <?= strtolower( get_field('colour__info', 'option') );?>;
  --text: <?= strtolower( get_field('colour__text', 'option') ) ;?>;
  --background: <?= strtolower( get_field('colour__background', 'option') ) ;?>;
  --gradient-one: <?= strtolower( get_field('colour__gradient', 'option')['colour__gradient_one'] ) ;?>;
  --gradient-two: <?= strtolower( get_field('colour__gradient', 'option')['colour__gradient_two'] ) ;?>;
}

$theme-colors: (
  primary: <?= strtolower( get_field('colour__primary', 'option') );?>,
  secondary: <?= strtolower( get_field('colour__secondary', 'option') );?>,
  info: <?= strtolower( get_field('colour__info', 'option') );?>,
  text: <?= strtolower( get_field('colour__text', 'option') );?>,
  background: <?= strtolower( get_field('colour__background', 'option') );?>,
  gradient-one: <?= strtolower( get_field('colour__gradient', 'option')['colour__gradient_one'] );?>,
  gradient-two: <?= strtolower( get_field('colour__gradient', 'option')['colour__gradient_two'] );?>
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
    background-color: rgba(theme-color("gradient-one"), 0.8);
  }

  .ig_headline {
    color: white;
  }
<?php else: ?>
  background-color: theme-color("gradient-one");
<?php endif; ?>
}
