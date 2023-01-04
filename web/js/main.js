$('#delete-account').on('click', function () {
   if(window.confirm('Are you sure?')) {
       console.log($(this).attr('data-id'));
   }
});