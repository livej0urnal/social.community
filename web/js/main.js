$('#delete-account').on('click', function () {
    if (window.confirm('Are you sure?')) {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/page/drop?id=' + id,
            method: 'GET',
        })
    }
});


$('#restore-account').on('click', function () {
    if (window.confirm('Are you sure?')) {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/page/restore?id=' + id,
            method: 'GET',
        })
    }
});

$('#drop-avatar').on('click', function () {
   var id = $(this).attr('data-page');
   var image = $(this).attr('data-value');
   if(window.confirm('Are you sure?'))
   {
       $.ajax({
          url: '/page/drop-image?id=' + id + '&image=' + image,
          method: 'GET',
       });
   }
});

window.onload = function () {
   var location = window.location.pathname;
   console.log(location);
   var link = $('.link-profile-href');
   if(link.attr('href') === location) {
       link.addClass('active');
   }
   console.log(link);
};