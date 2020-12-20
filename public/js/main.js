$(document).ready(function () {
  window._token = $('meta[name="csrf-token"]').attr('content')

  moment.updateLocale('en', {
    week: {dow: 1} // Monday is the first day of the week
  })

  $('.date').datetimepicker({
    format: 'DD/MM/YYYY',
    locale: 'en',
    icons: {
      up: 'fas fa-chevron-up',
      down: 'fas fa-chevron-down',
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right'
    }
  })

  $('.datetime').datetimepicker({
    format: 'DD/MM/YYYY HH:mm:ss',
    locale: 'en',
    sideBySide: true,
    icons: {
      up: 'fas fa-chevron-up',
      down: 'fas fa-chevron-down',
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right'
    }
  })

  $('.timepicker').datetimepicker({
    format: 'HH:mm:ss',
    icons: {
      up: 'fas fa-chevron-up',
      down: 'fas fa-chevron-down',
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right'
    }
  })

  $('.select-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', 'selected')
    $select2.trigger('change')
  })
  $('.deselect-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', '')
    $select2.trigger('change')
  })

  $('.select2').select2()

  $('.treeview').each(function () {
    var shouldExpand = false
    $(this).find('li').each(function () {
      if ($(this).hasClass('active')) {
        shouldExpand = true
      }
    })
    if (shouldExpand) {
      $(this).addClass('active')
    }
  })

$('button.sidebar-toggler').click(function () {
    setTimeout(function() {
      $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    }, 275);
  })

	$("#btnPostcodeSearch").click(
			function(){

				$.ajax({

				url: 'https://uk1.ukvehicledata.co.uk/api/datapackage/PostcodeLookup?v=2&api_nullitems=1&auth_apikey=899460e4-5b98-456c-866f-4a87b32c11bb&key_POSTCODE='+$("#postcodesearch").val(),

				type: 'get',

				dataType: 'json',

				success:function(response){



					var len = response.Response.DataItems.AddressDetails.AddressList.length;



					$("#addressSelection").empty();

					$("#addressSelection").append("<option> - Select - </option>");

					for( var i = 0; i<len; i++){

						//var locationAddress = response.Response.DataItems.AddressDetails.AddressList[i]['SummaryAddress'];

						var BaseHolder = response.Response.DataItems.AddressDetails.AddressList[i]

						//var locationAddress = response.Response.DataItems.AddressDetails.AddressList[i]['ComponentParts']['BuildingName'] + ',' + response.Response.DataItems.AddressDetails.AddressList[i]['ComponentParts']['Street'];

						

						var locationAddress = "";

						if(BaseHolder['ComponentParts']['BuildingName'] != null)

						{

							locationAddress = BaseHolder['ComponentParts']['BuildingName'] + ', '

						}

						else if(BaseHolder['ComponentParts']['BuildingNumber'] != null)

						{

							locationAddress = BaseHolder['ComponentParts']['BuildingNumber'] + ', '

						}

						

						locationAddress += BaseHolder['ComponentParts']['Street']+ ', ' + BaseHolder['FormattedAddressLines']['PostTown']+ ', ' + BaseHolder['FormattedAddressLines']['Postcode'];

						

						$("#addressSelection").append("<option>"+locationAddress+"</option>");



					}

				}

        });
		});

$("#addressSelection").change(

			function(){

				var $selectedAddress = $("#addressSelection").val().split(",").reverse();
				

				//echo(selectedAddress);

				if($selectedAddress[0] != null)

				{

					$("#postcode").val($selectedAddress[0].trim());

				}

				if($selectedAddress[1] != null)

				{

					$("#town").val($selectedAddress[1].trim());

				}

				if($selectedAddress[2] != null)

				{

					$("#road").val($selectedAddress[2].trim());

				}

				if($selectedAddress[3] != null)

				{

					$("#hsnum").val($selectedAddress[3].trim());

				}

				$("#mapsLink").empty();

				$("#mapsLink").append('&nbsp;<a class="" target="_blank" href="https://www.google.com/maps/search/?api=1&query=' + $("#addressSelection").val() + '">View on Google Maps</a>');

				

			});
	 
	$("#registrationSearch").click(function(){
				$.ajax({

            url: 'https://uk1.ukvehicledata.co.uk/api/datapackage/MotHistoryData?v=2&api_nullitems=1&auth_apikey=899460e4-5b98-456c-866f-4a87b32c11bb&key_VRM='+$("#regSearch").val(),

            type: 'get',

            dataType: 'json',

            success:function(response){



                //var len = response.Response.DataItems.AddressDetails.AddressList.length;



                $("#make").empty();

				$("#model").empty();

				//var BaseHolder = response.Response.DataItems.ClassificationDetails;

				var BaseHolder = response.Response.DataItems;

				

				//$("#make").val(BaseHolder.Dvla['Make']);

				//$("#model").val(BaseHolder.Dvla['Model']);

				//$("#corfuel").val(BaseHolder.Dvla['FuelType']);

				$("#make").val(BaseHolder.VehicleDetails['Make']);

				$("#model").val(BaseHolder.VehicleDetails['Model']);

				$("#corfuel").val(BaseHolder.VehicleDetails['FuelType']);

				$("#vehicleColour").val(BaseHolder.VehicleDetails['Colour']);

				$("#reg").val($("#regSearch").val()); 

            }
		});
    });
})
