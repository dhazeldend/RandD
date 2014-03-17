
/* Load a remote resource into a bootstrap modal dialog
 * options:
 *      [string]    title   :the modal title
 *      [string]    url     :the remote url to load
 *      [function]  submit  :called when a submit button was clicked and successfull.
 *      [function]  close   :callback function when modal is closed.
 *
 * example usage:
 *      showModal({
 *          title: 'Modal Title',
 *          url: '/remotepage?var=test',
 *          close: function() {}
 *      })
 *
 * notes:
 *      all ancor elements with .internal class will load new content within
 *      the modal dialog. all submit buttons with class .exit and anchor elements
 *      with class .submit will submit it's parent form via ajax and close the dialog.
 *
 */
function showModal(options) {

    // set default options if options is undefined.
    if (options == null) {
        options = {
            url: 'undefined',
            title: 'undefined'
        }
    }
    // create the modal dialog. This will initially contain a
    // loading bar that indicates that content is currently
    // being fetched.
    var modal = $('<div class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'
                + '<div class="modal-header">'
                + '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'
                + '<h3 id="myModalLabel">Loading...</h3>'
                + '</div>'
                + '<div class="modal-body">'
                + '<div class="modal-body-content">'
                + '<div class="progress progress-striped active">'
                + '<div class="bar" style="width:100%"></div>'
                + '</div>'
                + '</div>'
                + '</div>'
                + '</div>');

    modal.modal();
    modal.on('hidden', function() {
        if (options.close != null) {
            options.close();
        }
        modal.remove();
    });
    // simluate loading time by waiting 1000ms before loading
    // the remote resource.
    setTimeout(function() {

        var ajaxOptions = {
            type: 'GET',
            url: options.url,
            // on successfull ajax request, set the modal's title
            // and content.
            success: function(content) {
                modal.find('#myModalLabel').html(options.title || 'My Modal');
                modal.find('.modal-body-content').html(content);
                // override ancor elements to load the
                // href location into the modal dialog when clicked.
                modal.on('click', '.modal-body-content a.internal', function(e) {
                    // the value of the anchor href
                    var url = $(this).attr('href');
                    // load the resource into the modal dialog
                    $.ajax({
                        type: 'GET',
                        url: url,
                        success: function(content) {
                            // fade and slide to new content
                            modal.find('.modal-body').css('height', modal.find('.modal-body-content').height());
                            modal.find('.modal-body-content').fadeOut(100, function() {
                                modal.find('.modal-body-content').html(content);
                                modal.find('.modal-body').animate({ height: modal.find('.modal-body-content').height() }, 300, function() {
                                    modal.find('.modal-body').css('height', '');
                                    modal.find(".datepicker" ).datetimepicker({
                                        dateFormat: "yy-mm-dd"
                                    });
                                });
                                modal.find('.modal-body-content').fadeIn(500);
                            });

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alert('Error loading content: ' + jqXHR.responseText);
                        }
                    });
                    e.preventDefault();
                });
                // override all submit buttons witih class .exit and
                // anchor elements with class .submit to submit their parent
                // form via ajax and then close the dialog.
                modal.on('click', 'input[type="submit"].exit, a.submit', function(e) {

                    $.ajax({
                        type: 'POST',
                        url: $(this).closest('form').attr('action'),
                        data: $(this).closest('form').serialize(),
                        beforeSend: function() {
                            // TODO: Show loading bar
                        },
                        success: function() {
                            modal.modal('hide');
                            if (options.submit != null) {
                                options.submit();
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alert('Failed to submit form: ' + jqXHR.responseText);
                        }
                    });
                    e.preventDefault();
                });
            },
            // handle the ajax request error
            error: function(jqXHR, textStatus, errorThrown) {

                // if it's a 404, just modify modal title and content to
                // show a nice little message.
                if (jqXHR.status == 404) {
                    modal.find('#myModalLabel').html('Not found :(');
                    modal.find('.modal-body-content').html('This is a 404. Could not find url ' + options.url);
                }
                // if any other error status - show the error message
                // and close the modal dialog.
                else {
                    alert('ERROR: ' + jqXHR.responseText);
                    modal.modal('hide');
                }
            }
        };
        $.ajax(ajaxOptions);

    }, 1000);
}