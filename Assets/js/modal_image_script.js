
$(function() {
      $('.zoomeffect').on('click', function() {
      $('.enlargeImageModalSource').attr('src', $(this).attr('src'));
      $('#enlargeImageModal').modal('show');
    });
});
