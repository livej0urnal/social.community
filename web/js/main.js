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
    if (window.confirm('Are you sure?')) {
        $.ajax({
            url: '/page/drop-image?id=' + id + '&image=' + image,
            method: 'GET',
        });
    }
});

window.onload = function () {
    var location = window.location.pathname;
    $(".link-profile-href").each(function () {
        if ($(this).attr('href') === location) {
            $(this).addClass('active');
        }
    })
};

$('.dropdown-post').on('click', function (e) {
    e.preventDefault();
    if (window.confirm('Are you sure?')) {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/profile/delete-post?id=' + id,
            method: 'GET',
            success: function () {
                location.reload();
            },
            error: function () {
                alert('Has error');
            }
        })
    }
});

$('.load-more-comments').on('click', function () {
    var post = $(this).attr('data-value');
    var comments = $('.hidden-comment');
    $(this).addClass('d-none');
    comments.each(function () {
        if ($(this).attr('data-post') === post) {
            $(this).show();
        }
    });

});

$('.dropdown-comment').on('click', function (e) {
    e.preventDefault();
    if (window.confirm('Are you sure?')) {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/profile/delete-comment?id=' + id,
            method: 'GET',
            success: function () {
                location.reload();
            },
            error: function () {
                alert('Has error');
            }
        })
    }
});

$('.dropdown-comment-group').on('click', function (e) {
    e.preventDefault();
    if (window.confirm('Are you sure?')) {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/group/delete-comment?id=' + id,
            method: 'GET',
            success: function () {
                location.reload();
            },
            error: function () {
                alert('Has error');
            }
        })
    }
});

$('.apply-friend').on('click', function () {
    var id = $(this).attr('data-value');
    $.ajax({
        url: '/profile/apply-friend?id=' + id,
        method: 'GET',
    });
});

$('.delete-friend').on('click', function () {
    var id = $(this).attr('data-value');
    $.ajax({
        url: '/profile/delete-friend?id=' + id,
        method: 'GET',
        success: function () {
            location.reload();
        },
        error: function () {
            alert('Error!')
        }
    });
});

$('.add-friend').on('click', function () {
    var id = $(this).attr('data-value');
    $.ajax({
        url: '/profile/add-friend?id=' + id,
        method: 'GET',
    });
});

$('.delete-group-post').on('click', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-value');
    if(window.confirm('Are you sure?')) {
        $.ajax({
            url: '/delete-post/' + id + '/',
            method: 'GET',
            success: function () {
                location.reload();
            },
            error: function () {
                alert('Error');
            }
        });
    }

});

$('.change-private-group').on('click', function () {
   var id = $(this).attr('data-id');
   var value = $(this).attr('data-value');
   $.ajax({
      url: '/group/private/' + id + '/' + value + '/',
      method: 'GET',
      success: function () {
          location.reload();
      }
   });
});