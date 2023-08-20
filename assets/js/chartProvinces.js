$(function(){
    var provinceObject = $('#provinceCH');
    var resultObject = $('#resultCH');
  
    // on change province
    provinceObject.on('change', function(){
        var provinceId = $(this).val();
  
        $.get('get_provinChart.php?province_id=' + provinceId, function(data){
            var result = JSON.parse(data);
            $.each(result, function(index, item){

                resultObject.append(
                    $('<div></div>').html(item.province_id)
                );

            });
        });
    });
  
  });