tinymce.init({
style_formats:  [
              {title: 'Footer - 11px', inline: 'span', classes: 'admin-footer'},
              {title: 'Standard - 14px', inline: 'span'},
              {title: 'Heading 1 - 19px', inline: 'span', classes: 'admin-heading-1'},  
              {title: 'Heading 2 - 22px', inline: 'span', classes: 'admin-heading-2'}  
            ],
setup: function (ed) {
  ed.on('ExecCommand', function checkListNodes (evt) {
if (cmd === 'mceToggleFormat') {
    if(!doNotRemoveFormat) {  
      let val = 'runThis|' + evt.value;
      this.execCommand('RemoveFormat', false, val);
    } else {
      doNotRemoveFormat = false;
    }
} else if (cmd === 'RemoveFormat') {
  let value = evt.value.split("|");
  if(value[0] === 'runThis') {
    doNotRemoveFormat = true;
    this.execCommand('mceToggleFormat', false, value[1])
  }
}})}});

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