$( () => {
  thumbup();
})

function thumbup() {
  $('#thumbup').on('click', function() {
    var articleId = $('#article-id').val()
    var thumbupUrl = $('#thumbup-url').val()
    var userId = $('#user-id').val()

    $.ajax({
      url: thumbupUrl,
      type: 'POST',
      dataType: 'json',
      data: {
        article_id: articleId,
        user_id: userId,
      }
    }).done( () => {
      console.log('イイねしました')
    })
  })
}
