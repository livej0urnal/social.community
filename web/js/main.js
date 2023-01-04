$('#delete-account').on('click', function () {
   if(window.confirm('Are you sure?')) {
       console.log($(this).attr('data-id'));
       var id = $(this).attr('data-id');
       $.ajax({
           url: '/page/drop?id=' + id,
           method: 'GET',
       })
   }
});