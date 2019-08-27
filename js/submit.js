$(document).ready(function(){
    $("#submitButton").on('click', function(e){
        e.preventDefault();
        console.log('rdy');

        let meatSubmitObj = {
            meatName: $("[name='name']").val(),
            doneness: $("[name='doneness']").val(),
            edibleRaw: $("[name='edibleRaw']:checked").val(),
            whiteMeat: $("[name='white']:checked").val(),
            category: $("[name='category']").val()
        };

        
        $.ajax({
            type: 'POST',
            url: 'scripts/create.php',
            data: meatSubmitObj
        })
        .done(function(msg){
            alert("Data Saved: " + msg);
        });
    })
});