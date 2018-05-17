(function() {
  var product_variety = 'Horticulture';
  var year = '2012';
  var commodityType = 'Cabbages';
  $.ajax({
    type: 'GET',
    url: '/api/product/varieties',
    success: function(data) {
      if (!(data.length > 0)) {
        $('#product_variety').append('<option value="Horticulture">No Product Variety</option>')
      } else {
        // Parse the returned json data
        var opts = (data)
        $('#product_variety').append('<option value="">Choose Product Variety</option>')
        // Use jQuery's each to iterate over the opts value
        $.each(opts, function(i, d) {
          // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
          $('#product_variety').append('<option value="' + d.produce_variety + '">' + d.produce_variety + '</option>')
        });
      }

    }
  });

  $(document).on('change', '#product_variety', function() {
    productVariety = $(this).val();

    $('#commodity_type').empty();
    $('#commodity_type').addClass('loading');
    $.ajax({
      type: 'GET',
      url: '/api/commodity/type',
      data: {
        'produce_variety': productVariety,
      },
      success: function(data) {
        $('#commodity_type').removeClass('loading');

        if (!(data.length > 0)) {
          $('#commodity_type').append('<option value="Cabbages">Cabbages</option>');
        } else {
          // Parse the returned json data
          var opts = (data);
          $('#commodity_type').append('<option value="">Choose Commodity Type</option>');
          // Use jQuery's each to iterate over the opts value
          $.each(opts, function(i, d) {
            // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
            $('#commodity_type').append('<option value="' + d.commodity_type + '">' + d.commodity_type + '</option>');
          });
        }
      }
    });
  });
  $(document).on('change', '#commodity_type', function() {
    commodityType = $(this).val();
    console.log(commodityType);

  });
  $(document).on('change', '#year', function() {
    year = $(this).val();
  });

  console.log(product_variety);
  console.log(year);
  console.log(commodityType);

  $.ajax({
    url: "/api/food/commodities",
    method: "GET",
    data: {
      'product_variety': product_variety,
      'year': year,
      'commodity_type': commodityType,
    },
    success: function(data) {
      var value = [];
      var month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

      for(var i in data) {
        value.push(data[i].values_in_kshs);
      }
      var chartdata = {
        labels: month,
        datasets : [
          {
            label: 'Value',
            backgroundColor: 'lightblue',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: value
          }
        ]
      };

      var ctx = $("#mycanvas");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata,
        options : {
          scales: {
            xAxes: [{
              display: true,
              label: 'YYYYYY'
            }]
          }
        }
      });
    }
  });
})();