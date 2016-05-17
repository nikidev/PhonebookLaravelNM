$(document).ready(function(){
   var table = $('#tblPhones').DataTable({
    	
    	"aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 0,2,3,4,5,6 ] }
       ],

       "pageLength": 4
    });

    $('#search').on('keyup',function(){
      table.search($(this).val()).draw() ;
	});


    $('#tblOtherContacts').DataTable({
      
      "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 2,3 ] }
       ],

       "pageLength": 4,
       "bFilter": false
    });

    $('#tblUsers').DataTable({
      
      "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 1,2,3 ] }
       ],

       "pageLength": 4,
       "bFilter": false
    });


});