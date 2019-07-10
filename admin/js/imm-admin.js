(function( $ ) {
  'use strict';

  $(function() {

    /**
     * Using WordPress Media Uploader
     * Settings Page
     */
    // The "Upload" button
    $('.upload_image_button').click(function() {
      var send_attachment_bkp = wp.media.editor.send.attachment;
      var button = $(this);
      wp.media.editor.send.attachment = function(props, attachment) {
          $(button).parent().prev().attr('src', attachment.url);
          $(button).prev().val(attachment.id);
          wp.media.editor.send.attachment = send_attachment_bkp;
      }
      wp.media.editor.open(button);
      return false;
    });

    // The "Remove" button (remove the value from input type='hidden')
    $('.remove_image_button').click(function() {
      var answer = confirm('Are you sure?');
      if (answer == true) {
          var src = $(this).parent().prev().attr('data-src');
          $(this).parent().prev().attr('src', src);
          $(this).prev().prev().val('');
      }
      return false;
    });

    /**
     * Using WordPress Built In Code Highlighting - CodeMirror
     */
    var editorSettings = wp.codeEditor.defaultSettings ? _.clone( wp.codeEditor.defaultSettings ) : {};
    editorSettings.codemirror = _.extend(
        {},
        editorSettings.codemirror,
        {
            indentUnit: 2,
            tabSize: 2
        }
    );


    // wp.codeEditor.initialize( $('.field-group .imm_option_map') , editorSettings );


    /**
     * Repeater Field Using wp.template()
     */
    $('#field-data-add').on( 'click', function(e) {
      e.preventDefault();

      var template = wp.template('repeater'),
          html = template();
      $('#field-data').append(html);

    });

    $( document ).on( 'click', '.field-data-remove', function(e) {
      e.preventDefault();
      $(this).parent().remove();
    });


  });



})( jQuery );