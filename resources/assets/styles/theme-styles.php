:root {
  --primary: <?= strtolower( get_field('colour__primary', 'option') );?>;
  --secondary: <?= strtolower( get_field('colour__secondary', 'option') );?>;
  --info: <?= strtolower( get_field('colour__info', 'option') );?>;
  --text: <?= strtolower( get_field('colour__text', 'option') ) ;?>;
  --background: <?= strtolower( get_field('colour__background', 'option') ) ;?>;
}

$theme-colors: (
  primary: <?= strtolower( get_field('colour__primary', 'option') );?>,
  secondary: <?= strtolower( get_field('colour__secondary', 'option') );?>,
  info: <?= strtolower( get_field('colour__info', 'option') );?>,
  text: <?= strtolower( get_field('colour__text', 'option') );?>,
  background: <?= strtolower( get_field('colour__background', 'option') );?>
);
