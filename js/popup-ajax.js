jQuery(document).ready(function() {
    jQuery(document).on('click', 'button.read-more', function() {
        var postId = jQuery(this).data('post-id');
        openPostPopup(postId);
    });
});

function openPostPopup(postId) {
    // First, clear existing content and show the popup immediately (but empty)
    jQuery('#popup-content').html('<h3 class="loading-text">Project is loading <span class="loader"></span></h3> '); // Optionally show a loading message
    jQuery('#popup-container').show();
    jQuery('body').css('overflow', 'hidden');

    // Perform the AJAX request
    jQuery.ajax({
        url: ajax_params.ajax_url,
        type: 'post',
        data: {
            action: 'fetch_post',
            post_id: postId,
            nonce: ajax_params.nonce
        },
        success: function(response) {
            // Use fadeIn to smoothly display the new content
            jQuery('#popup-content').hide().html(response).fadeIn(500); // Fade in over 500 milliseconds
            jQuery('.popup-close').fadeIn();
        },
        error: function() {
            jQuery('#popup-content').hide().html('Failed to fetch post content.').fadeIn(500);
        }
    });
}


function closePopup() {
    jQuery('#popup-container').hide();
    jQuery('body').css('overflow', 'auto');
}

jQuery('.main-nav ul li a').on('click', function() {
    closePopup();
});