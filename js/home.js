$(document).ready(function(){
    $.ajax({
        url: './core/getTours.php',
        type: 'post',
        data: {method: 'getTours'},
        success: function(data) {
            // check for no application
            // if data == 'No applications currently' else //logic ends
            // showdirectly
            console.log(data);
            response = $.parseJSON(data);
            
        $(function() {
            $.each(response, function(i, item) {
                
                var $tr = $('<div id="subparent" class="subparent" post_id='+item.id+'> <div id="fromto" class="fromto">'+item.where_from+' <i class="fa fa-arrows-h" aria-hidden="true"></i> '+item.where_to+'<i class="fa fa-plus addplan" style="float: right!important;font-size: 32px!important;" aria-hidden="true"></i></div><p id="members" class="members"><i class="fa fa-users" aria-hidden="true"></i>                '+item.num_of_people+'</p><div class="startdate" id="startdate"> <img src="./daterange.png">              '+item.start+' / '+item.end+'<div></div> </div><div id="status" class="status">'+item.hit+'<i class="fa fa-arrow-up hit" aria-hidden="true"></i><i class="fa fa-arrow-down git" aria-hidden="true"></i> '+item.down+'           </div>')
                .appendTo('#parent_div');
                //console.log($tr.wrap('<p>').html());
            });
        });
        }
    })    
});

$(document).on('click','.hit', function() {
    id = $(this).parent().parent().attr("post_id");
    console.log(id);
    $.ajax({
        url: './core/hitAndDown.php',
        type: 'post',
        data: {method: 'hititup',post_id: id},
        success: function(data) {
            console.log(data);
        }
    })    
})

$(document).on('click','.git', function() {
    id = $(this).parent().parent().attr("post_id");
    console.log(id);
    $.ajax({
        url: './core/hitAndDown.php',
        type: 'post',
        data: {method: 'hititdown',post_id: id},
        success: function(data) {
            console.log(data);
        }
    })    
})

$(document).on('click','.addplan', function() {
    id = $(this).parent().parent().attr("post_id");
    console.log(id);
    $.ajax({
        url: './core/hitAndDown.php',
        type: 'post',
        data: {method: 'addplan',post_id: id},
        success: function(data) {
            console.log(data);
        }
    })    
})