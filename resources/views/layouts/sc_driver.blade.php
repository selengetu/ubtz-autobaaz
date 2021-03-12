<script>
$('#adddriver').on('click',function(){
    var title = document.getElementById("modal-title1");
    $('#type').val('1');
    title.innerHTML = "Жолооч бүртгэх цонх";
    $('#driver_id').val('1');
    $('#sdate').val('');
    $('#fdate').val('');
    $('.delete').hide();

});
function deletedriver(){
        var itag =  $('#cd_id').val();
        var gcar = $('#gcar').val();
        console.log(itag);
        $.ajax(
            {
                url: "cardriver/delete/" + itag,
                type: 'GET',
                dataType: "JSON",
                data: {
                    "id": itag,
                    "_method": 'DELETE',
                }
              
                  

            });
            alert('Жолооч устгагдлаа');
                    getcardrivers(gcar);
                    

            }
            function updatedriver($id){

                    var title = document.getElementById("modal-title1");
                    title.innerHTML = "Жолооч засварлах цонх";

                    $('#type').val('2');
                    
                    $.get('cardriverfill/'+$id,function(data){
                        $.each(data,function(i,qwe){

                            $('#cd_id').val(qwe.cd_id);
                            $('#gcar').val(qwe.car_id);
                            $('#driver_id').val(qwe.driver_id);
                            $('#sdate').val(qwe.sdate);
                            $('#fdate').val(qwe.fdate);
                        });

                    });
                    $('.delete').show();
                    };
    $('#formdriver').submit(function(event){
    var itag = $('#type').val();
    var gcar = $('#gcar').val();
    event.preventDefault();


    if(itag == 1){
        $.ajax({
            type: 'POST',
            url: 'addcardriver',
            data: $('form#formdriver').serialize(),
            success: function(){
                alert('Жолооч нэмэгдлээ');
                getcardrivers(gcar);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 500) {
                    alert('Internal error: ' + jqXHR.responseText);
                } else {
                    alert('Unexpected error.');
                }
            }
        })

    }
    if(itag == 2){
        $.ajax({
            type: 'POST',
            url: 'updatecardriver',
            data: $('form#formdriver').serialize(),
            success: function(){
                alert('Жолооч засварлагдлаа');
                getcardrivers(gcar);

            },
            error: function (jqXHR, textStatus, errorThrown) {
                if (jqXHR.status == 500) {
                    alert('Internal error: ' + jqXHR.responseText);
                } else {
                    alert('Unexpected error.');
                }
            }
        })

    }



});
function getcardrivers($id){
    $.get('cardriversfill/'+$id,function(data){
        $("#cardrivertable tbody").empty();
       
        $.each(data,function(i,qwe){

            var sHtml = " <tr class='table-row' >" +

                "   <td class='m1'>" + qwe.driver_name + "</td>" +
                "   <td class='m1'>" + qwe.driver_type + "</td>" +
                "   <td class='m1'>" + qwe.driver_spec+ "</td>" +
                "   <td class='m1'>" + qwe.sdate + "</td>" +
                "   <td class='m1'>" + qwe.fdate+ "</td>" +
                "   <td class='m1'><button type='button' class='btn btn-sm btn-primary add' data-toggle='modal' data-target='#driverModal' onclick='updatedriver("+qwe.cd_id+")'><i class='fa fa-pencil' aria-hidden='true'></i></button></td>" +
                "</tr>";

            $("#cardrivertable tbody").append(sHtml);

        });

    });
}
</script>