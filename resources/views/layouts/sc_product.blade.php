<script>
$('#addproduct').on('click',function(){
    var title = document.getElementById("modal-title2");
    $('#c_type').val('1');
    title.innerHTML = "Эд анги бүртгэх цонх";

    $('#product_id').val('1');
    $('#product_sdate').val('');
    $('#product_fdate').val('');
    $('#product_km').val('');
    $('.delete').hide();

});
function deleteproduct(){
    var itag =  $('#cp_id').val();
    var pcar = $('#pcar').val();
        $.ajax(
            {
                url: "carproduct/delete/" + itag,
                type: 'GET',
                dataType: "JSON",
                data: {
                    "id": itag,
                    "_method": 'DELETE',
                }
               
                   
            });
            alert('Жолооч устгагдлаа');
                    getcarproducts(pcar);


            }
            function updateproduct($id){

                    var title = document.getElementById("modal-title2");
                    title.innerHTML = "Эд анги засварлах цонх";

                    $('#c_type').val('2');
                  
                    $.get('carproductfill/'+$id,function(data){
                        $.each(data,function(i,qwe){

                            $('#cp_id').val(qwe.cp_id);
                            $('#pcar').val(qwe.car_id);
                            $('#product_id').val(qwe.product_id);
                            $('#product_sdate').val(qwe.begin_date);
                            $('#product_fdate').val(qwe.end_date);
                            $('#product_km').val(qwe.km);
                        });

                    });
                    $('.delete').show();
                    };
    $('#formproduct').submit(function(event){
     
    var itag = $('#c_type').val();

    var pcar = $('#pcar').val();
    event.preventDefault();


    if(itag == 1){
        $.ajax({
            type: 'POST',
            url: 'addcarproduct',
            data: $('form#formproduct').serialize(),
            success: function(){
                alert('Эд анги нэмэгдлээ');
                getcarproducts(pcar);

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
            url: 'updatecarproduct',
            data: $('form#formproduct').serialize(),
            success: function(){
                alert('Эд анги засварлагдлаа');
                getcarproducts(pcar);

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
function getcarproducts($id){
    $.get('carproductsfill/'+$id,function(data){
        $("#carproducttable tbody").empty();
       
        $.each(data,function(i,qwe){

            
            var sHtml = " <tr class='table-row' >" +

                "   <td class='m1'>" + qwe.product_name + "</td>" +
                "   <td class='m1'>" + qwe.km + "</td>" +
                "   <td class='m1'>" + qwe.begin_date + "</td>" +
                "   <td class='m1'>" + qwe.end_date+ "</td>" +
                
                "   <td class='m1'><button type='button' class='btn btn-sm btn-primary add' data-toggle='modal' data-target='#productModal' onclick='updateproduct("+qwe.cp_id+")'><i class='fa fa-pencil' aria-hidden='true'></i></button></td>" +
                "</tr>";

            $("#carproducttable tbody").append(sHtml);

        });

    });
}
</script>
   