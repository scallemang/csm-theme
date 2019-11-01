jQuery( document ).on( 'tinymce-editor-init', function( event, editor ) {
  // register the formats
  tinymce.activeEditor.formatter.register('p-xxl', {
      block : 'p',
      classes : 'xxl',
  });
  tinymce.activeEditor.formatter.register('p-xl', {
      block : 'p',
      classes : 'xl',
  });
  tinymce.activeEditor.formatter.register('p-l', {
      block : 'p',
      classes : 'l',
  });
  tinymce.activeEditor.formatter.register('p-s', {
    block : 'p',
    classes : 's',
  });
  tinymce.activeEditor.formatter.register('p-xs', {
    block : 'p',
    classes : 'xs',
  });
});